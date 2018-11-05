<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader {
	
	protected $CI;
	
	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();
		$this->CI->load->config('upload');
	}
	
	public function upload_image_item($upload_folder, $file_element_name)
	{
		$config_upload_image = $this->CI->config->item('upload_image_item');
		$config_upload_image['upload_path'] .= $upload_folder."/";

		$this->CI->load->library('upload', $config_upload_image);
		
		if ($_FILES[$file_element_name]['name'])
		{
			if (!is_dir($config_upload_image['upload_path'])) {
				mkdir($config_upload_image['upload_path'], 0777, true);
			}
			if (!$this->CI->upload->do_upload($file_element_name))
			{
				$data['error'] = $this->CI->upload->display_errors('', '');
			}
			else
			{
				// compress thumbnail
				$config_compress_image = $this->CI->config->item('compress_image_item_thumbnail');
				$this->CI->load->library('image_lib');
				$file_path = $config_upload_image['upload_path'].$this->CI->upload->data('file_name');
				$config_compress_image['source_image'] = $file_path;
				$this->CI->image_lib->initialize($config_compress_image);
				if (!$this->CI->image_lib->resize())
				{
					$data['error'] = $this->CI->image_lib->display_errors();
				}
				
				// compress original image
				$config_compress_image = $this->CI->config->item('compress_image_item');
				$this->CI->load->library('image_lib');
				$file_path = $config_upload_image['upload_path'].$this->CI->upload->data('file_name');
				$config_compress_image['source_image'] = $file_path;
				$this->CI->image_lib->initialize($config_compress_image);
				if (!$this->CI->image_lib->resize())
				{
					$data['error'] = $this->CI->image_lib->display_errors();
				}
				
				return $file_path;
			}
		}
		return false;
	}
	
	public function get_thumbnail_file($filepath) // folder1/folder2.asdf/folder3/filename.ext
	{
		$result = $filepath;
		
		$filepaths = explode(".", $filepath); // folder1/folder2   asdf/folder3/filename   ext
		
		$array_length = count($filepaths);
		
		if ($array_length > 1)
		{
			$filepaths[$array_length - 2] .= "_thumb"; // folder1/folder2   asdf/folder3/filename_thumb   ext
			
			$result = implode(".", $filepaths); // folder1/folder2.asdf/folder3/filename_thumb.ext
		}
		else if ($array_length == 1)
		{
			$result .= "_thumb";
		}
		
		return $result;
	}
}

?>
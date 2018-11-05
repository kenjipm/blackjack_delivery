<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_image_item'] = array(
	'upload_path'	=> 'img/upload/',
	'allowed_types'	=> 'gif|jpg|png|jpeg|jpe|jig|jfif|jfi',
	'max_size'		=> 20480,
	'file_name'		=> 'default.jpg',
	'overwrite'		=> true
);

$config['compress_image_item'] = array(
	'image_library'		=> 'gd2',
	'create_thumb'		=> FALSE,
	'maintain_ratio'	=> TRUE,
	'width'				=> 800,
	'height'			=> 600,
);

$config['compress_image_item_thumbnail'] = array(
	'image_library'		=> 'gd2',
	'create_thumb'		=> TRUE,
	'maintain_ratio'	=> TRUE,
	'width'				=> 300,
	'height'			=> 300,
);

?>
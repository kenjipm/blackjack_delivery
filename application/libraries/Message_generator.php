<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_generator {

    public function order_whatsapp($customer_name, $shipping_address, $shipping_method, $free_ongkir, $items)
	{
        $message = urlencode("Halo! Saya telah melakukan order melalui website ".COMPANY_NAME." dengan detail pesanan sebagai berikut:");
		$message .= "%0A%0A";
		$message .= urlencode("Nama: ".$customer_name);
		$message .= "%0A";
		$message .= urlencode("Alamat Kirim: ".$shipping_address);
		$message .= "%0A";
		$message .= urlencode("Metode Pengiriman: ".$shipping_method);
		$message .= "%0A";
		$message .= urlencode("Free Ongkir Didapat: ".$free_ongkir);
		$message .= "%0A";
		$message .= urlencode("Barang yang dipesan:");
		$message .= "%0A";
		
		foreach ($items as $item)
		{
			$message .= urlencode(" - ".$item->name.", ".$item->sub_name_1.", ".$item->sub_name_2." = ".$item->quantity." pcs");
			$message .= "%0A";
		}
		
		$message .= "%0A";
		$message .= urlencode("Mohon dikabari secepatnya mengenai ketersediaan stok, ongkir, dan rekening transfernya. Terima kasih.");
	}
}
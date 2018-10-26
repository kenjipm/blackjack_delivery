<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8'>
    <title><?=COMPANY_NAME?></title>
	<link rel="icon" href="<?=base_url('img/favicon.png');?>" type="image/png">
	
    <!-- SET CSS -->
    <link rel='stylesheet' href='<?=site_url('css/bootstrap.min.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('css/default.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('fa/css/all.css')?>' type='text/css' media='screen'/>
    
    <!-- SET JS -->
    <script type='text/javascript' src='<?=site_url('js/jquery-3.3.1.min.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/bootstrap.min.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/default.js')?>'></script>
	
    <?php
        //SET CUSTOM CSS
        if (isset($css_list)) { foreach ($css_list as $css) {
            ?><link rel='stylesheet' href='<?=site_url('css/'.$css.'.css')?>' type='text/css'/><?php } }
        
        //SET CUSTOM JS
        if (isset($js_list)) { foreach ($js_list as $js) {
            ?><script type='text/javascript' src='<?=site_url('js/'.$js.'.js')?>'></script><?php } }
    ?>
    
	<?php //pre-calculation
		
	?>
	
</head>
<body>

<div id="overlay"></div> <!-- div overlay -->

<?php
	if (!isset($no_loading_overlay)) { ?> <div id="loading"> <img src="<?=site_url('img/loading.gif')?>" id="loading_image"/> </div> <?php }
?>

	<!-- BODY CONTAINER -->
    <div class="container-fluid pt-1 pb-1">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui">
	<meta name="mobile-web-app-capable" content="yes">
    <title><?=$this->variables_model->get('company_name')->company_name?></title>
	<link rel="icon" href="<?=base_url('img/favicon/'.$_SERVER['SERVER_NAME'].'.png');?>" type="image/png">
	
    <!-- SET CSS -->
    <link rel='stylesheet' href='<?=base_url('css/bootstrap.min.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=base_url('fa/css/all.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=base_url('css/default.css')."?".date("Ymd",time())?>' type='text/css' media='screen'/>
    
    <!-- SET JS -->
    <script type='text/javascript' src='<?=base_url('js/jquery-3.3.1.min.js')?>'></script>
    <script type='text/javascript' src='<?=base_url('js/bootstrap.min.js')?>'></script>
    <script type='text/javascript' src='<?=base_url('js/default.js')."?".date("Ymd",time())?>'></script>
	
    <?php
        //SET CUSTOM CSS
        if (isset($css_list)) { foreach ($css_list as $css) {
            ?><link rel='stylesheet' href='<?=base_url('css/'.$css.'.css')."?".date("Ymd",time())?>' type='text/css'/><?php } }
        
        //SET CUSTOM JS
        if (isset($js_list)) { foreach ($js_list as $js) {
            ?><script type='text/javascript' src='<?=base_url('js/'.$js.'.js')."?".date("Ymd",time())?>'></script><?php } }
	?>
	
	<?php
		// google analytics
		if ($_SERVER['SERVER_NAME'] == 'blackjack.deliver.id')
		{
			?>
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129727756-1"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', 'UA-129727756-1');
			</script>
			<?php
		}
    ?>
    
	<?php //pre-calculation
		
	?>
	
</head>
<body>

<div id="overlay"></div> <!-- div overlay -->

<?php
	if (!isset($no_loading_overlay)) { ?> <div id="loading"> <img src="<?=base_url('img/loading.gif')?>" id="loading_image"/> </div> <?php }
?>

	<!-- BODY CONTAINER -->
    <div class="container-fluid" id="container">
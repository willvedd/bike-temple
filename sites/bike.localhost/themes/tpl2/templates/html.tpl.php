<?php print $doctype; ?>
<!--[if IE 7]> <html class="no-js ie9 ie8 ie7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">  <![endif]-->
<!--[if IE 8]> <html class="no-js ie9 ie8" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">  <![endif]-->
<!--[if IE 9]> <html class="no-js ie9" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if !IE]><!-->  <html class="no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf->version . $rdf->namespaces; ?>> 
<!--<![endif]-->
<head<?php print $rdf->profile; ?>>
  <?php print $head; ?>
  <title><?php
  if($is_front){
	  $head_title = 'Bike Temple | Temple University'”; // Will change the title of your default home page
    }
   print $head_title; ?></title>  
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body<?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
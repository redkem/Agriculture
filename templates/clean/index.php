<?php

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap-theme.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap-glyphicons.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');
$doc->addScript($this->baseurl.'/templates/' . $this->template . '/js/jui/bootstrap.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/' . $this->template . '/js/main.js', 'text/javascript');

?>
<!DOCTYPE html>
<html>
<head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="templates/clean/css/animate.css">
	 <script src="templates/clean/js/wow.min.js"></script>
      <script>
              new WOW().init();
     </script>
	<script> 
	/*pointer on top*/
	jQuery(document).ready(function($) {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.crunchify-top').fadeIn(duration);
			} else {
				jQuery('.crunchify-top').fadeOut(duration);
			}
		});
 
		jQuery('.crunchify-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		});
		
		var nav = $('.nav-container');
	
	/*position fix menu*/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 0) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});
	
	/*different background page*/
	$(".news-page").closest(".main-component").css( "background-color", "rgb(2, 163, 119)" );
    $(".services-page").closest(".main-component").css( "background-color", "rgb(175, 175, 167)" );
	
	
	});
</script>



<body lang="el">
<div id="wrapper">
<div class="nav-container">
<div class="nav">
<div class="top">
<div id="rt-top">
<div class="container">
<div class="col-md-12 col-sm-12 col-xs-12 login">
<jdoc:include type="modules" name="login" style="xhtml" />
</div>
</div>
<div class="container">
<div class="col-md-2 col-sm-12 col-xs-12 logo">
<jdoc:include type="modules" name="logo" style="xhtml" />
</div>
<div class="col-md-8 col-sm-12 col-xs-12 mega-menu">
	<div class="navbar-default navigation" role="navigation">
		<div class="navbar-header visible-sm-* visible-xs-*">
			<a class="btn csNav navbar-toggle" data-toggle="collapse" data-target="#main-menu">
				<span class="icon-bars"></span>
				<span class="icon-bars"></span>
				<span class="icon-bars"></span>
			</a>
		</div>
                    
		<div class="main-menu collapse visible-xs-* visible-sm-*" style="height:0px;" id="main-menu">
			<jdoc:include type="modules" name="menu" style="xhtml" />
		</div>
                    
		<div class="main-menu large">
			<jdoc:include type="modules" name="menu" style="xhtml" />
		</div>
	</div>
</div>
<div class="col-md-2 col-sm-12 col-xs-12 top-search">
<jdoc:include type="modules" name="search" style="xhtml" />
</div>
</div>
</div>
<div class="rt-showcase">
</div>
</div>
</div>
</div>
</div>
<?php if($this->countModules('left-menu')):?>
<div class="first-menu">
<div class="row-fluid">
	<div class="center">
		<div class="left-menu col-md-3 col-sm-6 col-xs-12">
			<jdoc:include type="modules" name="left-menu" style="xhtml" />
		</div>
		<div class="right-component col-md-9 col-sm-6 col-xs-12">
			<jdoc:include type="component" />
		</div>
	</div>
</div>
</div>
<?php else: ?>
<?php endif ; ?>
<?php if($this->countModules('slider')):?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="slider">
<jdoc:include type="modules" name="slider" style="xhtml" />
</div>
<?php endif ; ?>
<?php endif ; ?>
<div class="clear"></div>
<?php if($this->countModules('hometext')):?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="home-text">
<div class="container wow fadeInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
<jdoc:include type="modules" name="hometext" style="xhtml" />
</div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php if($this->countModules('services')):?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="services">
<div class="container">
<jdoc:include type="modules" name="services" style="xhtml" />
</div>
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php if($this->countModules('our-products')):?>
<?php if (JRequest::getVar( 'view' ) != 'item') :?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="our-products">
   <div class="container wow fadeInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
 <jdoc:include type="modules" name="our-products" style="xhtml" />
</div>
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php endif ; ?>

<div class="main-component col-md-12 col-sm-12 col-xs-12">
<div class="container">
<jdoc:include type="component" />
</div>

</div>
<div class="clear"></div>
<?php if($this->countModules('home-gallery')):?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="home-gallery">
<section class="module parallax parallax-1">
        <div class="container">
          <jdoc:include type="modules" name="home-gallery" style="xhtml" />
        </div>
      </section>
	  </div>
<?php endif ; ?>
<?php endif ; ?>

<?php if($this->countModules('home-news')):?> 	  
<?php if (JRequest::getVar( 'view' ) != 'item') :?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="news">
<div class="container">
<jdoc:include type="modules" name="home-news" style="xhtml" />
</div>
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php endif ; ?>

<?php if($this->countModules('companies')):?> 
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="list-companies">
<div class="container">
<jdoc:include type="modules" name="companies" style="xhtml" />
</div>
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php if($this->countModules('address')):?> 
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="address">
<jdoc:include type="modules" name="address" style="xhtml" />
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php if($this->countModules('address-map')):?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="address-map">
<div class="container">
<jdoc:include type="modules" name="address-map" style="xhtml" />
</div>
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php if($this->countModules('left_contact')):?>
<?php if($this->countModules('right_contact')):?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="contact">
<div class="container">
<div class="row">
<div class="left_contact col-md-4 col-sm-12">
<jdoc:include type="modules" name="left_contact" style="xhtml" />
</div>
<div class="right_contact col-md-8 col-sm-12">
<jdoc:include type="modules" name="right_contact" style="xhtml" />
</div>
</div>
</div>
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php endif ; ?>
<?php if($this->countModules('other_services')):?>
<?php if (JRequest::getVar( 'view' ) != 'item') :?>
<?php if (JRequest::getVar( 'view' ) != 'search') :?>
<div class="other_services">
<div class="container">
<jdoc:include type="modules" name="other_services" style="xhtml" />
</div>
</div>
<?php endif ; ?>
<?php endif ; ?>
<?php endif ; ?>
<footer>
<div class="footer">
<div class="container">
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
<jdoc:include type="modules" name="footer-one" style="xhtml" />
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<jdoc:include type="modules" name="menu" style="xhtml" />
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="heading text_10">
                        <h5>Follow us</h5>
                    </div>
                    <ul class="social">
                        <li><a class="fa fa-youtube" href="#"></a></li>
                        <li><a class="fa fa-twitter" href="#"></a></li>
                        <li><a class="fa fa-facebook" href="#"></a></li>
                        <li><a class="fa fa-pinterest" href="#"></a></li>
                        <li><a class="fa fa-linkedin" href="#"></a></li>
                    </ul>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<jdoc:include type="modules" name="footer-four" style="xhtml" />
</div>
</div>
</div>
</div>	
<a href="#" class="crunchify-top">↑</a>
</footer>
</body>

</html>
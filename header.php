<?php
	require_once('admin/includes/config.php');
	require_once('admin/includes/functions.php');
	mantener_sesion();
	//Bloque de seguridad (en progreso)
	session_name('security_code_2j7hFmd9');
	session_start();
?>


<!-- HEADER DEL SITIO DEL CLIENTE -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-ES" lang="es-ES">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/includes/jquery-validation/lib/jquery.js"></script>
<script src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/includes/jquery-validation/dist/jquery.validate.js"></script>

<style type="text/css">
.psh-form label.error, .psh-form input.submit {
	margin-left: 280px;
	color: #fff;
	position: absolute;
	margin-top: -32px;
	background-color: #BC3232;
	border-radius: 6px;
	padding: 4px;
	font-size: 16px;
	font-weight: bold;
	
}

.psh-form label.error:before{ /* Este es un truco para crear una flechita */
    content: '';
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
    border-right: 8px solid #BC3232;
    border-left: 8px solid transparent;
    left: -15px;
    position: absolute;
    top: 4px;
}
</style>

<title>Pago - GCRH Consultores</title>
<meta name="description" content="Formación profesional y servicios de desarrollo humano para particulares y empresas." />
<meta name="keywords" content="multicultural, formación, liderazgo, desarrollo, negocio, consultor, coaching, externalización, empresarial" />
<meta name="generator" content="Parallels Web Presence Builder 11.0.14" />
<link rel="stylesheet" type="text/css" href="../css/style.css?template=generic" />
<link rel="stylesheet" type="text/css" href="../pago/pagos.css" />
<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="../css/ie7.css?template=generic" />
	<![endif]-->
<script language="JavaScript" type="text/javascript" src="../js/style-fix.js"></script>
<script language="JavaScript" type="text/javascript" src="../js/css_browser_selector.js"></script>
<script type="text/javascript">var addthis_config = {
	ui_language: 'es'
};</script><script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js?ac=11.0.14_2013012919"></script>
<script type="text/javascript">addthis.addEventListener('addthis.ready', function() {
	for (var i in addthis.links) {
		var link = addthis.links[i];
		if (link.className.indexOf("tweet") > -1) {
			var iframe = link.firstChild;
			if (iframe.src.indexOf("http://") !== 0) {
				iframe.src = iframe.src.replace(/^(\/\/|https:\/\/)/, 'http://');
			}
		}
	}
});</script>
<link type="text/css" href="../css/header-6ebbd78c-075a-f020-c398-11dcbc274103.css?template=generic" rel="stylesheet" />
<link type="text/css" href="../css/navigation-b1b770e2-400a-e39e-7252-5d25745e9098.css?template=generic" rel="stylesheet" />
<!--[if IE]><style type="text/css">.background10-white{filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="../images/background10-white.png?template=generic",sizingmethod=scale,enabled=true);} </style><![endif]-->
<style type="text/css"></style>
<style type="text/css">
#watermark {
	-webkit-border-radius: 10px 10px 10px 10px;
	-moz-border-radius: 10px 10px 10px 10px;
	border-radius: 10px 10px 10px 10px;
}
.content {
	-webkit-border-radius: 10px 10px 10px 10px;
	-moz-border-radius: 10px 10px 10px 10px;
	border-radius: 10px 10px 10px 10px;
}
.column1 {
	-webkit-border-radius: 10px 0 0 10px;
	-moz-border-radius: 10px 0 0 10px;
	border-radius: 10px 0 0 10px;
}
.column2 {
	-webkit-border-radius: 0 10px 10px 0;
	-moz-border-radius: 0 10px 10px 0;
	border-radius: 0 10px 10px 0;
}
.header {
	-webkit-border-radius: 10px 10px 10px 10px;
	-moz-border-radius: 10px 10px 10px 10px;
	border-radius: 10px 10px 10px 10px;
}
.footer {
	-webkit-border-radius: 10px 10px 10px 10px;
	-moz-border-radius: 10px 10px 10px 10px;
	border-radius: 10px 10px 10px 10px;
}
#content .container-content-inner {
	padding-bottom: 10px
}
#content .container-content-inner {
	padding-top: 10px
}
#column1 .container-content-inner {
	padding-bottom: 10px
}
#column1 .container-content-inner {
	padding-top: 10px
}
#column2 .container-content-inner {
	padding-bottom: 10px
}
#column2 .container-content-inner {
	padding-top: 10px
}
#header .widget-header:first-child .widget-content {
	-webkit-border-top-left-radius: 10px;
	-moz-border-radius-topleft: 10px;
	border-top-left-radius: 10px;
	-webkit-border-top-right-radius: 10px;
	-moz-border-radius-topright: 10px;
	border-top-right-radius: 10px;
}
#header .widget-header:last-child .widget-content {
	-webkit-border-bottom-right-radius: 10px;
	-moz-border-radius-bottomright: 10px;
	border-bottom-right-radius: 10px;
	-webkit-border-bottom-left-radius: 10px;
	-moz-border-radius-bottomleft: 10px;
	border-bottom-left-radius: 10px;
}
#header .widget-navigation .widget-content {
	padding-right: 10px
}
#header .widget-navigation .widget-content {
	padding-left: 10px
}
#footer .widget-navigation .widget-content {
	padding-right: 10px
}
#footer .widget-navigation .widget-content {
	padding-left: 10px
}
</style>
<script type="text/javascript" src="../components/jquery/jquery.min.js?ac=11.0.14_2013012919"></script>
<script type="text/javascript" src="../js/helpers.js?ac=11.0.14_2013012919"></script>

<!--[if IE]>
	<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT" />
<![endif]-->
<script type="text/javascript">var siteBuilderJs = jQuery.noConflict(true);</script><script type="text/javascript">siteBuilderJs.startFixHeightColumns();</script>
</head>

<body id="template" class="">
<div class="site-frame">
<div id="wrapper" class="container-content external-border-none ">
<div class="external-top"> </div>
<div class="external-side-left">
<div class="external-side-left-top">
<div class="external-side-left-bottom">
<div class="external-side-right">
<div class="external-side-right-top">
<div class="external-side-right-bottom">
<div id="watermark" class="pageContentText  border-none">
<div id="watermark-content" class="container-content">
<div id="layout">
  <div id="header" class="header background10-white background border-none">
    <div id="header-top" class="top"> </div>
    <div id="header-side" class="side">
      <div id="header-side2" class="side2">
        <div class="container-content">
          <div id="header-content">
            <div class="container-content-inner" id="header-content-inner">
              <table class="widget-columns-table">
                <tr>
                  <td class="widget-columns-column" style="width: 19.853%"><div id="widget-886a89cd-778b-0bc4-040c-66656d6edc9e" class="widget widget-site-logo">
                      <div class="widget-content" style="text-align: center;"><a href="../"><img src="../attachments/Logo/Logo_2.jpg?template=generic" alt="" /></a></div>
                    </div></td>
                  <td class="widget-columns-split widget-columns-column"></td>
                  <td class="widget-columns-column" style="width: 56.702%"><div class="widget widget-text" id="widget-63eb4052-4be5-1840-510a-729826d9917c">
                      <div class="widget-content">
                        <h4 class="font_4" style="text-align: justify;"><span style="font-weight: normal;"><span style="font-family: Arial;">Nuestra misi&oacute;n es ocuparnos de las necesidades de SGC ISO 9001:2008, </span><span style="font-family: Arial; line-height: 1.42;">atracci&oacute;n, evaluaci&oacute;n y desarrollo de mandos medios y estrat&eacute;gicos&nbsp;</span><span style="font-family: Arial; line-height: 1.42;">de nuestros clientes para que ellos capitalicen sus recursos en el crecimiento de su empresa.</span></span></h4>
                      </div>
                    </div></td>
                  <td class="widget-columns-split widget-columns-column"></td>
                  <td class="widget-columns-column" style="width: 23.445%"><div id="widget-b346bbc3-aecc-de33-c3c3-4f71c5e71491" class="widget widget-sharethis">
                      <h2 class="widget-title">Compártenos en:</h2>
                      <div class="widget-content">
                        <div class="addthis_toolbox addthis_default_style addthis_32x32_style"> <a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a> <a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> <a class="addthis_button_compact"></a> </div>
                      </div>
                    </div></td>
                </tr>
              </table>
              <div class="widget widget-header" id="widget-6ebbd78c-075a-f020-c398-11dcbc274103">
                <div class="widget-content">
                  <img src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/img/header-img.jpg" class="header-image" alt="" /></div>
              </div>
              <div class="widget widget-navigation" id="widget-b1b770e2-400a-e39e-7252-5d25745e9098">
                <div class="widget-content">
                  <ul class="navigation" id="navigation-b1b770e2-400a-e39e-7252-5d25745e9098">
                    <li class=""> <a href="<?php echo $GLOBALS['url_instalacion']; ?>"> <span class="navigation-item-bullet">></span> <span class="navigation-item-text">Ir a la portada</span> </a> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /HEADER DEL SITIO DEL CLIENTE -->
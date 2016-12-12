<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
        <title>{title}</title>  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    
        <meta name="author" content="{author}">
        <link rel="canonical" href="<?php echo base_url();?>"/>
        <meta name="description" content="{description}">
        <meta name="keywords" content="{keywords}">
        <meta name="robots" content="index,follow"/>
        <meta name="googlebot" content="index, follow"/>
        <meta name="Googlebot-News" content="index, follow"/>
        <meta name="Feedfetcher-Google" content="index, follow">
        <meta name="Bingbot" content="index, follow">
        <meta name="msnbot" content="index, follow">    
        <meta name="csrf-token" content="<?php echo csrf_token();?>" />
        <meta property="og:title" content="{title}"/>
        <meta property="og:description" content="{description}"/>
        <meta property="og:url" content="<?php echo base_url();?>"/>
        <meta property="og:image" content="<?php echo base_url(config("site.logo"));?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:site_name" content="<?php echo base_url();?>"/>

        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo resources_url("bootstrap/js/html5shiv.js");?>"></script>
        <script type="text/javascript" src="<?php echo resources_url("bootstrap/js/respond.min.js");?>"></script>
        <![endif]-->
        <link rel="alternate" type="application/rss+xml" title="Sitemap Feed for <?php echo base_url();?>" href="<?php echo base_url("sitemap.xml");?>" />
        <link rel="alternate" type="application/rss+xml" title="RSS Feed for <?php echo base_url();?>" href="<?php echo base_url("feeds");?>" />
        <!--{{meta_tags}}-->
		<script type="text/javascript" src="<?php echo resources_url("jquery/jquery.js");?>"></script>
		<script type="text/javascript" src="<?php echo resources_url("bootstrap/js/bootstrap.min.js");?>"></script>
        <script type="text/javascript" src="<?php echo resources_url("bootstrap/js/bootstrap-typeahead.js");?>"></script>
        <script type="text/javascript" src="<?php echo resources_url("globals/ui.js");?>"></script>
        
        <link set="tinymce" rel="stylesheet" type="text/css" href="<?php echo resources_url("font-awesome/css/font-awesome.min.css");?>">
		<link set="tinymce" rel="stylesheet" type="text/css" href="<?php echo resources_url("bootstrap/css/bootstrap.min.css");?>">
        <link set="tinymce" rel="stylesheet" type="text/css" href="<?php echo resources_url("bootstrap/css/bootstrap-tagsinput.css");?>">
        
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url("bootstrap/css/bootstrap-select.min.css");?>">
        <link rel="stylesheet" type="text/css" href=" <?php echo resources_url("owl-carousel/owl.carousel.min.css");?>">
       
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url("css/animate.css");?>">
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url("css/azm-social.css");?>">
		<!--{{meta_header}}-->
        
    </head>
<body>
<div class="main-body" itemscope itemtype="http://schema.org/WebPage">
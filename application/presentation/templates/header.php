
<!DOCTYPE html>
	<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta property="og:locale" content="de_AT" />

		<?php if ($this->getAuthor() != null) { ?>	
		<meta name="author" content="<?php echo $this->getAuthor()?>">
		<?php } ?>
		
		<?php if ($this->getDescription() != null) { ?>		
		<meta name="description" property="og:description" content="<?php echo $this->getDescription()?>">		
		<?php } ?>
		
		<?php if ($this->getUrl() != null) { ?>		
		<meta property="og:url" content="<?php echo $this->getUrl()?>" />
		<?php } ?>
		
		<?php if ($this->getImage() != null) { ?>	
		<meta property="og:image" content="<?php echo $this->getImage()?>" />
		<?php } ?>		
		
		<?php if ($this->getTitle() != null) { ?>
		<meta property="og:title" content="<?php echo $this->getTitle()?>" />
		<meta property="og:site_name" content="<?php echo $this->getTitle()?>" />		
		<title><?php echo $this->getTitle()?></title>
		<?php } ?>	
		
		<!-- Bootstrap core CSS -->
		<link href="/website/htdocs/css/bootstrap.css" rel="stylesheet">
		<link href="/website/htdocs/css/font-awesome.min.css" rel="stylesheet">
		
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

		<!-- blueimp gallery -->
		<link href="/website/htdocs/css/blueimp-gallery.min.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="/website/htdocs/css/main.css" rel="stylesheet">

		<!-- CSS for shuffle.js -->
		<link href="/website/htdocs/css/imagegallery.css" rel="stylesheet">

        <link href="/website/htdocs/css/owl.carousel.css" rel="stylesheet">
        <link href="/website/htdocs/css/owl.theme.css" rel="stylesheet">
		
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->
		    
		    
		
	</head>
	
	<body data-spy="scroll" data-offset="0" data-target="#navbar-main">
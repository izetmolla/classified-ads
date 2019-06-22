<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <link href="<?php echo getmainurl(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo getmainurl(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo getmainurl(); ?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo getmainurl(); ?>assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="<?php echo getmainurl(); ?>assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />


<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="<?php echo getmainurl(); ?>assets/js/pace.min.js"></script>
    <script src="<?php echo getmainurl(); ?>assets/plugins/modernizr/modernizr-custom.js"></script>
</head>
<body>
<div id="wrapper">
    <div class="header">
    	<nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
    		 role="navigation">
    		<div class="container">

            <div class="navbar-identity">


    			<a href="/" class="navbar-brand logo logo-title">
    			<span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo "></i>
    			</span><?php echo getPageOpt('header_title'); ?></a>


    			<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
    					type="button">

    				<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>


    			</button>



            </div>
                <?php the_navigation(); ?>
    		</div>
    		<!-- /.container-fluid -->
    	</nav>
    </div>
    <!-- /.header -->
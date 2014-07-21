<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>
	<meta name="description" content="<?php echo site_description(); ?>">
	<link rel="stylesheet" href="<?php echo theme_url('css/font.css'); ?>">
	<link rel="stylesheet" href="<?php echo theme_url('css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo theme_url('css/bootstrap-theme.php'); ?>">
	<link rel="stylesheet" href="http://i.icomoon.io/public/temp/0a402d8156/ShadowbeamV3/style.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
    <link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script>var base = '<?php echo theme_url(); ?>';</script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="Anchor CMS">

	<meta property="og:title" content="<?php echo site_name(); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo e(current_url()); ?>">
	<meta property="og:image" content="<?php echo theme_url('img/og_image.gif'); ?>">
	<meta property="og:site_name" content="<?php echo site_name(); ?>">
	<meta property="og:description" content="<?php echo site_description(); ?>">

	<?php if(customised()): ?>
		<!-- Custom CSS -->
		<style><?php echo article_css(); ?></style>

		<!--  Custom Javascript -->
		<script><?php echo article_js(); ?></script>
	<?php endif; ?>

</head>
<body class="<?php echo body_class();?>">

	<div class="sidebar">
		<div class="controlbar" role="navigation">
			<div class="top">
				<a class="btn"  data-toggle="open-nav">
					<span class="glyphicon glyphicon-align-justify"></span>
				</a>
			</div>   
			<div class="bottom">
				<a class="btn nav-up"><span class="glyphicon glyphicon-arrow-up"></span></a>
				<a class="btn nav-down"><span class="glyphicon glyphicon-arrow-down"></span></a>
			</div>
		</div><!-- /.controlbar -->

		<?php if(has_menu_items()): ?>
			<nav id="navbar" class="navbar" role="navigation">

				<?php while(menu_items()): ?>

					<a href="#section-<?php echo this_page_slug();?>" class="list-group-item <?php echo (menu_active() ? 'class="active"' : ''); ?>" title="<?php echo menu_title();?>" >
						<span class="<?php page_icon();?>"></span><?php echo menu_name();?>
					</a>

				<?php endwhile; ?>

				
			</nav>
		<?php endif; ?>

	</div><!-- /.sidebar -->
	
<html>
	<head>
		<title>
			One column liquid layout
		</title>
		<script type="text/javascript">

		var base_url = '<?php echo base_url();?>';

		</script>
		<script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo base_url(); ?>js/jquery.lightbox-0.5.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.lightbox-0.5.css" type="text/css" media="screen" charset="utf-8" />
		<style type="text/css">
			#container {
				margin: 0 auto;
				width: 60%;
				background: #fff;
			}
			
			#header {
				background: #ccc;
				padding: 20px;
			}
			
			#header h1 {
				margin: 0;
			}
			
			#navigation {
				float: left;
				width: 100%;
				background: #333;
			}
			
			#navigation ul {
				margin: 0;
				padding: 0;
			}
			
			#navigation ul li {
				list-style-type: none;
				display: inline;
			}
			
			#navigation li a {
				display: block;
				float: left;
				padding: 5px 10px;
				color: #fff;
				text-decoration: none;
				border-right: 1px solid #fff;
			}
			
			#navigation li a:hover {
				background: #383;
			}
			
			#content-container {
				float: left;
				width: 100%;
				background: #FFF url(layout-two-liquid-background.gif) repeat-y 68% 0;
			}
			
			#content {	
				clear: left;
				float: left;
				width: 90%;
				padding: 20px 0;
				margin: 0 0 0 4%;
				display: inline;
			}
			
			#content h2 { 
				margin: 0; 
			}
			
			#aside {
				float: right;
				width: 26%;
				padding: 20px 0;
				margin: 0 3% 0 0;
				display: inline;
			}
			
			#aside h3 {
				margin: 0;
			}
			
			#footer {
				clear: left;
				background: #ccc;
				text-align: right;
				padding: 20px;
				height: 1%;
			}
			
			#contact label {
				display: block;
				margin: 5px;
			}
			
			#login label {
				display: block;
				margin: 5px;
			}
		</style>
	</head>
	<body>
		<div id="container">
		
			<div id="header">
				<h1>
					Site name
				</h1>
			</div>
			
			<div id="navigation">
				<ul>
					<?php if($this->session->userdata('admin')): ?>
					<li><?php echo anchor('site/index', 'Home'); ?></li>
					<li><?php echo anchor('gallery/index', 'Gallery'); ?></li>
					<li><?php echo anchor('about/index', 'About'); ?></li>
					<li><?php echo anchor('contact/view_feedbacks', 'View feedbacks'); ?></li>
					<li><?php echo anchor('login/logout', 'Logout'); ?></li>
					<?php else: ?>
					<li><?php echo anchor('site/index', 'Home'); ?></li>
					<li><?php echo anchor('gallery/index', 'Gallery'); ?></li>
					<li><?php echo anchor('about/index', 'About'); ?></li>
					<li><?php echo anchor('contact/index', 'Contact us'); ?></li>
					<li><?php echo anchor('login/index', 'Login'); ?></li>
					<?php endif; ?>
				</ul>
			</div>
			
			<div id="content-container">
			<div id="content">
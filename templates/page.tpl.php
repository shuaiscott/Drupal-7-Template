<?php
/**
 * BYU theme page to generate the markup for a single page.
 */
?>
<header id="main-header" role="banner">
	<div id="header-top" class="wrapper">
		<div id="logo">
			<h2><a class="byu" href="http://www.byu.edu/">Brigham Young University</a></h2>
		</div>
	  
		<?php if ($site_name): ?>
			<h1>
				<a href="<?php print $front_page; ?>" id="site-name" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
			</h1>
		<?php endif; ?>
	
		<a href="http://home.byu.edu/home/cas" class="sign-in button">Sign in</a>  
	  
		
	</div>
</header>

<div id="search-menu">	
	<div id="search-container" role="search">	
		<?php  print render(module_invoke('search', 'block_view')); ?>
		<a href="#primary-nav" class="menu-button">Menu</a>  
	</div>
</div>
	
<div class="nav-container">
		<nav id="primary-nav" role="navigation">
			<?php 
				if ($main_menu):
					print theme('links__system_main_menu', array(
					  'links' => $main_menu,
					  'attributes' => array(
						'class' => array(''),
					  ),
					)); 
				endif; 
			?>
		</nav>
		
		<nav id="secondary-nav" role="navigation">
			<?php if ($secondary_menu):
				print theme('links__system_secondary_menu', array(
					'links' => $secondary_menu,
					'attributes' => array(
						'class' => array(/*'links', 'inline', 'clearfix'*/),
					),
				));
			endif; ?>
		</nav>
</div>

<?php 
// Render the sidebars to see if there's anything in them.
$sidebar_left  = render($page['sidebar_left']);
$sidebar_right = render($page['sidebar_right']);
?>

<div id="content" class="wrapper clearfix <?php print ($sidebar_left && $sidebar_right ? 'two-sidebars' : ($sidebar_left || $sidebar_right ? 'one-sidebar' : '')) ?>" role="main">
	<?php print render($page['highlighted']); ?>
	<?php print $breadcrumb; ?>

	<?php print render($title_prefix); ?>
	<?php if ($title): ?>
	  <h1 class="title" id="page-title"><?php print $title; ?></h1>
	<?php endif; ?>
	<?php print render($title_suffix); ?>
	<?php print $messages; ?>
	<?php print render($tabs); ?>
	<?php print render($page['help']); ?>
	<?php if ($action_links): ?>
		<ul class="action-links"><?php print render($action_links); ?></ul>
	<?php endif; ?>
	
	 <?php if ($sidebar_left): ?>
		<aside class="sidebar">
			<?php print $sidebar_left; ?>
		</aside><!-- /.sidebars -->
    <?php endif; ?>
	
	<div id="main-content">
		<?php print render($page['content']); ?> 
	</div>
	  
	<?php if ($sidebar_right): ?>
		<aside class="sidebar">
			<?php print $sidebar_right; ?>
		</aside><!-- /.sidebars -->
	<?php endif; ?>
      
</div>

<footer role="contentinfo">
		<div id="footer-links">
			<div class="wrapper">
				<?php print render($page['footer']); ?>		
			</div>
		</div>
		
		<div id="footer-bottom">
			<div class="wrapper">
			<?php 
			if (!render($page['copyright'])): //If there is no specific content in the copyright area, display default ?> 
				<p>
					<a id="byui"  href="http://byui.edu/">BYU-Idaho</a>
					<a id="byuh"  href="http://byuh.edu/">BYU-Hawaii</a>
					<a id="ldsbc" href="http://www.ldsbc.edu/">LDS Business College</a> 
					<a id="lds"   href="http://lds.org/">The Church of Jesus Christ of Latter-day Saints</a>
				</p>
				<p><a id="copyright" href="http://home.byu.edu/home/copyright">Copyright© 2013, All Rights Reserved</a></p>
			<?php else: 
				print render($page['copyright']);
			endif; ?>
			</div>
		</div>
	
</footer>
<?php print render($page['bottom']); ?>
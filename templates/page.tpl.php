<?php
/**
 * BYU theme page to generate the markup for a single page.
 */
?>

<div id="page">

  <header id="main-header" role="banner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
    <?php endif; ?>
	  
    <?php if ($site_name): ?>
          <h1>
            <a href="<?php print $front_page; ?>" id="site-name" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
          </h1>
    <?php endif; ?>
	  
	<div class="nav-container">
		<nav id="primary-nav" class="wrapper" role="navigation">
<!--		Primary menu goes here.-->
			<?php if ($main_menu): ?>
			  <nav id="main-menu" role="navigation">
				<?php
				print theme('links__system_main_menu', array(
				  'links' => $main_menu,
				  'attributes' => array(
					'class' => array('links', 'inline', 'clearfix'),
				  ),
				  'heading' => array(
					'text' => t('Main menu'),
					'level' => 'h2',
					'class' => array('element-invisible'),
				  ),
				)); ?>
			  </nav>
			<?php endif; ?>

			<?php // print render($page['navigation']); ?>
		</nav>
		
		<nav id="secondary-nav" role="navigation">
<!--		Secondary Menu goes here.-->
			<?php if ($secondary_menu): ?>
				<nav id="secondary-menu" role="navigation">
					<?php print theme('links__system_secondary_menu', array(
						'links' => $secondary_menu,
						'attributes' => array(
							'class' => array('links', 'inline', 'clearfix'),
						),
						'heading' => array(
							'text' => $secondary_menu_heading,
							'level' => 'h2',
							'class' => array('element-invisible'),
						),
					)); ?>
				</nav>
			<?php endif; ?>
		</nav>
		
	</div>

    <?php // print render($page['header']); 
	
	// Render the sidebars to see if there's anything in them.
      $sidebar_left  = render($page['sidebar_left']);
      $sidebar_right = render($page['sidebar_right']);
	
	?>

  </header>

  <div id="main">

	  <div id="content" class="wrapper clearfix <?php print ($sidebar_left && $sidebar_right ? 'two-sidebar' : ($sidebar_left || $sidebar_right ? 'two-sidebar' : '')) ?>" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
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
		
      <?php print render($page['content']); ?>
		
      <?php print $feed_icons; ?>
    </div><!-- /#content -->

    <?php
	 if ($sidebar_left || $sidebar_right): ?>
      <aside class="sidebar">
        <?php print $sidebar_left; ?>
        <?php print $sidebar_second; ?>
      </aside><!-- /.sidebars -->
    <?php endif; ?>

  </div><!-- /#main -->

  <?php print render($page['footer']); ?>
  
<footer role="contentinfo">
		<div id="footer-links">
			<div class="wrapper">
				<div class="col alpha">	
					<h2>Footer Column 1</h2>				
					<a href="">Link 1</a>
					<a href="">Link 2</a>
					<a href="">Link 3</a>
					<a href="">Link 4</a>
				</div>
				<div class="col">
					<h2>Footer Column 2</h2>
					<a href="">Link 1</a>
					<a href="">Link 2</a>
					<a href="">Link 3</a>
					<a href="">Link 4</a>
				</div>
				
				<div class="col double">
					<h2>Footer Double Column</h2>
					<div class="left alpha">
						<a href="">Left Link 1</a>
						<a href="">Left Link 2</a>
						<a href="">Left Link 3</a>
						<a href="">Left Link 4</a>
						</div>
						
						<div class="right omega">
						<a href="">Right Link 1</a>
						<a href="">Right Link 2</a>
						<a href="">Right Link 3</a>
						<a href="">Right Link 4</a>
					</div>
				</div>
								
					
				<div class="col omega">
					<h2>Footer Column 4</h2>
					<a href="">Link 1</a>
					<a href="">Link 2</a>
					<a href="">Link 3</a>
					<a href="">Link 4</a>
				</div>
				
			</div>
		</div>
		
		<div id="footer-bottom">
			<div class="wrapper">
			<p><a id="byui" href="http://byui.edu/">BYU-Idaho</a> <a id="byuh" href="http://byuh.edu/">BYU-Hawaii</a>
			   <a id="ldsbc" href="http://www.ldsbc.edu/">LDS Business College</a> 
			   <a id="lds" href="http://lds.org/">The Church of Jesus Christ of Latter-day Saints</a>
			</p>
			<p><a id="copyright" href="http://home.byu.edu/home/copyright">Copyright© 2013, All Rights Reserved</a></p>
			</div>
		</div>
	</footer>

</div><!-- /#page -->

<?php print render($page['bottom']); ?>
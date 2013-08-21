<?php
?>

<header id="main-header">
  <div id="header-top" class="wrapper">
	<div id="logo">
	<?php	// //This should probably be moved to improve efficiency. This doesn't need to be rebuilt on each page load
	$parent_org = theme_get_setting('parent_org');
	$logo_alt = base_path() . path_to_theme() . '/logo-small.png';
	$parent_org_link = theme_get_setting('parent_org_link'); ?>
	<?php  if($parent_org != ''): ?>
			<a href="http://www.byu.edu/" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo_alt;?>" alt="BYU Logo" /></a>
			<a href="<?php print $parent_org_link ?>" id="parent"><?php print $parent_org;?></a>
	<?php else: ?>
		<a href="http://www.byu.edu/" title="<?php print t('Home'); ?>" rel="home">
		<img src="<?php print $logo; ?>" alt="BYU Logo"></a>
	<?php endif; ?>
	</div>
	
	<div id="search-container">
		<?php print render($page['header-topright']); ?>
	</div>
	
	<?php if ($site_name)
		 print "<a href=" . $front_page . " title=" . t('Home') . " id='site-name' rel='home'>". $site_name . "</a>";
	?>

	<?php if ($secondary_menu){
		print "<nav id='secondary-nav'>";
			$menu_name = variable_get('menu_secondary_links_source', 'secondary-menu');
			print drupal_render(menu_tree($menu_name));	
		print "</nav>";
		}
	?>
  </div>

	<?php if ($main_menu): ?>
		<nav id="primary-nav">
			<?php
        if (module_exists('simple_megamenu')) {
          print _renderMainMenu();
        } else {
      $menu_name = variable_get('menu_main_links_source', 'main-menu');
			print drupal_render(menu_tree($menu_name));
        }
      ?>
		</nav>
    <?php endif; ?>
	
</header>
    <div id="content" class="wrapper clearfix" role="main">
		<?php print $messages; ?>
		
		<?php if ($breadcrumb): ?>
			<div id="breadcrumb"><?php print $breadcrumb; ?></div>
		<?php endif; ?>
		
		<?php if ($page['featured']): ?>
			<div id="feature"><?php print $page['featured']; ?></div>
		<?php endif; ?>
		
		<?php print render($title_prefix); ?>
		
		<?php if ($title): ?>
		<h1 class="title" id="page-title"><?php print $title; ?></h1>
		<?php endif; ?>
		
		<?php print render($title_suffix); ?> 
		
		<?php if ($tabs = render($tabs)): ?>
			<div class="tabs"><?php print $tabs; ?></div>
		<?php endif; ?>
		
		<?php print render($page['help']); ?>
		<?php if ($action_links): ?>
			<ul class="action-links"><?php print render($action_links); ?></ul>
		<?php endif; ?>
	
		<?php if ($page['sidebar_first']): ?>
			<div class="sidebar"><?php print render($page['sidebar_first']); ?></div>
		<?php endif; ?>
		
		<div id="main-content">	
		  <?php print render($page['content']); ?>
		  <?php print $feed_icons; ?>
		</div>

	
		<?php if ($page['sidebar_second']): ?>
			<div class="sidebar omega">
				<?php print render($page['sidebar_second']); ?>
			</div>
		<?php endif; ?>
		
	</div><!-- /#main-wrapper, /.wrapper .clearfix -->
  
<footer>
	<?php if($page['footer-column1'] || $page['footer-column2'] || $page['footer-column3'] || $page['footer-column4'] || $page['footer-column5']): ?>
	<div id="footer-links">
			<div class="wrapper"> 	
				<?php if($page['footer-column1']): ?>
					<div class="col">
					<?php print render($page['footer-column1']); ?>
					</div>
				<?php endif; ?>
				
				<?php if($page['footer-column2']): ?>
					<div class="col">
					<?php print render($page['footer-column2']); ?>
					</div>
				<?php endif; ?>
				
				<?php if($page['footer-column3']): ?>
					<div class="col">
					<?php print render($page['footer-column3']); ?>
					</div>
				<?php endif; ?>
				
				<?php if($page['footer-column4']): ?>
					<div class="col">
					<?php print render($page['footer-column4']); ?>
					</div>
				<?php endif; ?>
				
				<?php if($page['footer-column5']): ?>
					<div class="col omega">
					<?php print render($page['footer-column5']); ?>
					</div>
				<?php endif; ?>

			</div>	
	</div>
	<?php endif; ?>
	
  <div id="footer-bottom">
		<div class="wrapper">
			<?php print render($page['footer-bottom']); ?>
		</div>
   </div>
   
</footer>

<?php
/**
 * BYU theme page to generate the markup for a single page.
 */
?>
  <header id="main-header" role="banner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
    <?php endif; ?>
	  
    <?php if ($site_name): ?>
          <h1>
            <a href="<?php print $front_page; ?>" id="site-name" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
          </h1>
    <?php endif; ?>
	
	<a href="http://home.byu.edu/home/cas" class="sign-in button">Sign in</a>  
	  
	<div id="search-container" role="search">
	<!--This is the default search form, linking to BYU's search page. If a user does not have javascript enabled, they'll get this form. If they have javascript, this content will be replaced with Google's custom search (from the script at the bottom of the page).--> 
	   <form id="basic-search" action="http://home.byu.edu/home/search" role="form" style="display: none;">
		 <input id="search" type="search" name="search">
		 <input id="search-submit" type="submit" value="Search">
	   </form>

		<!--This container holds the Google custom search, if enabled--> 
	   <div class="gcse-wrapper">
		   <div id="___gcse_0"><div class="gsc-control-cse gsc-control-cse-en"><div class="gsc-control-wrapper-cse" dir="ltr"><form class="gsc-search-box gsc-search-box-tools" accept-charset="utf-8"><table cellspacing="0" cellpadding="0" class="gsc-search-box"><tbody><tr><td class="gsc-input"><div class="gsc-input-box" id="gsc-iw-id1"><table cellspacing="0" cellpadding="0" id="gs_id0" class="gstl_0 " style="width: 100%; padding: 0px;"><tbody><tr><td id="gs_tti0" class="gsib_a"><input autocomplete="off" type="text" size="10" class="gsc-input" name="search" title="search" id="gsc-i-id1" style="width: 100%; padding: 0px; border: none; margin: 0px; height: auto; outline: none; background-image: url(http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif); background-color: rgb(255, 255, 255); background-position: 0% 50%; background-repeat: no-repeat no-repeat;" dir="ltr" spellcheck="false"></td><td class="gsib_b"><div class="gsst_b" id="gs_st0" style="" dir="ltr"><a class="gsst_a" href="javascript:void(0)" style="display: none;"><span class="gscb_a" id="gs_cb0">×</span></a></div></td></tr></tbody></table></div></td><td class="gsc-search-button"><input type="image" src="http://www.google.com/uds/css/v2/search_box_icon.png" class="gsc-search-button gsc-search-button-v2" title="search"></td><td class="gsc-clear-button"><div class="gsc-clear-button" title="clear results">&nbsp;</div></td></tr></tbody></table><table cellspacing="0" cellpadding="0" class="gsc-branding"><tbody><tr><td class="gsc-branding-user-defined"></td><td class="gsc-branding-text"><div class="gsc-branding-text">powered by</div></td><td class="gsc-branding-img"><img src="http://www.google.com/uds/css/small-logo.png" class="gsc-branding-img"></td></tr></tbody></table></form><div class="gsc-results-wrapper-overlay"><div class="gsc-results-close-btn" tabindex="0"></div><div class="gsc-tabsAreaInvisible"><div class="gsc-tabHeader gsc-inline-block gsc-tabhActive">Custom Search</div><span class="gs-spacer"> </span></div><div class="gsc-tabsAreaInvisible"></div><div class="gsc-above-wrapper-area-invisible"><table cellspacing="0" cellpadding="0" class="gsc-above-wrapper-area-container"><tbody><tr><td class="gsc-result-info-container"><div class="gsc-result-info-invisible"></div></td></tr></tbody></table></div><div class="gsc-adBlockInvisible"></div><div class="gsc-wrapper"><div class="gsc-adBlockInvisible"></div><div class="gsc-resultsbox-invisible"><div class="gsc-resultsRoot gsc-tabData gsc-tabdActive"><table cellspacing="0" cellpadding="0" class="gsc-resultsHeader"><tbody><tr><td class="gsc-twiddleRegionCell"><div class="gsc-twiddle"><div class="gsc-title">Web</div></div><div class="gsc-stats"></div><div class="gsc-results-selector gsc-all-results-active"><div class="gsc-result-selector gsc-one-result" title="show one result">&nbsp;</div><div class="gsc-result-selector gsc-more-results" title="show more results">&nbsp;</div><div class="gsc-result-selector gsc-all-results" title="show all results">&nbsp;</div></div></td><td class="gsc-configLabelCell"></td></tr></tbody></table><div><div class="gsc-expansionArea"></div></div></div></div></div></div><div class="gsc-modal-background-image" tabindex="0"></div></div></div></div>
	   </div>
	</div>
	  
	<a href="#" class="menu-button">Menu</a>  
	  
</header>
	
	
	
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

<?php print render($page['bottom']); ?>
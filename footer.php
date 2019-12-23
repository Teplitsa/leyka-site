<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #site_content div and all content after
 *
 */

$cc_link = '<a href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank">Creative Commons СС-BY-SA 3.0</a>';
?>
</div><!--  #site_content -->

<footer class="site-footer container">

	<div class="row">
	
		<div class="col-12 ll-mobile-menu-title">
        	<h2 class="widget-title"><?php echo get_theme_mod('ll_label_footer_menu_title1');?></h2>
		</div>
		
		<div class="col-lg-2 col-6">
            <div class="widget widget_nav_menu">
            	<h2 class="widget-title"><?php echo get_theme_mod('ll_label_footer_menu_title1');?></h2>
            	<div>
            		<?php wp_nav_menu(array('menu' => 'footer1', 'container' => false, 'menu_class' => 'menu'));?>
            	</div>
            </div>
		</div>

		<div class="col-lg-2 col-6">
            <div class="widget widget_nav_menu">
            	<h2 class="widget-title"><?php echo get_theme_mod('ll_label_footer_menu_title2');?></h2>
            	<div>
            		<?php wp_nav_menu(array('menu' => 'footer2', 'container' => false, 'menu_class' => 'menu'));?>
            	</div>
            </div>
		</div>

		<div class="col-12 ll-mobile-menu-title">
        	<h2 class="widget-title"><?php echo get_theme_mod('ll_label_footer_menu_title3');?></h2>
		</div>

		<div class="col-lg-2 col-6">
            <div class="widget widget_nav_menu">
            	<h2 class="widget-title"><?php echo get_theme_mod('ll_label_footer_menu_title3');?></h2>
            	<div>
            		<?php wp_nav_menu(array('menu' => 'footer3', 'container' => false, 'menu_class' => 'menu'));?>
            	</div>
            </div>
		</div>

		<div class="col-lg-2 col-6">
            <div class="widget widget_nav_menu">
            	<h2 class="widget-title"></h2>
            	<div>
            		<?php wp_nav_menu(array('menu' => 'footer4', 'container' => false, 'menu_class' => 'menu'));?>
            	</div>
            </div>
		</div>
		
		<div class="col-lg-4 col-12">
            <div class="about-tst">
            	<div class="logo-set">
                    <svg class="ll-logo-label-vert"><use xlink:href="#pic-logo-label-vert" /></svg>
                    <a href="https://te-st.ru/" target="_blank"><svg class="ll-test-logo-label-hor"><use xlink:href="#pic-tst-logo-label-hor" /></svg></a>
            	</div>
            	<p class="leyka-created-by"><?php echo get_theme_mod('ll_label_footer_created_by');?></p>
            	<p><?php echo get_theme_mod('ll_label_footer_created_by_explanation');?></p>
            	<p><?php echo get_theme_mod('ll_label_footer_licence');?></p>
            </div>
		</div>
		
	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
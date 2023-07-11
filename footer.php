		</main>
		<section id="footer">
			<div class="inner">
				<div class="logo-wrap">
				<?php
					if(!is_front_page()){
						echo '<a class="logo" href="' . get_home_url('/') . '">';
					}else{
						echo '<div class="logo">';
					}
					$name = get_bloginfo('name');
					echo esc_html($name);
					if(!is_front_page()){
						echo '</a>';
					}else{
						echo '</div>';
					}
				?>
				</div>
				<?php
					$nav_menu_locations = get_nav_menu_locations();
					$theme_location = 'left_footer_menu';
					if($menu = get_term($nav_menu_locations[$theme_location], 'nav_menu')){
						wp_nav_menu(array(
							'theme_location' => $theme_location,
							'container_class' => 'left-footer-menu',
							'items_wrap' => '<div class="menu-title">' . esc_html($menu->name) . '</div><ul id="%1$s" class="%2$s">%3$s</ul>',
						));
					}
					$theme_location = 'right_footer_menu';
					if($menu = get_term($nav_menu_locations[$theme_location], 'nav_menu')){
						wp_nav_menu(array(
							'theme_location' => $theme_location,
							'container_class' => 'right-footer-menu',
							'items_wrap' => '<div class="menu-title">' . esc_html($menu->name) . '</div><ul id="%1$s" class="%2$s">%3$s</ul>',
						));
					}
				?>
			</div>
		</section>
		<section id="subfooter">
			<div class="inner">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'bottom_footer_menu',
						'container_class' => 'bottom-footer-menu',
					));
					wp_nav_menu(array(
						'theme_location' => 'social_menu',
						'container_class' => 'social-menu',
					));
				?>
			</div>
		</section>
<?php wp_footer(); ?>
	</body>
</html>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<section id="header">
			<div class="inner">
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
				<input type="checkbox" id="menu-toggler">
				<label for="menu-toggler"><i></i></label>
				<label for="menu-toggler"></label>
				<div class="menu-wrapper">
					<div class="primary-menu">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'primary_menu',
						));
					?>
					</div>
				</div>
			</div>
		</section>
		<main>

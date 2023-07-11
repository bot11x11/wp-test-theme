<?php
	if(!have_rows('slides')){
	?>
<div class="acf-slider-empty"><?php _e('Add slides', 'acf-slider'); ?></div>
	<?php
	}else{
	?>
<div class="acf-slider-wrapper">
	<ul class="acf-slider">
	<?php
		$count = 0;
		while(have_rows('slides')){
			the_row();
		?>
		<li class="acf-slider-item" style="background-image: url(<?php the_sub_field('image'); ?>)">
			<div class="acf-slider-content">
				<div class="acf-slider-title"><?php the_sub_field('title'); ?></div>
				<div class="acf-slider-text"><?php echo wpautop(get_sub_field('text')); ?></div>
		<?php
			if($button_text = get_sub_field('button_text')){
			?>
				<div class="acf-slider-btn">
					<a class="btn" href="<?php echo esc_attr(get_sub_field('button_link')); ?>"><?php echo esc_html($button_text); ?></a>
				</div>
			<?php
			}
			if(have_rows('list')){
			?>
			<ul class="acf-slider-list">
			<?php
				while(have_rows('list')){
					the_row();
				?>
				<li><?php echo esc_html(get_sub_field('item')); ?></li>
				<?php
				}
			?>
			</ul>
			<?php
			}
			$count++;
		?>
			</div>
		</li>
		<?php
		}
	?>
	</ul>
	<?php
		if($count > 1){
			$pages = str_pad($count, 2, '0', STR_PAD_LEFT);

		?>
	<ul class="acf-slider-pages">
		<li class="acf-slider-current">01</li>
		<li class="acf-slider-bar"><i style="height: <?php echo 1 / $count * 100; ?>%"></i></li>
		<li class="acf-slider-last"><?php echo $pages; ?></li>
	</ul>
	<ul class="acf-slider-nav">
		<li class="acf-slider-prev"></li>
		<li class="acf-slider-next"></li>
	</ul>
		<?php
		}
	?>
</div>
	<?php
	}

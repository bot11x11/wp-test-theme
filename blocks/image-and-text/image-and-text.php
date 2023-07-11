<div class="acf-image-and-text-outer">
	<div class="acf-image-and-text-inner <?php echo esc_attr(get_field('align')); ?>">
		<div class="acf-image-and-text-text-column">
			<div class="acf-image-and-text-sub-title">
				<?php echo esc_html(get_field('sub-title')); ?>
			</div>
			<div class="acf-image-and-text-title">
				<?php echo esc_html(get_field('title')); ?>
			</div>
<?php
	if(have_rows('items')){
	?>
			<ul class="acf-image-and-text-list">
	<?php
		$count = 0;
		while(have_rows('items')){
			the_row();
		?>
				<li class="acf-image-and-text-item">
					<div class="acf-image-and-text-big-text"><?php the_sub_field('title'); ?></div>
					<div class="acf-image-and-text-text"><?php echo wpautop(get_sub_field('text')); ?></div>
				</li>
		<?php
		}
	?>
			</ul>
	<?php
	}
	if(get_field('calculator')){
		echo do_shortcode('[calculator]');
	}
?>
		</div>
		<div class="acf-image-and-text-image-column">
			<img src="<?php echo esc_html(get_field('image')); ?>">
		</div>
	</div>
</div>

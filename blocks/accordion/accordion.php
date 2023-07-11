<div class="acf-accordion-outer">
	<div class="acf-accordion-inner">
		<div class="acf-accordion-info">
			<div class="acf-accordion-sub-title">
				<?php echo esc_html(get_field('sub-title')); ?>
			</div>
			<div class="acf-accordion-title">
				<?php echo esc_html(get_field('title')); ?>
			</div>
		</div>
<?php
	if(!have_rows('items')){
	?>
		<div class="acf-accordion-empty"><?php _e('Add items', 'acf-accordion'); ?></div>
	<?php
	}else{
	?>
		<ul class="acf-accordion">
	<?php
		$count = 0;
		while(have_rows('items')){
			the_row();
		?>
			<li class="acf-accordion-item">
				<input type="checkbox" id="acf-accordion-<?php echo get_row_index(); ?>">
				<label class="acf-accordion-label" for="acf-accordion-<?php echo get_row_index(); ?>">
					<?php echo esc_html(get_sub_field('title')); ?>
				</label>
				<div class="acf-accordion-text"><?php echo wpautop(get_sub_field('text')); ?></div>
			</li>
		<?php
		}
	?>
		</ul>
	<?php
	}
?>
	</div>
</div>

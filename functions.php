<?php
class test_theme{
	private static $instance;
	public $version;
	public $text_domain;
	public static function instance(){
		if(empty(self::$instance)){
			self::$instance = new self;
			self::$instance->init();
		}
		return self::$instance;
	}
	private function init(){
		$this->version = wp_get_theme()->get('Version') . rand();
		$this->text_domain = wp_get_theme()->get('TextDomain');
		add_action('wp_enqueue_scripts', array($this, 'scripts'));
		add_action('admin_enqueue_scripts', array($this, 'scripts'));
		add_action('after_setup_theme', array($this, 'register_nav_menus'));
		add_action('after_setup_theme', array($this, 'common'));
		add_action('acf/init', array($this, 'slider'));
		add_action('acf/init', array($this, 'accordion'));
		add_action('acf/init', array($this, 'image_and_text'));
		include get_template_directory() . '/inc/calculator.php';
	}
	public function image_and_text(){
		acf_register_block_type(array(
			'name' => 'image_and_text',
			'title' => __('ACF Image and Text', $this->text_domain),
			'description' => __('A custom image and text block.', $this->text_domain),
			'render_template' => get_template_directory() . '/blocks/image-and-text/image-and-text.php',
			'enqueue_style' => get_template_directory_uri() . '/blocks/image-and-text/image-and-text.css',
		));
	}
	public function accordion(){
		acf_register_block_type(array(
			'name' => 'accordion',
			'title' => __('ACF Accordion', $this->text_domain),
			'description' => __('A custom accordion block.', $this->text_domain),
			'render_template' => get_template_directory() . '/blocks/accordion/accordion.php',
			'enqueue_style' => get_template_directory_uri() . '/blocks/accordion/accordion.css',
		));
	}
	public function slider(){
		acf_register_block_type(array(
			'name' => 'slider',
			'title' => __('ACF Slider', $this->text_domain),
			'description' => __('A custom slider block.', $this->text_domain),
			'render_template' => get_template_directory() . '/blocks/slider/slider.php',
			'enqueue_script' => get_template_directory_uri() . '/blocks/slider/slider.js',
			'enqueue_style' => get_template_directory_uri() . '/blocks/slider/slider.css',
		));
	}
	public function scripts(){
		wp_enqueue_script('script', get_template_directory_uri() .'/js/script.js', array(
			'jquery',
		), $this->version, true);
		wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), $this->version);
	}
	public function register_nav_menus(){
		register_nav_menus(array(
			'primary_menu' => __('Primary Menu', $this->text_domain),
			'left_footer_menu'  => __('Left Footer Menu', $this->text_domain),
			'right_footer_menu'  => __('Right Footer Menu', $this->text_domain),
			'bottom_footer_menu'  => __('Bottom Footer Menu', $this->text_domain),
			'social_menu'  => __('Social Menu', $this->text_domain),
		));
	}
	public function common(){
		add_theme_support('title-tag');
	}

}
test_theme::instance();

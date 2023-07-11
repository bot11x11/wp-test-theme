<?php
class test_calculator{
	private static $instance;
	public static function instance(){
		if(empty(self::$instance)){
			self::$instance = new self;
			self::$instance->init();
		}
		return self::$instance;
	}
	private function init(){	
		add_shortcode('calculator', array($this, 'calculator'));
		add_action('wp_ajax_nopriv_calculate', array($this, 'calculate'));
		add_action('wp_ajax_calculate', array($this, 'calculate'));
	}
	public function calculate(){
		if(!isset($_GET['n1'])
		|| !isset($_GET['n2'])
		|| !isset($_GET['operator'])){
			return;
		}
		$result = array();
		$n1 = floatval($_GET['n1']);
		$n2 = floatval($_GET['n2']);
		$operator = $_GET['operator'];
		if($operator == '+'){
			$result['result'] = $n1 + $n2;
		}elseif($operator == '-'){
			$result['result'] = $n1 - $n2;
		}elseif($operator == '*'){
			$result['result'] = $n1 * $n2;
		}elseif($operator == '/'){
			if(!$n2){
				$result['error'] = true;
				$result['result'] = 'NULL';
			}else{
				$result['result'] = $n1 / $n2;
			}
		}else{
			$result['error'] = true;
			$result['result'] = 'NULL';
		}
		wp_send_json($result);
	}
	public function calculator($atts = array()){
		wp_enqueue_script('calculator', get_template_directory_uri() .'/js/calculator.js', array(
			'jquery',
		), null, true);
		wp_localize_script('calculator', 'calculator_params', array(
			'ajax_url' => admin_url('admin-ajax.php'),
		));
		$atts = shortcode_atts(array(
			'title' => 'Vacation calculator',
			'result' => 'Result:',
			'n1' => 0,
			'n2' => 0,
			'operator' => '+',
		), $atts);
	?>
<div class="calculator">
	<div class="calculator-title"><?php echo esc_html($atts['title']); ?></div>
	<input type="number" name="n1" value="<?php echo esc_attr($atts['n1']); ?>">
	<select name="operator">
		<option <?php echo $atts['operator']=='+'?'selected':''; ?> value="+">+</option>
		<option <?php echo $atts['operator']=='-'?'selected':''; ?> value="-">&ndash;</option>
		<option <?php echo $atts['operator']=='*'?'selected':''; ?> value="*">x</option>
		<option <?php echo $atts['operator']=='/'?'selected':''; ?> value="/">/</option>
	</select>
	<input type="number" name="n2" value="<?php echo esc_attr($atts['n1']); ?>">
	<div class="calculator-result"><?php echo esc_html($atts['result']); ?><strong></strong></div>
</div>
	<?php
	}
}
test_calculator::instance();

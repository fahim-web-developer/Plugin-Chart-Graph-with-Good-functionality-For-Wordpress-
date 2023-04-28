<?php 
function CR_chart2($a){ 
  $ids = explode(",",$a['ids']);
 
?>
<div class="chart_content cr-chart"><img class="water_mark" src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/waterm.png'; ?>">
  <div class="header_chart">
      <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/headups.png'; ?>">
      <h2><?= $a['title'] ?></h2>
  </div>
<div class="CR_chart_content">
<div class="CR_chart">
	<?php foreach ($ids as $key => $values):?>

		<?php 
			if (isset($a[$values.'_height'])) {
				$height = $a[$values.'_height'];
			}else{
				$height = 300;
			}
		?>
	<div class="pie_chart">
		<div class="pie_chart_container">
			<div id="<?= $values ?>" style="height: <?= $height ?>px;"></div>
			<span class="over_flow"></span>
			<?php 
				$number = explode(",",$a[$values]);
				$total = array_sum($number);
			?>
		</div>
		<div class="total_sec"><span>Total ₹ <?= $total ?> cr</span></div>
	</div>
	<?php endforeach; ?>

	<script>
		 
			<?php foreach ($ids as $key => $values):
			$number = explode(",",$a[$values]); 
			$test = explode(",",$a['chart_item'])[$key];
			$total = array_sum($number);
		  $divided_per = 100/$total;

			if (isset($a[$values.'_color'])) {
			 	$color = explode(",",$a[$values.'_color']); 
			 	$newArray =array_combine($color,$number);

			 	$data = [];
			  foreach ($newArray as $key => $value) {
			  	$data[] = array('y'=>$value*$divided_per,'label'=>$value,'color' => $key);
			  }

			}else{
				$data = [];
			  foreach ($number as $value) {
			  	$data[] = array('y'=>$value*$divided_per,'label'=>$value);
			  }
			  
			}

			$collection = json_encode($data);
		  
		  ?>
			var <?= $values; ?> = new CanvasJS.Chart("<?= $values; ?>", {
				backgroundColor: "#dcdcdc",
			  title:{
					text: "<?= $test ?>",
					verticalAlign: "center",
          fontColor: "#000",
          fontSize: 22,
          fontWeight: "bold",
					dockInsidePlotArea: true
				},
				animationEnabled: true,
				backgroundColor: "#0000",width: 361,
				data: [{innerRadius: "80%",
				type: "doughnut",
				startAngle: 60,
				indexLabelFontSize: 17,
				indexLabel: "₹{label} - Cr",
				toolTipContent: "<b>{label}:</b> Cr",
				dataPoints: <?= $collection ?>
				}]
			});
			<?= $values; ?>.render();<?= $values; ?> = {};
			<?php endforeach; ?>
		 
	</script>
</div>


<?php if (isset($a['description'])): ?>
	<div class="color_det">
		<ul class="color_det_items_four">
				<?php 
					$description = explode(",",$a['description']);
					$description_color = explode(",",$a['description_color']);

					$desc =array_combine($description_color,$description);
				?>
				<?php foreach ($desc as $key => $value):?>
					<li><span style="background:<?= $key ?>;"></span><?= $value ?></li>
				<?php endforeach;?>
		</ul>
	</div>
<?php	endif;?>

<div class="chart_bottom">
	<div class="left_bottom">
		
 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/power.png'; ?>">
	</div>
	<div class="right_bottom">
 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/Entrackr.png'; ?>">
	</div>
</div>

 </div>
</div>
<?php 
}
add_shortcode("cr_chart2","CR_chart2");
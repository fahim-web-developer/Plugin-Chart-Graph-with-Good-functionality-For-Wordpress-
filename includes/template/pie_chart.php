<?php 
function Pie_chart($a){
	$ids = explode(",",$a['ids']);
?> 
<div class="chart_content cr-chart pie_charts"><img class="water_mark" src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/waterm.png'; ?>">
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
					  	$data[] = array('y'=>$value*$divided_per,'color' => $key);
					  }

					}else{
						$data = [];
					  foreach ($number as $value) {
					  	$data[] = array('y'=>$value*$divided_per);
					  }
					  
					}

					$collection = json_encode($data);
				  
				  ?>
					var <?= $values; ?> = new CanvasJS.Chart("<?= $values; ?>", {
                   
      		width: 361,
					title:{
						text: "<?= $test ?>",
						verticalAlign: "center",
            fontColor: "#333333",
            fontSize: 20,
            fontWeight: "bold",
						dockInsidePlotArea: true
					},
					legend: {
						maxWidth: 100
					},
					backgroundColor: "#0000",
                    dataPointWidth: 10,
					data: [{innerRadius: "80%",
						type: "doughnut",
						showInLegend: false,
						dataPoints: <?= $collection ?>
					}]
				});
				<?= $values; ?>.render();<?= $values; ?> = {};
				<?php endforeach; ?>
			</script>
			</div>
		</div>
		<?php if (isset($a['hidden']) && !empty($a['hidden'])): ?>
			<div class="hidden_data">
				<div class="header_chart_content">
				<span>
		      This data is hidden
		      <br>
		      To view Please go to <?= $a['hidden']; ?>
		      <a class="view_full" href="<?= $a['hidden']; ?>">View Full Data</a>
		    </span>
		    </div>
			</div>
			</div>
		<?php endif; ?>
	<div class="chart_bottom">
		<div class="left_bottom">
	 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/power.png'; ?>">
		</div>
		<div class="right_bottom">
	 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/Entrackr.png'; ?>">
		</div>
	</div>
 
 <div class="view_full_data">
    <p>To download complete revenue breakdown visit <br>thekredible.com</p>
    <a href="https://thekredible.com/">View full data</a>
    <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/kre.png'; ?>">
  </div>
 <style type="text/css">
  .header_chart {
    border-top: 1px solid #ddd;
  }
  .view_full_data {
    display: flex;
    justify-content: space-between;
    background: #C60000;
    align-items: center;
    padding: 15px 20px;
    border-radius: 8px;
    margin-top: 10px;
  }
  .view_full_data p {
    margin: 0;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
  }
  .view_full_data a {
    background: #fff;
    border-radius: 5px;
    padding: 9px 11px;
    color: #C60000;
    font-size: 14px;
    line-height: 16px;
    text-decoration: none;
}
 </style>
<?php 
}
add_shortcode("pie_chart","Pie_chart");
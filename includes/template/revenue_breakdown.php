<?php 
function Revenue_breakdown($a){
?> 
<div class="chart_content fy-table">
  <div class="header_chart">
      <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/headups.png'; ?>">
      <h2><?= $a['title'] ?></h2>
  </div>
<div class="pie__chart">
	<div id="chartContainer" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
	<span class="over_flow"></span>
</div> 
 <div class="chart_bottom">
	<div class="left_bottom">
 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/power.png'; ?>">
	</div>
	<div class="right_bottom">
 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/Entrackr.png'; ?>">
	</div>
</div>
</div>

<script>
	var chart = new CanvasJS.Chart("chartContainer", {
		backgroundColor: "#dcdcdc",
	  title: {
	      text: ""
	  },
	  data: [
	      {
		type: "doughnut",
		startAngle: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [<?php echo  $a['data']; ?>]
	 }, 
  ]
});
chart.render();
</script>
<?php 
}
add_shortcode("revenue_breakdown","Revenue_breakdown");
<?php 
function Apexcharts($a){ 
?>
<div class="chart_content cr-chart">
	<img class="water_mark" src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/waterm.png'; ?>">
  <div class="header_chart">
      <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/headups.png'; ?>">
      <h2><?= $a['title'] ?></h2>
  </div>
  <div class="CR_chart_content">
	<div id="chart"></div>
  </div>
<div class="chart_bottom">
		<div class="left_bottom">
			
	 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/power.png'; ?>">
		</div>
		<div class="right_bottom">
	 		<img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/Entrackr.png'; ?>">
		</div>
	</div>
</div><div class="view_full_data">
    <p>To download complete revenue breakdown visit <br>thekredible.com</p>
    <a href="https://thekredible.com/">View full data</a>
    <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/kre.png'; ?>">
  </div>
<script type="text/javascript">

 
	var myArray = {<?= $a['on'] ?>};

	var options = {
					w:1,
          series: [<?= $a['value'] ?>],
	          chart: {
	          width: 500,
	          type: 'donut', 
	        },
	        tooltip: {
	        	custom: function({ series, seriesIndex, dataPointIndex, w }) {
	        		if (myArray[series[seriesIndex]] == 0) {
	        			return (
					      	"hidden"
					      ); 
	        		}else{
	        			return (
					      	series[seriesIndex]
					      );
	        		}
				      
				    } 
	        },
	        colors: [<?= $a['colors'] ?>],
	        labels: [<?= $a['labels'] ?>],
	        dataLabels: {
	          enabled: false
	        },
	        backgroundColor: "#0000",
	         responsive: [{
	          breakpoint: 480,
	          options: {
	            chart: {
	              width: 350
	            },legend: {
	          position: 'bottom',
	          offsetY: 0, 
	        },
	          }
	        }],
	        legend: {
	          position: 'right',
	          offsetY: 0, 
	        },
	        plotOptions: {
				pie: {
					donut: {
						labels: {
							show: false,
							total: {
								show: true,
								label: '',
								formatter: () => '₹',
							}
						}
					}
				}
			},

        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
        function appendData() {
        var arr = chart.w.globals.series.slice()
        arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
        return arr;
      }
      
      function removeData() {
        var arr = chart.w.globals.series.slice()
        arr.pop()
        return arr;
      }
      
      function randomize() {
        return chart.w.globals.series.map(function() {
            return Math.floor(Math.random() * (100 - 1 + 1)) + 1
        })
      }
      
      function reset() {
        return options.series
      }
      
      document.querySelector("#randomize").addEventListener("click", function() {
        chart.updateSeries(randomize())
      })
      
      document.querySelector("#add").addEventListener("click", function() {
        chart.updateSeries(appendData())
      })
      
      document.querySelector("#remove").addEventListener("click", function() {
        chart.updateSeries(removeData())
      })
      
      document.querySelector("#reset").addEventListener("click", function() {
        chart.updateSeries(reset())
      })
</script>


<style type="text/css">
	circle#SvgjsCircle1009 {
    	fill: #e63412;r: 60px;
	}text#SvgjsText1035 {
    fill: #fff;
    font-size: 50px;
}
.apexcharts-text.apexcharts-datalabel-label {
    display: none;
}

div#chart:after {
    content: "₹";
    position: absolute;
    top: 46%;
    left: 0;
    font-size: 48px;
    width: 25%;
    text-align: right;
    color: #fff;
}
@media (max-width: 991px){
    div#chart:after {
        width: 30%;
    }
}
@media (max-width: 480px){
    top: 22%;
    left: 0;
    right: 0;
    font-size: 35px;
    width: 91%;
    text-align: center;
}
}

 


</style>
<?php 
}
add_shortcode("apexcharts","Apexcharts");
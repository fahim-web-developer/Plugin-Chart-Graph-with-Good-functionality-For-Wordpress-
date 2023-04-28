<?php 
function Financials2($a){ 
?>
<div class="financials-content chart_content2">
  <img class="water_mark" src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/waterm.png'; ?>">
  <div class="left_det">Amount in ₹ Cr</div>
  <div class="header_chart">
      <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/headups.png'; ?>">
      <h2><?= $a['title'] ?></h2>
  </div>
  <div class="financials_chart">
    <div id="ticks">
      <div class="tick"><p></p></div>
      <div class="tick"><p>500</p></div>
      <div class="tick"><p>250</p></div>
      <div class="tick"><p>0</p></div>
      <div class="tick"><p>-250</p></div>
      <div class="tick"><p>-500</p></div>
      <div class="tick"><p></p></div>
    </div>
    <div class="chart_details">
      <?php 
      $chart_item = explode(",",$a['chart_item']);
      $chart_color_item = explode(",",$a['chart_color_item']);
      $chart_item_color = array_combine($chart_item,$chart_color_item);

      foreach ($chart_item_color as $key => $value):?>
        <div class="items <?= $key ?>">
          <span style="background:<?= $value ?>"></span><?= $key ?>
        </div>  
      <?php endforeach; ?>
    </div>
    <div class="ticks_chart">
      <div class="upper_chart">
         <?php 
          $ids = explode(",",$a['ids']);
          
          foreach ($ids as $id => $value):?>
            <div class="chart_items chart_<?= $value ?>">
              <?php

                if (!empty($a[$value.'_up'])):
                  $upVal = explode(",",$a[$value.'_up']);

                  $chart_color_item = explode(",",$a['chart_color_item']);
                  $upVals = array_combine($upVal,$chart_color_item);
                  $i = 0;
                  foreach ($upVals as $key => $value):
                    if(is_string($key)):

              ?>
                  <div style="height: 134%;" class="hidden">
                    <b><?= explode(",",$a['chart_item'])[$i] ?></b>
                    <span>
                      This data is hidden
                      <br>
                      To view Please go to <?= $key; ?>
                      <br>
                      <a class="view_full" href=<?= $key; ?>>View Full Data</a>
                    </span>
                  </div>
                  <?php continue; ?>
                  <?php endif ?>
                <div class="des_bar" style="height: <?= $key*.26; ?>px;background: <?= $value ?> ;color: <?= $value ?> ;">
                   <?php if ($i == 1):?>

                    <div class="percent_chart" id="percent_chart_<?= $id ?>"><?= explode(",",$a['percent'])[$id] ?></div>

                  <?php endif; ?>
                  <span>INR <?= $key; ?></span>
                </div>


                <div class="mobile_bar" style="height: <?= $key*.132; ?>px;background: <?= $value ?> ;color: <?= $value ?> ;">
                   <?php if ($i == 1):?>

                    <div class="percent_chart" id="percent_chart_<?= $id ?>"><?= explode(",",$a['percent'])[$id] ?></div>

                  <?php endif; ?>
                  <span>INR <?= $key; ?></span>
                </div>

                <?php $i++; ?>
              <?php endforeach; ?>
              <?php endif; ?>
            </div> 
          <?php endforeach; ?> 
      </div>
      <div class="lower_chart">
        <?php 
        $ids = explode(",",$a['ids']);
        foreach ($ids as $values):?>
          <div class="chart_items chart_<?= $values ?>">
            <?php
            if (!empty($a[$values.'_down'])):
              $upVal = explode(",",$a[$values.'_down']);
              $chart_color_item = explode(",",$a['chart_color_item']);
              $upVals = array_combine($upVal,$chart_color_item);
              $i =0;
              foreach ($upVals as $key => $value):
                if(is_string($key)):
            ?>
                <div style="height: 134%;" class="hidden">
                  <b><?= explode(",",$a['chart_item'])[$i] ?></b>
                    <span>
                      This data is hidden
                      <br>
                      To view Please go to <?= $key; ?>
                      <a class="view_full" href=<?= $key; ?>>View Full Data</a>
                    </span>
                  </div>
                  <?php continue; ?>
                <?php endif ?>
              <div  class="des_bar" style="height: <?= $key*.26; ?>px;background: <?= $value ?> ;">

                <?php if ($i == 1):?>
                  <?php if ($values == 'three'): ?>
                      <div class="percent_chart" id="percent_chart_2"><?= explode(",",$a['percent'])[2] ?></div>
                  <?php else: ?>
                      <div class="percent_chart" id="percent_chart_3"><?= explode(",",$a['percent'])[3] ?></div>
                  <?php endif; ?>
                  <?php endif; ?>
                <span>INR <?= $key; ?></span>
              </div>
              <div class="mobile_bar" style="height: <?= $key*.132; ?>px;background: <?= $value ?> ;">

                <?php if ($i == 1):?>
                  <?php if ($values == 'three'): ?>
                      <div class="percent_chart" id="percent_chart_2"><?= explode(",",$a['percent'])[2] ?></div>
                  <?php else: ?>
                      <div class="percent_chart" id="percent_chart_3"><?= explode(",",$a['percent'])[3] ?></div>
                  <?php endif; ?>
                  <?php endif; ?>
                <span>INR <?= $key; ?></span>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          <?php endif; ?>
          </div> 
        <?php endforeach; ?>  
      </div>
      <div class="bottom_chart">
        <?php 
          $footer = explode(",",$a['footer']);
          foreach ($footer as $value):?>
            <div class="chart_items">
              <p><?= $value ?></p>
            </div>  
          <?php endforeach; ?>
        </div>  
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

   .chart_content2 .upper_chart .chart_items div#percent_chart_0:before {
      background-image: url(<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/gin.png'; ?>);
      background-repeat: no-repeat;
      content: " ";
      width: 220px;
      height: 200px;
      position: absolute;
      left: -33px;
      top: 3px;
  }
  .chart_content2 .upper_chart .chart_items div#percent_chart_1:before {
      background-image: url(<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/rin.png'; ?>);
      background-repeat: no-repeat;
      content: " ";
      width: 220px;
      height: 200px;
      position: absolute;
      left: -33px;
      top: 3px;
  }
   .chart_content2 .chart_items div#percent_chart_2:before,
   .chart_content2 .chart_items div#percent_chart_3:before {
      background-image: url(<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/rup.png'; ?>);
      background-repeat: no-repeat;
      content: " ";
      width: 220px;
      height: 200px;
      position: absolute;
      left: -7px;
      top: 17px;
    }

     @media (max-width: 767px){
      .percent_chart {
    top: -20px;
}
.chart_content2 .upper_chart .chart_items div#percent_chart_1:before {
    width: 24px;
    height: 18px;
    left: -16px;
    top: 13px;
    background-size: 15px;
}

.chart_content2 .upper_chart .chart_items div#percent_chart_1:before {
    width: 24px;
    height: 27px;
    left: -25px;
    top: 13px;
}
.chart_content2 .upper_chart .chart_items div#percent_chart_0:before {
    width: 22px;
    height: 22px;
    left: -20px;
    top: 3px;
    background-size: 15px;
}.chart_content2 .chart_items div#percent_chart_2:before, .chart_content2 .chart_items div#percent_chart_3:before{
    width: 22px;
    height: 22px;
    left: -12px;
    top: 0px;
    background-size: 15px;
}
     }
 </style>
<?php 
}
add_shortcode("financials-chart2","Financials2");
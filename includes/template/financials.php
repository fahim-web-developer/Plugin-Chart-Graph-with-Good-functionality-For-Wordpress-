<?php 
function Financials($a){ 
?>
<div class="financials-content chart_content">
  <img class="water_mark" src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/waterm.png'; ?>">
  <div class="left_det">Amount in ₹ Cr</div>
  <div class="header_chart">
      <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/headups.png'; ?>">
      <h2><?= $a['title'] ?></h2>
  </div>
  <div class="financials_chart">
    <div id="ticks">
      <div class="tick"><p>1000</p></div>
      <div class="tick"><p>500</p></div>
      <div class="tick"><p>0</p></div>
      <div class="tick"><p>-500</p></div>
      <div class="tick"><p>-1000</p></div>
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
          
          foreach ($ids as $value):?>
            <div class="chart_items chart_<?= $value ?>">
              <?php
                $upVal = explode(",",$a[$value.'_down']);
                $chart_color_item = explode(",",$a['chart_color_item']);
                $upVals = array_combine($upVal,$chart_color_item);
                foreach ($upVals as $key => $value):
              ?>
                <div style="height: <?= $key*.198; ?>px;background: <?= $value ?> ;">
                  <span><?= $key; ?></span>
                </div>
              <?php endforeach; ?>
            </div> 
          <?php endforeach; ?> 
      </div>
      <div class="lower_chart">
        <?php 
        $ids = explode(",",$a['ids']);
        foreach ($ids as $value):?>
          <div class="chart_items chart_<?= $value ?>">
            <?php
              $upVal = explode(",",$a[$value.'_down']);
              $chart_color_item = explode(",",$a['chart_color_item']);
              $upVals = array_combine($upVal,$chart_color_item);
              foreach ($upVals as $key => $value):
            ?>
              <div style="height: <?= $key*.198; ?>px;background: <?= $value ?> ;">
                <span><?= $key; ?></span>
              </div>
            <?php endforeach; ?>
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
 
<?php 
}
add_shortcode("financials-chart","Financials");
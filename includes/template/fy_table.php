<?php 
function Fy_table($a){ 
?>
<div class="chart_content fy-table">
  <div class="header_chart">
      <img src="<?= plugin_dir_url( dirname( __FILE__ ) ) . 'images/headups.png'; ?>">
      <h2><?= $a['title'] ?></h2>
  </div>
<div class="fy_table">
<table>
  <tr class= "head_table">
    <td></td>
    <?php 
      $chart_item = explode(",",$a['chart_item']);
      foreach ($chart_item as $key => $value):?>
      <td style="background: #fff;"><?= $value ?></td>
    <?php endforeach; ?>
  </tr>
</table>
<table>
      <?php 
      $title = explode(",",$a['data']);
      foreach ($title as $key => $value):?>
        <?php 
          $val = explode(",",$a['data_'.$key]);
        ?>
        <tr>
          <td><?= $value; ?></td>
          
          <?php foreach ($val as $key => $val):?> 
            <td style="background: #ba0015;"><?= $val; ?></td> 
          <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
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

<?php 
}
add_shortcode("fy_table","Fy_table");
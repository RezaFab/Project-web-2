<style>
        .g-scrolling-carousel .items{
            padding: 5px 0;
            background-color: #fff;
        }
        .g-scrolling-carousel .items a {
            display: inline-block; /* notice the comments between inline-block items */
            text-align: center;
            text-decoration: none;
        }
    </style>
<div class="container-fluid">
    <div style="margin-top:101px;background-image: url(<?= base_url('hero/hero.jpg') ?>);background-repeat:no-repeat; background-size:2000px; background-position: center center;" class="box">
        <div class="text">
        <h3 class="heading"><b>Design anything.</b></h3>
        <br>
        <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <form class="search_form" action="<?= base_url('Search') ?>" method="get">
    <input type="text" class="form-control search" name="key" placeholder="Search">
    <input type="hidden" class="form-control search" name="id" value="<?= $_GET['id'] ?>">
    </form>
  </div>
      </div>
    </div> 
</div>
    <br>
    <br>
    <hr>
    <?php 
      $design = $this->db->query("SELECT design_category FROM tbl_design GROUP BY design_category ")->result_array();
      $n=1; foreach($design as $d):
      $ctgry =  $d['design_category'];
      $ctgr = $this->db->query("SELECT * FROM tbl_design WHERE design_category = '$ctgry' LIMIT 10 ")->result_array();
    ?>
    <div class="container-fluid">
      <table style="width: 100%;">
        <tr>
          <td><h3><?= $ctgry ?></h3></td>
          <td style="text-align: right;color:black;"><a href="<?= base_url('Search?category='.$ctgry) ?>">See all</a></td>
        </tr>
      </table>
    <div class="g-scrolling-carousel g<?= $n++ ?>">
  <div class="items i<?= $n++ ?>">
  <?php foreach($ctgr as $c): 
        if ($c['design_width']>2000 && $c['design_height']>2000) {
          $w = $c['design_width']/13;
        $h = $c['design_height']/13;
        }elseif($c['design_width']>2000 || $c['design_height']>2000){
          $w = $c['design_width']/5;
        $h = $c['design_height']/5;
        }elseif($c['design_width']>1000 && $c['design_height']>1000){
          $w = $c['design_width']/5;
        $h = $c['design_height']/5;
        }elseif($c['design_width']>1000 || $c['design_height']>1000){
          $w = $c['design_width']/5;
        $h = $c['design_height']/5;
        }elseif($c['design_width']<1000 && $c['design_height']<1000){
        $w = $c['design_width']/2.3;
        $h = $c['design_height']/2.3;
        }
        ?>
    <a href="<?= base_url('Editor?design='.$c['design_id'].'&level=c&id='.$_GET['id']) ?>"><div style="width:<?= $w ?>px;height:<?= $h ?>px;background-image: url(<?= base_url('design/'.$c['design_image']) ?>);background-size:<?= $w ?>px <?= $h ?>px;" class="item"></div></a>
    <?php endforeach ?>
  </div>
</div>
    </div>
    <?php endforeach ?>
<!-- Default box -->
<div class="row">

  <div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php $phval = 0; foreach ($phInfo as $item) {
          $phval = $phval + $item->warning;
        } echo $phval; ?></h3>
        <p>Peringatan PH Kolam Ikan</p>
      </div>
      <div class="icon">
        <i class="fa fa-magic"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php $tempval = 0; foreach ($tempInfo as $item) {
          $tempval = $tempval + $item->warning;
        } echo $tempval; ?></h3>
        <p>Peringatan Suhu Kolam Ikan</p>
      </div>
      <div class="icon">
        <i class="fa fa-eyedropper"></i>
      </div>
    </div>
  </div>

  <!-- ./col -->
</div>

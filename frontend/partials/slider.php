<?php
// $slaid1 = [
//   'src'=>'../global_assets/img/carsol1.jpg',
//   'tittle'=>'Best Quality Food',
//   'caption'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
// ];
// $slaid2 = [
//   'src'=>'../global_assets/img/carsol3.jpg',
//   'tittle'=> 'Well Dedication',
//   'caption'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
// ];
// $slaid3 = [
//   'src'=>'../global_assets/img/silder3.jpg',
//   'tittle'=>'Testy & Jussy',
//   'caption'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
// ];

// $slaids = [$slaid1,$slaid2,$slaid3];
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php');
$sliderjason = file_get_contents($frontenddatasource . "slider.json");
$slideritems = json_decode($sliderjason);
?>








<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <?php
    $active = 'active';
    foreach ($slideritems as $key => $slaideritem) :

      // if (0 == $key) {
      //   $active = 'active';
      // } else {
      //   $active = '';
      // }
    ?>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key ?>" class="<?= $active ?>" aria-current="true" aria-label="Slide 1"></button>
    <?php
    endforeach
    ?>
    <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
  </div>
  <div class="carousel-inner">
    <?php
    $active = 'active';
    foreach ($slideritems as $key=> $slaideritem) :
    ?>
      <div class="carousel-item  <?=$slaideritem->id == 1 ? $active : "" ?>">
        <img src="<?=$webroot . 'uploads/' . $slaideritem->src  ?>" class="d-block w-100" alt="<?=$slaideritem->alt?>">
        <div class="carousel-caption ">
          <h5 style="color: white;"><?= $slaideritem->tittle ?></h5>
          <p style="color: white;"><?= $slaideritem->caption ?></p>
          <p><a href="#" class="btn btn-warning mt3">Show More</a></p>
        </div>
      </div>
    <?php
    endforeach
    ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php');
$outdoorlist = file_get_contents($frontenddatasource . "outdoorlist.json");
$outdoorlists = json_decode($outdoorlist);



?>

<?php
foreach ($outdoorlists as $key => $productitem) :

?>
  <div class="col-12 col-md-12 col-lg-4 gy-4">
    <div class="card  text-center bg-white pb-2">
      <div class="card-body text-dark">
        <div class="img-area mb-4">
          <img src="<?= $webroot . 'uploads/' . $productitem->src  ?>" alt="" width="100%" height="100%">
        </div>
        <h3 class="card-title"><?= $productitem->tittle ?></h3>
        <p class="lead text-danger"><?= $productitem->caption ?></p>
        <a href="outdoordetails.php?id=<?=$productitem->id?>" class="btn bg-warning text-dark">See More</a>
      </div>
    </div>
  </div>

<?php
endforeach
?>


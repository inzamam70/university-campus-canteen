<?php
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php');
$productlist = file_get_contents($frontenddatasource . "productlist.json");
$productlists = json_decode($productlist);



?>

<?php
foreach ($productlists as $key => $productitem) :

?>
  <div class="col-12 col-md-12 col-lg-4 gy-4">
    <div class="card  text-center bg-white pb-2">
      <div class="card-body text-dark">
        <div class="img-area mb-4">
          <img src="<?= $webroot . 'uploads/' . $productitem->src  ?>" alt="" width="100%" height="100%">
        </div>
        <h3 class="card-title"><?= $productitem->tittle ?></h3>
        <p class="lead text-danger"><?= $productitem->caption ?></p>
        <a href="productdetails.php" class="btn bg-warning text-dark">See More</a>
      </div>
    </div>
  </div>

<?php
endforeach
?>

<!-- <div class="col-12 col-md-12 col-lg-4 gy-4">
                <div class="card  text-center bg-white pb-2">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                      <img src="../global_assets/img/nasos.jpg" alt=""  width="100%" height="100%">
                    </div>
                    <h3 class="card-title">Nasos</h3>
                    <p class="lead text-danger">20$</p>
                    <a href="productdetails.php" class="btn bg-warning text-dark">See More</a>
                  </div>
                </div>
              </div>
    
              <div class="col-12 col-md-12 col-lg-4 gy-4">
                <div class="card  text-center bg-white pb-2">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                      <img src="../global_assets/img/salad.jpg" alt=""  width="100%" height="100%">
                    </div>
                    <h3 class="card-title">Salad</h3>
                    <p class="lead text-danger">15$</p>
                    <a href="productdetails.php" class="btn bg-warning text-dark">See More</a>
                  </div>
                </div>
              </div>
              
              <div class="col-12 col-md-12 col-lg-4 gy-4">
                <div class="card  text-center bg-white pb-2">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                      <img src="../global_assets/img/rice.jpg" alt=""  width="100%" height="100%">
                    </div>
                    <h3 class="card-title">Rice</h3>
                    <p class="lead text-danger">15$</p>
                    <a href="productdetails.php" class="btn bg-warning text-dark">See More</a>
                  </div>
                </div>
              </div>
            
              <div class="col-12 col-md-12 col-lg-4 gy-4">
                <div class="card  text-center bg-white pb-2">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                      <img src="../global_assets/img/cursol1 (1).jpg" alt=""  width="100%" height="100%">
                    </div>
                    <h3 class="card-title">Fruits</h3>
                    <p class="lead text-danger">15$</p>
                    <a href="productdetails.php" class="btn bg-warning text-dark">See More</a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4 gy-4">
                <div class="card  text-center bg-white pb-2">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                      <img src="../global_assets/img/donat.jpg" alt=""  width="100%" height="100%">
                    </div>
                    <h3 class="card-title">Donat</h3>
                    <p class="lead text-danger">15$</p>
                    <a href="productdetails.php" class="btn bg-warning text-dark">See More</a>
                  </div>
                </div>
              </div>  -->
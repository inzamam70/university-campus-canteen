<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>

<?php
	use \BITM\CUMPUS\Outdoor;
	use \BITM\CUMPUS\Utility\Validator;
	use \BITM\CUMPUS\Utility\Utility;

	$out = [
		'id' => null,
		'uuid' => '',
		'src' => '',
		'alt' => '',
		'tittle' => '',
		'caption' => ''
	];
	$id = Utility::sanitize($_GET['id']);
	if (!Validator::empty($id)) {
		$outdoor = new Outdoor();
		//  $slideritems = $slider->index();
		$out = $outdoor->show($id);
    
	} else { // REfactor using Session based message
		dd("Id cannot be null or empty");
	}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Home page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="../global_assets/css/productdetails.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navber-light bg-light  ">
        <div class="container">
          <a class="navbar-brand" href="#"><span class="text-danger">Cumpus</span>Canteen</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Login.php">Log In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <form action="">
                  <div class="search-container">
                    <input type="text" placeholder="Search here.." class="search-input " >
                    <i class="fa-sharp fa-solid fa-magnifying-glass search-icon"></i>
                  </div>                
                </form>
              </li>
             
            </ul>
         
          </div>
        </div>
      </nav>


  <div class="container ">
        <div class="row mt-5">
            <div class="col-md-5 ps-lg-5 mt-3 ">
                <img src="<?= $webroot . 'uploads/' . $out->src ?>" alt="<?=$out->alt?>">
            </div>
            <div class="col-md-7">
                <p class="new text-center">NEW</p>
                <h2><?=$out->tittle?></h2>
                <p class="price"><?=$out->caption?></p>
                <p><b>Availability:</b>In Free</p>
                <p><b>Condition:</b>Good</p>
            </div>
        </div>
      </div>

  <?php include_once($partialfrontend . 'footer.php'); ?>










  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>



</body>

</html>
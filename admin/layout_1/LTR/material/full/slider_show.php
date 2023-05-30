<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>

<?php

// /** collect the intended ID */
// $id = $_GET['id'];



// /** communicate with datasource and get data for that id */
// $sliderjason = file_get_contents($frontenddatasource . "slider.json");
// $slideritems = json_decode($sliderjason);

// $slide = null;
// foreach ($slideritems as $aslide) {
// 	if ($aslide->id == $id) {
// 		$slide = $aslide;
// 		break;
// 	}
// }
use \BITM\CUMPUS\Slider;
use \BITM\CUMPUS\Utility\Validator;
use \BITM\CUMPUS\Utility\Utility;


$id = Utility::sanitize($_GET['id']);

if(Validator::empty($id)){
	$slider = new Slider();
	
	//  $slideritems = $slider->index();
	$slide = $slider->show($id);
	
}else{ // REfactor using Session based message
	d("Id cannot be null or empty");
}



?>

<!DOCTYPE html>
<html lang="en">

<?php include_once($partials . 'head.php') ?>

<body>

	<?php include_once($partials . 'nav.php') ?>


	<!-- Page content -->
	<div class="page-content">

		<?php include_once($partials . 'sidebar.php') ?>



		<!-- Main content -->
		<div class="content-wrapper">


			<?php include_once($partials . 'pageHeader.php') ?>


			<!-- Content area -->
			<div class="content">

				<?php //include_once($partials.'chart.php') 
				?>



				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-12">

						<div class="col-sm-12 col-xl-12">
							<div class="card">
								<div class="card-img-actions mx-1 mt-1">
									<img class="card-img img-fluid" src="<?= $webroot . 'uploads/' . $slide->src ?>" alt="<?= $slide->alt ?>" style="height:200px">

								</div>

								<div class="card-body">
									<div class="d-flex align-items-start flex-nowrap">
										<div>
											<h6 class="font-weight-semibold mr-2"><?= $slide->tittle ?></h6>
											<span><?= $slide->caption ?></span>
										</div>


									</div>

								</div>
								<div class="d-flex flex-wrap justify-content-center p-3">

									<a href="slider_edit.php?id=<?= $slide->id ?>" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1" style="color: blue;"><i class="icon-pencil"></i></a>
									<a href="slider_delete.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1" style="color: red;"><i class="icon-trash"></i></a>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->


			<?php include_once($partials . 'footer.php') ?>


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

</html>
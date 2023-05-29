<?php
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php'); ?>

<?php
$sliderjason = file_get_contents($frontenddatasource . "slider.json");
$slideritems = json_decode($sliderjason);
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

						<!-- Bordered table -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h5 class="card-title">Slides</h5>
								<div class="header-elements">
									<div class="list-icons">
										<a class="list-icons-item" data-action="collapse"></a>
										<a class="list-icons-item" data-action="reload"></a>
										<a class="list-icons-item" data-action="remove"></a>
									</div>
								</div>
							</div>

							<div class="card-body">
								<ul>
									<li class=""><a href="slider_index_grid.php"> Grid View</a></li>
									<li class=""><a href="slider_index.php">List View</a></li>
								</ul>
								<a href="slider_create.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: blue;"><i class="icon-plus2"></i></a> 
								<a href="slider_create.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: red;"><i class="icon-trash"></i></a>  
								<a href="slider_create.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: green;"><i class="icon-file-excel"></i></a>
								<a href="slider_create.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: red;"><i class="icon-file-pdf"></i></a>  								
								<a href="slider_create.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: green;"><i class="icon-printer2"></i></a> 
								<a href="slider_index_print.php" target="_blank" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: purple;"><i class="icon-IE"></i></a>  
								<a href="slider_index_print.php" target="_blank" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: blue;"><i class="icon-file-word"></i></a>  
							</div>

							<div class="table-responsive">
								<div class="row mx-0">

									<?php
									foreach ($slideritems as $key => $slide) :

									?>
										<div class="col-sm-6 col-xl-3">
											<div class="card">
												<div class="card-img-actions mx-1 mt-1">
													<img class="card-img img-fluid" src="<?=$webroot . 'uploads/' . $slide->src ?>" alt="<?= $slide->alt ?>" style="height:200px">

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
													<a href="slider_show.php?id=<?= $slide->id ?> " class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1 " style="color: green;"><i class="icon-zoomin3"></i></a>
													<a href="slider_edit.php?id=<?= $slide->id ?>" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1" style="color: blue;"><i class="icon-pencil"></i></a>
													<a href="slider_delete.php?id=<?= $slide->id ?>" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1" style="color: red;"><i class="icon-trash"></i></a>
												</div>
											</div>
										</div>
									<?php
									endforeach
									?>

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
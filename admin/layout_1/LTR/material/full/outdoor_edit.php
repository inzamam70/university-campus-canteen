<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>

<?php
use \BITM\CUMPUS\Outdoor;
use \BITM\CUMPUS\Utility\Validator;
use \BITM\CUMPUS\Utility\Utility;

$id = Utility::sanitize($_GET['id']);
if (!Validator::empty($id)) {
	$outdoor = new Outdoor();
	$out = $outdoor->edit($id);
}else{
	dd("Id cannot be null or empty");
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
                    <div class="card">
					
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Edit Slide Information</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="product_edit_processor.php" method="post" enctype="multipart/form-data">
								<input name="id" type="text" class="form-control"  value="<?=$out->id?>" />
										<input name="uuid" type="text" class="form-control"  value="<?=$out->uuid?>" />
									<div class="form-group">
										<label>Title</label>
										<input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?=$out->tittle?>" >
									</div>

									<d	iv class="form-group">
										<label>Caption</label>
										<input name="caption" type="text" class="form-control" placeholder="Enter Caption" value="<?=$out->caption?>">
									</d>

									<div class="form-group">
										<label>Alt</label>
										<input name="alt" type="text" class="form-control" placeholder="Alter" value="<?=$out->alt?>">
									</div>										
                                    <div class="form-group">
										<label>Upload Picture</label>
										<input type="file" name="picture" class="form-control" placeholder="Upload Picture">
										<img src="<?=$webroot . 'uploads/' .$out->src?>" style="height:100px" >
										<input type="text" name="old_picture" class="form-control" value="<?=$out->src?>">
									</div>


									<div class="d-flex justify-content-start align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
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
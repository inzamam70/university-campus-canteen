<?php
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php');
$productjason = file_get_contents($frontenddatasource . "productlist.json");
$productitems = json_decode($productjason);
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
						<?php
						$message = flush_session('message');
						if($message):
						?>
						<div class="alert alert_success"><?=$message?></div>
						<?php
						endif
						?>
						
							<div class="card-header header-elements-inline">
								<h5 class="card-title">Product list</h5>
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
									<li><a href="slider_index_grid.php">Grid View</a></li>
									<li><a href="slider_index.php">List View</a></li>
								</ul>
								<a href="add_product.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: blue;"><i class="icon-plus2"></i></a> 
								<a href="slider_delete.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: red;"><i class="icon-trash"></i></a>  
								<a href="slider_download_xl.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: green;"><i class="icon-file-excel"></i></a>
								<a href="slider_download_pdf.php" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: red;"><i class="icon-file-pdf"></i></a>  								
								<a href="slider_index_print.php" target="_blank" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: green;"><i class="icon-printer2"></i></a>
								<a href="slider_index_print.php" target="_blank" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: purple;"><i class="icon-IE"></i></a>  
								<a href="slider_index_print.php" target="_blank" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple" style="color: blue;"><i class="icon-file-word"></i></a>  
							</div>

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Title</th>
											<th>Src</th>
											<!-- <th>Alt</th> -->
											<th>Caption</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										<?php
										foreach ($productitems as $key => $slide) :?>


											<tr>
												<td title="<?= $slide->uuid ?>"><?= ++$key ?></td>
												<td><?= $slide->tittle ?></td>
												<td><img src="<?=filter_var($slide->src,FILTER_VALIDATE_URL)? $slide->src : $webroot.'uploads/'.$slide->src ?>" style="width:60px;height:60px"></td>
												
												<td><?= $slide->caption ?></td>
												<td>
													<div class="d-flex justify-content-between  p-3">
														<a href="product_show.php?id=<?= $slide->id ?> " class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1 " style="color: green;"><i class="icon-zoomin3"></i></a>
														<a href="product_edit.php?id=<?=$slide->id ?>" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1" style="color: blue;"><i class="icon-pencil"></i></a>
														
														<form action="productlist_delete.php" method="post">
														
														<button type="submit" onclick="return confirm('Are You Confirm?')" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2 legitRipple mx-1" style="color: red;"><i class="icon-trash"></i></button>
															<input type="hidden" name="id" value="<?=$slide->id?>">
														</form>
													</div>
												</td>
											</tr>
										<?php
										endforeach
										?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /bordered table -->



					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->


			<?php include_once($partials . 'footer.php') ?>


		</div>
		<!-- /main content -->
		<!-- <a href="slider_show.php?id=<?= $slide->id ?>">Show</a> | Edit | Delete | Activate/InActive | Copy -->

	</div>
	<!-- /page content -->

</body>

</html>
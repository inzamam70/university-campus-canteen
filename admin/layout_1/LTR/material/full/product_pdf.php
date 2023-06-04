<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php'); ?>
<?php

$productjason = file_get_contents($frontenddatasource . "productlist.json");
$productitems = json_decode($productjason);



$productitemsHTMLStart =<<<SLIDE


<h1> All Sliders </h1>

<table border="1">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Src</th>
									<th>Alt</th>
									<th>Caption</th>
									
								</tr>
							</thead>
							<tbody>



SLIDE;

?>
<?php
	$slideHTMLContent = null;
	$src = null;
    foreach($productitems as $key=>$slide):
		$ser = ++$key;
		$src = $webroot . 'uploads/' . $slide->src;
		$slideHTMLContent .=<<<TR

			<tr>
				<td title="$slide->uuid">$ser</td>
				<td>$slide->tittle</td>
				<td><img src="$src" style="width:100px;height:100px"></td>
				<td>$slide->alt</td>
				<td>$slide->caption</td>
				
			</tr>

	TR;
	
	endforeach;
	
	$slideHTMLEnd = <<<EOF
			</tbody>
			</table>
	

	EOF;


	$slideHTMLList = $productitemsHTMLStart.$slideHTMLContent.$slideHTMLEnd;

	//echo $slideHTMLList;



	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($slideHTMLList);
	$mpdf->Output();
    ?> 
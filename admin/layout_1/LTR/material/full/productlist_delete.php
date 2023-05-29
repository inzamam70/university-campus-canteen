<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php
$id =$_POST['id'];

$productjason = file_get_contents($frontenddatasource . "productlist.json");
$productitems = json_decode($productjason);
foreach($productitems as $key=>$slide){
    if($slide->id == $id){
        break;
    }
}

unset($productitems[$key]);
$productitems = array_values($productitems);
$data_slides = json_encode($productitems);

if(file_exists($frontenddatasource . "productlist.json")){
    $result = file_put_contents($frontenddatasource . "productlist.json" ,$data_slides);
    if($result){
        redirect('product.php');
    }
    }
    else{
        echo "file not found";
    }
    
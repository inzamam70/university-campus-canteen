<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php


$filename = $_FILES['image']['name'];
$filename = uniqid()."_".$_FILES['image']['name'];

$target = $_FILES['image']['tmp_name'];
$destination = $uploads.$filename;

$src = null;
if(upload($target, $destination)){
    $src = $filename ;
}


// $id = $_POST['id'];
// $uuid = $_POST['uuid'];
// $src = $_POST['url'];
$alt =  $_POST['alt'];
$title = $_POST['title'];
$caption = $_POST['caption'];
$url = $_POST['url'];


$slide = [
    'id' => $id,
    'uuid' => $uuid,
    'src' => $src,
    'alt' => $alt,
    'tittle' => $title,
    'caption' => $caption,
    'url' => $url
];


$curentUniqueId = null;


$productjason = file_get_contents($frontenddatasource . "productlist.json");
$productitems = json_decode($productjason);

if(count($productitems) > 0){


$ids = [];
foreach($productitems as $aslide){
    $ids[] = $aslide->id;
}
    sort($ids);
    $lastIndex = count($ids)-1;
    $highestId = $ids[$lastIndex];
    $curentUniqueId = $highestId+1;
}else{
    $curentUniqueId = 1;
}






$slide['id'] = $curentUniqueId ;

$productitems[] = (object) $slide;
$data_slides = json_encode($productitems);
// dd($data_slides);


if(file_exists($frontenddatasource . "productlist.json")){
$result = file_put_contents($frontenddatasource . "productlist.json" ,$data_slides);

}
else{
    echo "file not found";
}
if($result){
    redirect('product.php');
}




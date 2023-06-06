<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

use BITM\CUMPUS\Config;
use \BITM\CUMPUS\Slider;
use \BITM\CUMPUS\Utility\Utility;
use \Intervention\Image\ImageManager;


$manager = new ImageManager(['driver' => 'imagick']);
$src = null;
$filename = uniqid() . "_" . $_FILES['image']['name'];
if (!empty($_FILES['image']['name'])) {
   
    try {
        $img = $manager->make($_FILES['image']['tmp_name'])
            ->resize(300, 200)
            ->save($uploads . $filename);
        $src = $filename;
       
    } catch (Intervention\Image\Exception\NotWritableException $e) {

        d($e);
    } catch (Exception $e) {
        d($e);
    }
}

$slider = new Slider();

$slider->alt = Utility::sanitize($_POST['alt']);
$slider->tittle = Utility::sanitize($_POST['title']);
$slider->caption = Utility::sanitize($_POST['caption']);

// $slider->created_by = "created-sdf";
// $slider->updated_by = "created-sdf";

$slider->src = $src;
$slider->uuid = Utility::uuid();

if(Config::$driver == 'mysql'){
    $result = $slider->store2($slider);
}elseif(Config::$driver == 'json'){
    $result = $slider->store($slider);
}


if ($result) {
    redirect("slider_index.php");
} else {
    echo "Data is not stored";
}

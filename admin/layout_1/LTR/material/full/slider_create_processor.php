<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

use \BITM\CUMPUS\Slider;
use \BITM\CUMPUS\Utility\Utility;
use \Intervention\Image\ImageManager;
// use Intervention\Image\ImageManager::createDriver;

// $filename = $_FILES['image']['name'];
// $filename = uniqid() . "_" . $_FILES['image']['name'];

// $target = $_FILES['image']['tmp_name'];
// $destination = $uploads . $filename;

// $src = null;
// if (upload($target, $destination)) {
//     $src = $filename;
// }

// // $id = $_POST['id'];
// // $uuid = $_POST['uuid'];
// // $src = $_POST['url'];
// $alt =  $_POST['alt'];
// $title = $_POST['title'];
// $caption = $_POST['caption'];


// $slide = [
//     // 'id' => $id,
//     // 'uuid' => $uuid,
//     'src' => $src,
//     'alt' => $alt,
//     'tittle' => $title,
//     'caption' => $caption
// ];


// $curentUniqueId = null;


// $sliderjason = file_get_contents($frontenddatasource . "slider.json");
// $slideritems = json_decode($sliderjason);

// if (count($slideritems) > 0) {

//     $ids = [];
//     foreach ($slideritems as $aslide) {
//         $ids[] = $aslide->id;
//     }
//     sort($ids);
//     $lastIndex = count($ids) - 1;
//     $highestId = $ids[$lastIndex];
//     $curentUniqueId = $highestId + 1;
// } else {
//     $curentUniqueId = 1;
// }






// $slide['id'] = $curentUniqueId;

// $slideritems[] = (object) $slide;
// $data_slides = json_encode($slideritems);
// // dd($data_slides);


// if (file_exists($frontenddatasource . "slider.json")) {
//     $result = file_put_contents($frontenddatasource . "slider.json", $data_slides);
// } else {
//     echo "file not found";
// }
// if ($result) {
//     redirect('slider_index.php');
// }



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
$slider->src = $src;

$result = $slider->store($slider);

if ($result) {
    redirect("slider_index.php");
} else {
    echo "Data is not stored";
}

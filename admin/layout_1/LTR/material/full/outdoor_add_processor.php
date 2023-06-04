<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php
use \BITM\CUMPUS\Outdoor;
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
$outdoor = new Outdoor();

$outdoor->alt = Utility::sanitize($_POST['alt']);
$outdoor->tittle = Utility::sanitize($_POST['title']);
$outdoor->caption = Utility::sanitize($_POST['caption']);
$outdoor->src = $src;

$result = $outdoor->store($outdoor);

if ($result) {
    redirect("product_index.php");
} else {
    echo "Data is not stored";
}



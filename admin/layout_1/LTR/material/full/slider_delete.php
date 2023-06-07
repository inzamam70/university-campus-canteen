<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

    
use \BITM\CUMPUS\Slider;
use \BITM\CUMPUS\Utility\Validator;
use \BITM\CUMPUS\Utility\Utility;
 
$id = Utility::sanitize($_POST['id']);
$oldImage = Utility::sanitize($_POST['old_image']);

$slide = new Slider();


if($slide->destroy2($id)){
   
    if(isset($old_image) && file_exists($frontenddatasource . "slider.json") ){
        unlink($frontenddatasource.$oldImage);
    }
    else{
        echo "file not found";
    }
    set_session('success', 'Slider deleted');
    redirect('slider_index.php');
}

 ?>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

use \BITM\CUMPUS\Outdoor;
use \BITM\CUMPUS\Utility\Validator;
use \BITM\CUMPUS\Utility\Utility;

$id = Utility::sanitize($_POST['id']);
$oldImage = Utility::sanitize($_POST['old_image']);

$outdoor = new Outdoor();
if($outdoor->destroy($id)){
   
    if(isset($old_image) && file_exists($frontenddatasource . "outdoorlist.json") ){
        unlink($frontenddatasource.$oldImage);
    }
    else{
        echo "file not found";
    }
    set_session('success', 'product deleted');
    redirect('outdoor_index.php');
}
?>
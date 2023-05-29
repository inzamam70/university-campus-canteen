<?php
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php');
$sliderjason = file_get_contents($frontenddatasource . "slider.json");
$slideritems = json_decode($sliderjason);
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once($partials . 'head.php') ?>

<body style="   padding-left:100px">
    <h1>All Slides</h1>
    <table border="1" style="height: 400px;width:600px; ">
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

            <?php
            foreach ($slideritems as $key => $slide) : ?>


                <tr>
                    <td title="<?= $slide->uuid ?>"><?= ++$key ?></td>
                    <td><?= $slide->tittle ?></td>
                    <td><img src="<?= filter_var($slide->src, FILTER_VALIDATE_URL) ? $slide->src : $webroot . 'uploads/' . $slide->src ?>" style="width:60px;height:60px"></td>
                    <td><?= $slide->alt ?></td>
                    <td><?= $slide->caption ?></td>
                    <td>

                </tr>
            <?php
            endforeach
            ?>
        </tbody>
    </table>




</body>

</html>
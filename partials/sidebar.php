<?php

use function PHPSTORM_META\map;

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php');
$navItemsInJson = file_get_contents($mainnavitems . "navitems.json");
$navItems = json_decode($navItemsInJson);




?>

<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">




    <!-- Sidebar content -->
    <div class="sidebar-content">

        <?php //include_once($partials."profile.php"); 
        ?>


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <?php foreach ($navItems as $ket => $slide) : ?>
                    <li class="nav-item <?= isset($slide->subnav) ? 'nav-item-submenu' : '' ?>">
                        <a href="<?= isset($slide->url) ? $slide->url : '' ?>" class="nav-link">
                            <i class="<?= $slide->icon ?>"></i>
                            <span><?= $slide->name ?></span>
                        </a>
                        <?php if (isset($slide->subnav)) : ?>
                            <ul class="nav nav-group-sub" data-submenu-title="<?= $slide->name ?>">
                                <?php foreach ($slide->subnav as $submenu) : ?>
                                    <li class="nav-item"><a href="<?= $submenu->url ?>" class="nav-link legitRipple"><?= $submenu->name ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
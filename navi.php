<?php

$thisPage = basename($_SERVER['PHP_SELF']);

$nav = array();

$nav[] = array (
    'page' => 'home.php',
    'placeholder' => 'Virtual Machines',
    'icon' => 'glyphicon-cloud',
);

$nav[] = array (
    'page' => 'about.php',
    'placeholder' => 'About',
    'icon' => 'glyphicon-info-sign',
);
?>

<div class="page-header">
    <a href="home.php"><img src='img/rafcloud.png' class="center-block" width=150 height=150 /></a>
</div>
<div class="list-group">
    <?php
    foreach($nav as $item) {
        echo('<a href="' . $item['page'] . '" class="list-group-item');
        
        if($item['page'] == $thisPage)
            echo(' active');
            
        echo('"><span class="glyphicon ' . $item['icon'] . '"></span> ' . $item['placeholder']);
        echo('</a>');
    }
    ?>
</div>
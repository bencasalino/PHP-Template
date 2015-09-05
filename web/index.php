<?php
    // not actually sure, but it has something to do with the autoload.php line in app.php?
    $website = require_once __DIR__.'/../app/app.php';
    // then runs 
    $website->run();
?>

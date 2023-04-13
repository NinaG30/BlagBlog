<?php

spl_autoload_register(function ($class) {
    $sources = array(
        "models/$class.php",
        "controllers/$class.php",
        "DAO/$class.php",
        "core/$class.php"
    );
    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        }
    }
});
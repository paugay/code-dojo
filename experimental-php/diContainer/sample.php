<?php

include "Container.php";
include "User.php";

$container = new Container();

$container->session_name = "SESSION_ID";
$container->storage_class = "SessionStorage";

$container->user = $container->asShared(
    function($c)
    {
        return new User($c->storage);
    }
);

$container->storage = $container->asShared(
    function($c)
    {
        return new $c->storage_class($c->session_name);
    }
);

$user = $container->user;

var_dump($user($container));

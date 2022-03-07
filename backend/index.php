<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $controller = isset($_GET['controller'])?$_GET['controller']:'product';
    $action = isset($_GET['action'])?$_GET['action']:'index';
    $controller = ucfirst($controller).'Controller';
    $controller_part = 'controllers/'.$controller.'.php';

    if(!file_exists($controller_part)){
        die("trang bạn tìm kiếm không tồn tại");
    }

    require_once "$controller_part";

    $object = new $controller;

    if(!method_exists($object,$action)){
         die("không tồn tại phương thức $action của class $controller");
    }
    echo $object->$action();
?>
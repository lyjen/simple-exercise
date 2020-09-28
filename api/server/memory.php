<?php

    require_once('../../controller/server.php');
    // SET HEADER
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");

    $server = new ServerInfoController();

    // $data = array();
    // $data['uptime'] = $server->get_uptime();
    // $data['cpu'] = $server->get_cpu_load();
    // $data['memory'] = $server->get_memory();
    // $data['disk_usage'] = $server->disk_usage();
    // $data['info'] = $server->about_server();
    
    // print_r($data);
    $memory = $server->get_memory();
    echo $memory;
?>
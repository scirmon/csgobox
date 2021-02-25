<?php
    $user = $_GET["username"];
    $con = mysqli_connect('localhost','root','123456','openbox');

    $sql = "SELECT * FROM `users` WHERE `username` LIKE '$user'";

    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接失败' . mysqli_error($con));
    }

    $arr = array();
    $row = mysqli_fetch_assoc($res);
    while($row){
        array_push($arr,$row);
        $row = mysqli_fetch_assoc($res);
    }

    print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));
?>
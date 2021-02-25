<?php

    $id = $_GET['id'];
    //链接数据库
    $con = mysqli_connect('localhost','root','123456','openbox');
    $sql = "SELECT * FROM `goods` WHERE `id` = $id";
    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接错误' .  mysqli_error($con));
    }

    $arr = array();
    $row = mysqli_fetch_assoc($res);
    while($row){
        array_push($arr,$row);
        $row = mysqli_fetch_assoc($res);
    }

    print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));

    $sql1 = "DELETE FROM `goods` WHERE `id` = $id";
    $res1 = mysqli_query($con,$sql1);

    //关闭数据库的链接
    mysqli_close($con);
?>
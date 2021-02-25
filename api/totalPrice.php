<?php
    //链接数据库
    $con = mysqli_connect('localhost','root','123456','openbox');
    $sql = "SELECT * FROM `goods`";
    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接错误' .  mysqli_error($con));
    }

    $sql = "SELECT * FROM `goods`  WHERE `username` = '$username' $string  LIMIT $start,$length ";
    $res = mysqli_query($con,$sql);
    $arr = array();
    $row = mysqli_fetch_assoc($res);
    while($row){
        array_push($arr,$row);
        $row = mysqli_fetch_assoc($res);
    }
    print_r(json_encode($array,JSON_UNESCAPED_UNICODE));

    //关闭数据库的链接
    mysqli_close($con);
?>
<?php
    $username = $_GET['username'];
    $name = $_GET['name'];
    $level = $_GET['level'];
    $url = $_GET['url'];
    $price = $_GET['price'];

    //链接数据库
    $con = mysqli_connect('localhost','root','123456','openbox');
    $sql = "SELECT * FROM `goods`";
    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接错误' .  mysqli_error($con));
    }

    $sql1 = "INSERT INTO `goods` VALUES(null, '$username', '$name', '$level', '$url', '$price')";
    $res1 = mysqli_query($con,$sql1);
    $arr = array('code'=>$res1,'msg'=>'添加物品成功');
    print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));

    //关闭数据库的链接
    mysqli_close($con);
?>
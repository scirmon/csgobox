<?php
    $username = $_GET['username'];
    $price = $_GET['price'];

    //链接数据库
    $con = mysqli_connect('localhost','root','123456','openbox');

    $sql = "SELECT * FROM `users`";
    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接错误' .  mysqli_error($con));
    }


    $sql1 = "UPDATE `users` SET `money` = '$price' WHERE `username` = '$username'";
    $res1 = mysqli_query($con,$sql1);
    $arr = array('code'=>$res1,'msg'=>'修改金额成功');
    print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));

    //关闭数据库的链接
    mysqli_close($con);
?>
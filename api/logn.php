<?php
    $user = $_GET['username'];
    $pass = $_GET['password'];
    $phone = $_GET['phone'];



    $con = mysqli_connect('localhost','root','123456','openbox');

    $sql = "SELECT * FROM `users` WHERE `username` = '$user'";

    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接失败' . mysqli_error($con));
    }
    
    $row = mysqli_fetch_assoc($res);
    if($row){  
        print_r('用户名已被占用');
    }else{
        $add = "INSERT INTO `users` VALUES(null, '$user', '$pass', 170, '$phone')";
        $res1 = mysqli_query($con,$add);
        $arr = array('code'=>$res1,'msg'=>'注册成功');
        print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));

        //关闭数据库的链接
        mysqli_close($con);
    }
?>
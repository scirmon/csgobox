<?php
    $username = $_GET['username'];
    $index = $_GET['index']; // 1 2 3 4 5
    $length = $_GET['length']; // 40
    $sort = $_GET['sort'];
    // index = 1 第一页 length 40 
    // LIMIT 0,40===>(index-1)*length,length

    // index = 2 length =40 第二页
    // LIMIT 40,40 ===>(index-1)*length,length

    $con = mysqli_connect('localhost', 'root', '123456', 'openbox');
    
    $array = array();

    $totlaSql = "SELECT * FROM `goods` WHERE `username` = '$username'";
    $totalRes = mysqli_query($con,$totlaSql);

    $arrTotal = array();
    $rowTotal = mysqli_fetch_assoc($totalRes);
    while($rowTotal){
        array_push($arrTotal,$rowTotal);
        $rowTotal = mysqli_fetch_assoc($totalRes);
    }

    $array['total'] = count($arrTotal);

    $start = ($index-1)*$length;
    
    $string = "";
    if($sort == 1){
        $string = "ORDER BY `goods`.`price` DESC";
    }else if($sort == 0){
        $string = "ORDER BY `goods`.`price` ASC";
    }else{
        $string = "";
    }
    // LIMIT 索引值,数据的长度
    //根据条件得到物品
    $sql = "SELECT * FROM `goods`  WHERE `username` = '$username' $string  LIMIT $start,$length ";
    $res = mysqli_query($con,$sql);
    $arr = array();
    $row = mysqli_fetch_assoc($res);
    while($row){
        array_push($arr,$row);
        $row = mysqli_fetch_assoc($res);
    }

    $array['list'] = $arr;
    $array['listLength'] = count($arr);

    /* 
        {
            total:992,
            listLengt:40
            list:[]
        }
    */
    print_r(json_encode($array,JSON_UNESCAPED_UNICODE));

    //关闭数据库的链接
    mysqli_close($con);
?>
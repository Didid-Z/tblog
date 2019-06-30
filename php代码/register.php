<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

header("Content-type: text/html; charset=utf-8");

$request_body = file_get_contents('php://input');
$data2 = json_decode($request_body,true); // $data['content']

$username=$data2['username'];
$password=$data2['password'];

// # 创建连接
        $mysqli=new mysqli("localhost","root","","people");

        #设置编码格式
        $mysqli->query("set names utf8");

        if($mysqli->connect_errno){
            // die($mysqli->connect_error);
            die("数据库连接失败:".$mysqli->connect_errno);
        }else{
                $sql1="select username from user where username='$username'";
                $result1=$mysqli->query($sql1);
                $number=mysqli_num_rows($result1);
            if($number){
                echo 2;    //用户名已存在
            } else{
                    $sql2="INSERT INTO `user` (`id`,`username`,`password`) VALUES (NULL,'$username','$password')";
                
                $result2=$mysqli->query($sql2);   
                // $number2=mysqli_num_rows($result);
                echo $result2;    // 1

                
                }

       

            }
            
       

        $mysqli->close();
?>


  



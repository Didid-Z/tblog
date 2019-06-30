<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

header("Content-type: text/html; charset=utf-8");

$request_body = file_get_contents('php://input');
$data = json_decode($request_body,true); // $data['content']

$username=$data['username'];
$password=$data['password'];

// # 创建连接
        $mysqli=new mysqli("localhost","root","","people");

        #设置编码格式
        $mysqli->query("set names utf8");

        if($mysqli->connect_errno){
            
            die("数据库连接失败:".$mysqli->connect_errno);
        }else{
            
            $sql2="select username from user where username='$username'";
            
            
            $result2=$mysqli->query($sql2);   
            
            // $number=mysqli_num_rows($result);
            $number2=mysqli_num_rows($result2);
            if($number2){
                $sql="select username,password from user where username='$username' and password='$password'";
                $result=$mysqli->query($sql);   //这里的sql语句应该是检测数据库中是否存在用户输入的用户名和密码
                $number=mysqli_num_rows($result);
                echo $number;
            }else{
                echo 3;
            }
            
            
            
        }

        $mysqli->close();



  # localhost\blogdata\db.php
?>


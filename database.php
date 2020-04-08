<?php
$server="localhost";
$username="root";
$password="root";
$connect=new mysqli($server,$username,$password);
if($connect->connect_error)
{
 die("connection failed".$connect->connect_error);
}
else
{
 echo "connection built successfully";
 if($connect->query("create database register"))
 {
  echo "database register is created";
 }
 else
   echo "error occured";
}
?>



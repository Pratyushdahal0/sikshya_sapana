<?php
$server="localhost";
$uname="root";
$pwd="";
$conn=mysqli_connect($server,$uname,$pwd);
if($conn){
    echo("connected successfully!");
}
$create_database="CREATE DATABASE IF NOT EXISTs sikshya_sapana";
mysqli_query($conn,$create_database);
mysqli_select_db($conn, 'sikshya_sapana');
$create_table="CREATE TABLE IF NOT EXISTS sikshya_sapana(
$First_name TEXT NOT NULL
$Middle_name TEXT 
$Last_name TEXT NOT NULL
$email VARCHAR(50) NOT NULL
$message TEXT NOT NULL)";
mysqli_query($conn,$create_table);
?>
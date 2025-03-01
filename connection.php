<?php
$server="localhost"
$uname="root"
$pwd=""
$conn=mysqli_connect($server,$uname,$pwd)
if($conn){
    echo("connected successfully!")
}else($conn){
    echo("connection issue")
}

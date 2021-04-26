<?php
$host='localhost';
$user='root';
$pass='';
$dba='clothing';

$con= new mysqli($host,$user,$pass,$dba);

if($con->connect_error)
{
   die("Connection Failed!". $con->connect_error);
}
?>
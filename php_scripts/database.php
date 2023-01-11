<?php
session_start();
const db_host = 'localhost';
const db_username= 'root';
const db_password= '';
const db_name= 'employee_system';
$conn=mysqli_connect(db_host,db_username,db_password,db_name);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
<?php
session_start();
error_reporting(-1);
include('classes/db.class.php');
include('classes/process.class.php');
include('classes/read.class.php');
include('classes/query.class.php');
include('classes/validation.class.php');
include('classes/error.class.php');
include('classes/encrypt.class.php');
include('classes/email.class.php');
include('classes/user.class.php');
include('classes/book.class.php');


$con = new DB();
$read = new read();
$pr = new process();
$er = new errormsg();
$qu = new query();
$val = new validation();
$en = new Encryption();
$email = new email();
$user = new user();
$book=new book();
?>
<?php 
session_start();
if ($_SESSION[sess_userid] <> session_id()) {
	header("Location: login.php"); exit();}
	require_once  'src/readymade.php';
	require 'src/header.php';
	require 'src/loginId.php';?>
Real Time


<?php require 'src/footer.php';?>
<?php 
session_start();
if ($_SESSION[sess_userid] <> session_id()) {
	header("Location: login.php"); exit();}
	require_once  'src/readymade.php';
	require 'src/header.php';
	require 'src/loginId.php';
	
$url='menumanage.php';
$s=$_GET["s"];
require 'menubar.php';

if($s=='1')
{	require 'menu-add.php';}

if($s=='2')
{	require 'menu-edit.php';}

if($s=='3')
{	require 'menu-remove.php';}

if($s=='4')
{	require 'category-add.php';}

if($s=='5')
{	require 'category-edit.php';}

if($s=='6')
{	require 'category-remove.php';}

if($s=='7')
{	require 'comment-add.php';}

if($s=='8')
{	require 'comment-edit.php';}

if($s=='9')
{	require 'comment-remove.php';}

if($s=='10')
{	require 'show-menu.php';}

if($s=='11')
{	require 'show-category.php';}

if($s=='12')
{	require 'show-comment.php';}
?>




<?




require 'src/footer.php';?>
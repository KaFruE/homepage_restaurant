<?php
  header("Content-Type:text/html;charset=utf-8");

  function insert_data(){

    $del_Num=$_GET['Num'];


    $database='soolgan';
    $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

    mysql_select_db($database,$connect);//디비연동
    $query="delete from requirements where require_num=$del_Num";

    $result= mysql_query($query,$connect);

    echo "<HTML><head><META http-equiv='refresh' content='0;url=survay_mg.html'></head></head>";
  }
  insert_Data();
?>

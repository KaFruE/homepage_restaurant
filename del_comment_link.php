<?php
  header("Content-Type:text/html;charset=utf-8");


  $Num = $_GET['Num'];
  $pass = $_POST['pass'];
  $database='soolgan';
  $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

  mysql_select_db($database,$connect);//디비연동

  $query = "select text_pass from free_board where text_Num=$Num";
  $result = mysql_query($query,$connect);
  $row=mysql_fetch_array($result);


  if(!strcmp($pass,$row[0])){
    $query = "delete from free_board where text_Num=$Num";
    mysql_query($query,$connect);
    $quert = "drop table comment_$Num";
    mysql_query($query,$connect);
  }
  echo "<HTML><head><META http-equiv='refresh' content='0;url=free_board_List.html?page=0'></head>"
?>

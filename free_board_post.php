<?php
  header("Content-Type:text/html;charset=utf-8");

  function insert_data(){

    $title=$_POST['title'];
    $name=$_POST['writter'];
    $content=$_POST['content'];
    $password=$_POST['pass'];

    $database='soolgan';
    $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

    mysql_select_db($database,$connect);//디비연동
    $query="insert into free_board values(default,'$title','$name','$password',now(),'$content','0');";

    $result= mysql_query($query,$connect);

    echo "<HTML><head><META http-equiv='refresh' content='0;url=free_board_List.html?page=0'></head></head>";
  }
  insert_Data();
?>

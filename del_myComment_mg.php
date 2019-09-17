<?php

  $C_Num = $_GET['C_num'];//자유게시판 글 번호
  $Num = $_GET['Num'];//댓글 번호
  $database='soolgan';
  $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

  mysql_select_db($database,$connect);//디비연동

  $query = "select Wreply from free_board where text_num=$C_Num";//글번호의 댓글수
  $result = mysql_query($query,$connect);
  $text=mysql_fetch_array($result);//글번호 댓글수 저장

  $query = "select c_password from comment_".$C_Num." where c_Num=$Num";//댓글번호에따른 패스워드확인
  $result = mysql_query($query,$connect);
  $row=mysql_fetch_array($result);
  
  $query = "delete from comment_".$C_Num." where c_Num=$Num";
  mysql_query($query,$connect);
  $tmp = (int)$text[0];
  $tmp--;
  $query = "update free_board set Wreply=".$tmp." where text_num=".$C_Num;
  mysql_query($query,$connect);
  if($tmp == 0){
    $query = "drop table comment_$C_Num";
  mysql_query($query,$connect);
  }
  echo "<HTML><head><META http-equiv='refresh' content='0;url=content_mg.html?Num=$C_Num'></head>";
?>

<?php
  header("Content-Type:text/html;charset=utf-8");

  $C_Num = $_GET['C_Num'];
  $Num = $_GET['Num'];
  $pass = $_POST['pass'];
  $database='soolgan';
  $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

  mysql_select_db($database,$connect);//디비연동

  $query = "select Wreply from free_board where text_num=$C_Num";//글번호의 댓글수
  $result = mysql_query($query,$connect);
  $text=mysql_fetch_array($result);//글번호 댓글수 저장

  $query = "select c_password from comment_".$C_Num." where c_Num=$Num";//댓글번호에따른 패스워드확인
  $result = mysql_query($query,$connect);
  $row=mysql_fetch_array($result);

  if(!strcmp($pass,$row[0])){//비밀번호가 같을때 코멘트삭제&댓글이 더이상없을때 테이블삭제 & 프리보드 글아래 숫자 지우기
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
  }
  echo "<HTML><head><META http-equiv='refresh' content='0;url=free_board_List.html?page=0'></head>"
?>

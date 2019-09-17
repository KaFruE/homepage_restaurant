<?php
  header("Content-Type:text/html;charset=utf-8");
  Input_comment();
  function Input_comment(){

    $name=$_POST['writter'];
    $pass=$_POST['pass'];
    $comment=$_POST['comment'];

    $database='soolgan';
    $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

    mysql_select_db($database,$connect);//디비연동

    $comment_num=$_GET['Num'];

    $query = "select Wreply from free_board where text_num=".$comment_num;
    $result= mysql_query($query,$connect);
    if($name == NULL){
      echo "<script>alert(\"작성자를 입력하시오\");</script>";
      echo "<script>history.back();</script>";
      return;
    }
    if($pass == NULL){
      echo "<script>alert(\"비밀번호를 입력하시오\");</script>";
      echo "<script>history.back();</script>";
      return;
    }
    if($comment == NULL){
      echo "<script>alert(\"내용을 입력하시오\");</script>";
      echo "<script>history.back();</script>";
      return;
    }
    while($row=mysql_fetch_array($result)){
      if($row[0]==0){//문자열인지아닌지검사 후 댓글이 없을때
        $query="create table comment_".$comment_num." (
          c_Num int(2) auto_increment not NULL,
          c_writter varchar(20) Not NUll,
          c_password varchar(20) not NULL,
          c_comment text not NULL,
          c_date timestamp not NULL default now(),
          primary key(c_Num)
          ) DEFAULT CHARSET=utf8";
        mysql_query($query,$connect);
      }
        //해당 댓글 테이블만들기

      $query = "insert into comment_".$comment_num." values(0,'$name','$pass','$comment',default)";
      mysql_query($query,$connect);//만들어진 테이블에 정보입력
      $rowtmp = $row[0]+1;
      $query = "update free_board set Wreply=".$rowtmp." where text_num=".$comment_num;
      mysql_query($query,$connect);
    }
    mysql_close();
    echo "<script>location.href='content.html?Num=$comment_num';</script>";
  }
?>

<?php
  header("Content-Type:text/html;charset=utf-8");


  $Num = $_GET['Num'];
  $database='soolgan';
  $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

  mysql_select_db($database,$connect);//디비연동
  $del_comment_URL= "del_comment_Link.php?Num=$Num";
  echo '
  <HTML>
  <head>
      <title>댓글삭제</title>
    <meta charset="UTF-8">
  </head>
  <body style="position: absolute;align:center;top:50%;left:50%;transform:translate(-50%, -50%)">
    <center>
      <p>
        비밀번호를 입력하시오.
      </p>
      <p>

      </p>
      <p>
      <form action="'.$del_comment_URL.'" name="del" method="post">
        <input class="pass" name="pass" type="text" placeholder="비밀번호" col="15"/><br />
        <input type="submit" value="확인" /><br />
      </form>

      </p>
    </center>
  </body>
  </HTML>
  ';
?>

<?php
  header("Content-Type:text/html;charset=utf-8");

  function insert_data(){

    $gender=$_POST['gender'];
    $m_good=$_POST['good'];
    $m_bad=$_POST['bad'];
    $content=$_POST['content'];

    $database='soolgan';
    $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

    mysql_select_db($database,$connect);//디비연결
    if($gender == 1){
      $gender="남";
    }
    else {
      $gender="여";
    }
    $query="insert into requirements values(default,'$gender','$m_good','$m_bad','$content');";

    $result= mysql_query($query,$connect);

    echo "<HTML><head><META http-equiv='refresh' content='0;url=index.html'></head></head>";
  }
?>
<?php
  insert_Data();
?>

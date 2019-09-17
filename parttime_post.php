<?php
  header("Content-Type:text/html;charset=utf-8");


  function insert_data(){

    $period=$_POST['grade'];
    $gender=$_POST['gender'];
    $name=$_POST['name'];
    $phoneNum=$_POST['phoneNum'];
    $HopePay=$_POST['HopePay'];
    $HopeTime=$_POST['time'];
    $Content=$_POST['produce'];

    $database='soolgan';
    $connect=mysql_connect('localhost','root','apmsetup') or die('SQL연결 error');

    mysql_select_db($database,$connect);//디비연결
    if($period==1){$period="1~3개월";}elseif($period==2){$period="3~6개월";}elseif($period==3){$period="6~12개월";}else{$period="1년이상";}
    if($gender == 1){$gender="남";}else {$gender="여";}
    if($HopeTime==0){$HopeTime="오전(오픈)";}elseif($HopeTime==1){$HopeTime="오후(마감)";}else{$HopeTime="무관";}

    $query="insert into parttime values(default,'$period','$gender','$name','$phoneNum','$HopePay','$HopeTime','$Content')";

    $result= mysql_query($query,$connect);

      echo "<HTML><head><META http-equiv='refresh' content='0;url=parttime.html'></head></head>";
    }
?>
<?php
  insert_Data();
?>

<?php
$conn = mysql_connect('localhost','root','apmsetup');
$db = mysql_select_db('soolgan',$conn);
$query = "select * from free_board order by text_num DESC";
$result = mysql_query($query,$conn);

?>

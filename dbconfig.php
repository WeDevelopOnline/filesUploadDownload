<?php
$dbserver="127.0.0.1";
$dbuser="root";
$dbpwd="";
$dbname="march14";

function my_iud($query)
{
global $dbserver,$dbuser,$dbpwd,$dbname;
$cid=mysql_connect($dbserver,$dbuser,$dbpwd);
mysql_select_db($dbname,$cid);
mysql_query($query,$cid);
$n=mysql_affected_rows($cid);
mysql_close($cid);
return $n;
}

function my_select($query)
{
global $dbserver,$dbuser,$dbpwd,$dbname;
$cid=mysql_connect($dbserver,$dbuser,$dbpwd) ;
mysql_select_db($dbname,$cid);
$rs=mysql_query($query,$cid);
mysql_close($cid);
return $rs;
}

function my_one($query)
{
global $dbserver,$dbuser,$dbpwd,$dbname;
$cid=mysql_connect($dbserver,$dbuser,$dbpwd);
mysql_select_db($dbname,$cid);
mysql_query($query,$cid);
$rs=mysql_query($query,$cid);
$row=mysql_fetch_Array($rs);
mysql_close($cid);
return $row[0];
}
?>
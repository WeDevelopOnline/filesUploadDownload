<?php
include_once "dbconfig.php";
$fid=$_REQUEST['fid'];
//echo "<br />Trying to download file with id $fid";
$query="select * from up_fs where fileid=$fid";
$rs=my_select($query);
$row=mysql_fetch_array($rs);
$fileid=$row[0];
$filename=$row[1];
$filetype=$row[2];
$filesize=$row[3];
$filepath=$row[4];

$fp=fopen($filepath,'r');
$filedata=fread($fp,$filesize);
header("Content-type:$filetype");
header("Content-disposition:attachment;filename=$filename");
echo $filedata;
?>
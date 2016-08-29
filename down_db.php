<?php
include_once "dbconfig.php";
$fid=$_REQUEST['fid'];
//echo "<br />Trying to download file with id $fid";
$query="select * from up_db where fileid=$fid";
$rs=my_select($query);
$row=mysql_fetch_array($rs);
$fileid=$row[0];
$filename=$row[1];
$filetype=$row[2];
$filesize=$row[3];
$filedata=$row[4];
header("Content-type:$filetype");
header("Content-disposition:attachment;filename=$filename");
echo $filedata;
?>
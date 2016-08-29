<html>
<head>
<title>Upload to database as blob</title>
</head>
<body>
<h2>upload to database as blob</h2>
<form method='post' enctype='multipart/form-data'>
select a file to upload
<input type='file' name='myfile' id='myfile' />
<br />
<input type='submit' name='upload' id='upload' value='upload' />
</form>
<?php
include_once "dbconfig.php";
if(isset($_REQUEST['upload']))
{
$error=$_FILES['myfile']['error'];
	if($error!=0)
	{
	echo "<Br />A File not uploaded, server seems busy, try later";
	}
	else
	{
	$fname=$_FILES['myfile']['name'];
	$ftype=$_FILES['myfile']['type'];
	$fsize=$_FILES['myfile']['size'];
	$ftname=$_FILES['myfile']['tmp_name'];

	$fp=fopen($ftname,'r');
	$filedata=fread($fp,$fsize);
		

	$filedata=addslashes($filedata);
		$query="insert into up_db (filename,filetype,filesize,filedata) values ('$fname','$ftype',$fsize,'$filedata')";
		$n=my_iud($query);
		if($n==1)
		{
			echo "<Br />File upload successful";
		}
		else
		{
	echo "<Br />C File not uploaded, server seems busy, try later";
		}
	
	
	}
}




?>
</body>
</html>
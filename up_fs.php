<html>
<head>
<title>Upload to filesystem</title>
</head>
<body>
<h2>upload to filesystem</h2>
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

	$target=__DIR__."/march_data/$fname";
		
	$ans=move_uploaded_file($ftname,$target);
	if($ans)
	{
	//save info to database
	$target=addslashes($target);
		$query="insert into up_fs (filename,filetype,filesize,filepath) values ('$fname','$ftype',$fsize,'$target')";
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
	else
	{
	echo "<Br />B File not uploaded, server seems busy, try later";
	}
	
	}
}




?>
</body>
</html>
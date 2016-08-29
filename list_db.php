<?php
include_once "dbconfig.php";
$query="select fileid,filename,filetype,filesize from up_db";
$rs=my_select($query);
$n=mysql_num_rows($rs);
if($n==0)
{	
	echo "<br />No files found";
}
else
{
	echo "<table border='1' align='center' cellpadding='3' cellspacing='0' width='500'>";
	echo "<tr>
	<th width='80'>Fileid</th>
	<th width='80'>Filename</th>
	<th width='80'>filetype</th>
	<th width='80'>filesize</th>
	<th width='180'>&nbsp;</th>
	</tr>";
	while($row=mysql_fetch_array($rs))
	{
		echo "<tr>
		<td>$row[0]</td>
		<td><a href='down_db.php?fid=$row[0]'>$row[1]</a></td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td align='center'>
			<img src='down_db.php?fid=$row[0]' width='100'>
		</td>

		</tr>";

	}
	echo "</table>";


}
?>
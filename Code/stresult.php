<html>
<body>
<?php
$con=new mysqli("localhost","root","","st_res1");
	if($con->connect_error)
	{
		die("Connection failed:".$con->connect_error);
	}
if(isset($_POST['res']))
{
	$rno=$_POST['rno'];
	$name=$_POST['name'];
	$sec=$_POST['sec'];
	?>
	<label><?php echo"Student Name: $name";?></label><br>
	<label><?php echo"Register Number: ".$rno;?></label> <br>      
<?php

$sql="SELECT * FROM tb_student WHERE $rno=rno";
$res=$con->query($sql);
if ($res->num_rows>0)
{ ?>
	<table width="50%" border="2px">

	
	<?php while($rows=$res->fetch_assoc())
	{
		?>
	<tr>
		<th><center>SUBJECT</center></th>
		<th><center>MARKS</center></th>
	<tr>
	 <td><center><label>Kannada</label></center>
	 <td><center><?php echo $rows['kannada'];?></center></td>
	</tr>
	<tr>
	<td><center><label>English</label></center>
	 <td><center><?php echo $rows['english'];?></center></td>
	</tr>
	<tr>
	<td><center><label>Hindi</label></center>
	 <td><center><?php echo $rows['hindi'];?></center></td>
	</tr>
	<tr>
	<td><center><label>Science</label></center>
	 <td><center><?php echo $rows['science'];?></center></td>
	</tr>
	<tr>
	<td><center><label>Mathematics</label></center>
	 <td><center><?php echo $rows['maths'];?></center></td>
	</tr>
	<tr bgcolor="yellow">
	<td><center><label>Total</label></center>
	 <td><center><?php echo $rows['total'];?></center></td>
	</tr>
	<tr bgcolor="yellow">
	<td><center><label>Percentage</label></center>
	 <td><center><?php echo $rows['percentage']."%";?></center></td>
	</tr>
<?php
}
}
else 
 {
	 echo "Result not found";
 }
}
$con->close();
?>
</body>
</html>
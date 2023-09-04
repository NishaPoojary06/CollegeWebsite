<html>
	<head>
	 <title></title>
	</head>
	<style>
	body
{
	background-color:gray;
	
}
.box
	{
		
		position:relative;
		background-color:black;
		width:250px;
		height:250px;
		align-items:center;
		margin:100px;
		border:2px solid rgb(230, 230, 250);
		padding:30px
		
		
		
	}
.box label 
{
	margin:10px;
	color:white;
}
.box input
{
	margin:10px;
	padding:5px;
	
	
}
.box button
{
	
	margin:10px;
	padding:8px;
	
}


.entry
{
	visibility:hidden;
	background-color:black;
		display:flex;
		width:350px;
		height:350px;
		align-items:center;
		margin:100px;
		border:2px solid rgb(0,100,0);;
		padding:30px;
		justify-content:space-evenly;
    align-content: space-around;
    flex-wrap: wrap;
	background-color:gray;
	 box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.7);
	 border-radius:15px;
}

.head
{
	background:rgb(0,100,0);
	height:7%;
}	

	
</style>
	
	
	<body>
	<div class="head">
	<label style="color:white"id="uni"><h2>Aleck University</h3></label>
	</div>
	<div class="box">
	<form method="POST" action="adminpage.php" enctype="tax_form">
	<h3 style="color:white">Admin</h3>
	<label>Username</label>
	<input type="textbox"  name="name"placeholder="" required/>
	<label>Password</label>
	<input type="password" name="pass" placeholder="" required/>
	<br>
	<button type="submit" name="login" id="button">Log In</button>
	</form>
	</div>
</body>	
	
<?php 
	if(isset($_POST['login']))    
{ 
   
	
	$pass=$_POST['pass'];                               
	 
	$name=$_POST['name'];
	if($name=="admin" and $pass=="ad")
	{
	?> 
	
	<style>
	.entry
	{
		visibility:visible;
		
	
		}

	.btn{
		display:flex;
		padding:10px;
		justify-content:space-evenly;
    align-content: space-around;
    flex-wrap: wrap;
	}
	
		/*.en 
	{
		visibility:visible;
		text-decoration:none;
		padding:5px 20px;
	}*/
	</style>
	
	<?php
	
	
	}
	else
	{
		echo "<script>alert('Invalid credentials!');</script>";
	}
		
		
} 


?>

<body>
<div class="entry">
		<form method="POST" action="adminpage.php" enctype="tax_form">
	<h3>Enter Marks</h3>
<table>
	<tr>
	<td><label>Register Number</label></td>
	<td><input type="textbox"  name="reg"placeholder="" required/></td>
	</tr>
	
	<tr>
	<td><label>Name</label></td>
	<td><input type="text"  name="name"placeholder="" required/></td>
	</tr>
	
	<tr>
	<td><label>Kannada</label></td>
	<td><input type="text" name="kann" placeholder="" required/></td>
	
	</tr>
	<tr>
	<td><label>English</label></td>
	<td><input type="text" name="eng" placeholder="" required/></td>
	 
	</tr>
	<tr>
	<td><label>Hindi</label></td>
	<td><input type="text" name="hin" placeholder="" required/></td>
	 
	</tr>
	<tr>
	<td><label>Science</label></td>
	<td><input type="text" name="sci" placeholder="" required/></td>
	 
	</tr>
	<tr>
	<td><label>Mathematics</label></td>
	<td><input type="text" name="mat" placeholder="" required/></td>
	  
	</tr>
	</div>
	</table>
	<div class="btn">
	<table>
	<tr>
	<td><center><button type="submit" name="submit">Submit Marks</button></center></td></tr>
	</tr>
	</table>
	</form>
	</div>

	</div>
	</body> 
	</html>
	
<?php
	$con=new mysqli("localhost","root","","st_res1");
	if($con->connect_error)
	{
		die("Connection failed:".$con->connect_error);
	}
	/*$conn=new PDO('mysql:host=localhost;dbname=st_res1','root','');*/
		if(isset($_POST['submit']))
{
	$reg=$_POST['reg'];
	$name=$_POST['name'];
	$kann=$_POST['kann'];
	$eng=$_POST['eng'];
	$hin=$_POST['hin'];
	$sci=$_POST['sci'];
	$mat=$_POST['mat'];
/*	if($reg="" or $kann="" or $eng="" or $hin="" or $sci="" or $mat=""	)
	{
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);*/
	$sql="INSERT INTO tb_student(rno,name,kannada,english,hindi,science,maths) VALUES('$reg','$name','$kann','$eng','$hin','$sci','$mat')";
 $con->query($sql);
 $sql="UPDATE tb_student SET total=kannada+english+hindi+science+maths";
 $con->query($sql);
 $sql="UPDATE tb_student SET percentage=(total/500)*100"; 
 $con->query($sql);
 echo "<script>alert('Marks Submitted successfully');</script>";
	
}
	$con->close();
?>
	
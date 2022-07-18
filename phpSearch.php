
<?php
include("config.php");
if(count($_POST)>0) {
$search=$_POST['search'];
$column = $_POST['column'];
$result = mysqli_query($con,"SELECT * FROM student where $column='$search' ");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Search data</title>
<style>

.center {
  margin: auto;

}
body {background-color: powderblue;}
h2,h1   {font-family: Nexa;}
table{
box-shadow: 2px 2px;}
table,tr,td    {font-family: Nexa; 
border: 2px solid black;
  padding: 60px
align="center";
}
tr{
font-weight: bold;}

</style>

</head>
<body><center><h1>Search Results</h1>
<table>
<tr>
<td>Name</td>
<td>Register Number</td>
<td>DOB</td>
<td>Address</td>
<td>Department</td>
<td>Year of Admission</td>
<td>Phone Number</td>
<td>Email ID</td>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["regno"]; ?></td>
<td><?php echo $row["dob"]; ?></td>
<td><?php echo $row["address"]; ?></td>
<td><?php echo $row["department"]; ?></td>
<td><?php echo $row["yoa"]; ?></td>
<td><?php echo $row["phone"]; ?></td>
<td><?php echo $row["email"]; ?></td>
</tr>
<?php
$i++;
}
?>
</center>
<html>
   
   <head>
      <title>insert</title>
    <link href="styleview.css" type="text/css" rel="stylesheet">
<style>
.center {
  margin: auto;

}
body {background-color: powderblue;
font-weight: bold;}
h2   {font-family: Nexa;}
form    {font-family: Nexa; 
border: 2px solid black;
  padding: 60px;
align="center";

box-shadow: 2px 2px;}
</style>
    <?php
    include("config.php");
?>
   </head>
   
   <body> <center>
      <?php
         // define variables and set to empty values
         $nameErr = $regnoErr = $dobErr = $addressErr = $deptErr = $yoaErr= $phoneErr = $emailErr =  "" ;
         $name = $regno = $dob = $address = $department = $yoa = $phone = $email = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = trim($_POST["name"]);
            }
            
            if (empty($_POST["regno"])) {
               $regnoErr = "Register Number is required";
            }else {
               $regno = trim($_POST["regno"]);
               
              
            }
            
            if (empty($_POST["dob"])) {
               $dob = "";
            }else {
               $dob = trim($_POST["dob"]);
            }
            
            if (empty($_POST["address"])) {
               $address = "";
            }else {
               $address = trim($_POST["address"]);
            }
            
            if (empty($_POST["department"])) {
               $deptErr = "Department is required";
            }else {
               $department = trim($_POST["department"]);
            }
            
            if (empty($_POST["yoa"])) {
               $yoaErr = "Required";
            }else {
               $yoa =trim( $_POST["yoa"]);	
            }
if (empty($_POST["phone"])) {
               $phoneErr = "Phone Number is Required";
            }else {
               $phone =trim( $_POST["phone"]);	
            }
if (empty($_POST["email"])) {
               $emailErr = "Email is Required";
            }
else {
                              $email =trim( $_POST["email"]);	
            }
        
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

		
$isValid = true;

		// Check fields are empty or not
		if($name == '' || $regno == '' || $dob == '' || $address == '' || $department == '' || $yoa == ''|| $phone == ''|| $email == ''){
			$isValid = false;
			$error_message = "Please fill all fields.";
		}

		
		

		if($isValid){

			
			$stmt = $con->prepare("SELECT * FROM student WHERE regno = ?");
			$stmt->bind_param("s", $regno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			if($result->num_rows > 0){
				$isValid = false;
				echo("Register Number already exists.");;
			}
			
		
if($isValid){
$insertSQL = "INSERT INTO student(name,regno,dob,address,department,yoa,phone,email ) values(?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($insertSQL);
			$stmt->bind_param("ssssssss",$name,$regno,$dob,$address,$department,$yoa,$phone,$email);
			$stmt->execute();
			$stmt->close();

			echo("Entry Added successfully.");}
}}
}
      ?>
		<center>
      <h2 >Student Data Insertion</h2>
      
      <p><span class = "error">* required field.</span></p>
      
      <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Register Number: </td>
               <td><input type = "text" name = "regno">
                  <span class = "error">* <?php echo $regnoErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>DOB:</td>
               <td> <input type = "text" name = "dob">
                  <span class = "error"><?php echo $dobErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Address:</td>
               <td> <textarea name = "address" rows = "5" cols = "40"></textarea></td>
            </tr>
            
            <tr>
               <td>Department:</td>
               <td>
                  <input type = "radio" name = "department" value = "CSE">CSE
                  <input type = "radio" name = "department" value = "CE">CE

                 <input type = "radio" name = "department" value = "ME">ME
                  <input type = "radio" name = "department" value = "ECE">ECE
                  <input type = "radio" name = "department" value = "EEE">EEE
                  <span class = "error">* <?php echo $deptErr;?></span>
               </td>
            </tr>
            
             <tr>
               <td>Year Of Admission:</td>
               <td> <input type = "text" name = "yoa">
                  <span class = "error"><?php echo $yoaErr;?></span>
               </td>
            </tr>
 <tr>
               <td>Phone Number:</td>
               <td> <input type = "text" name = "phone">
                  <span class = "error"><?php echo $phoneErr;?></span>
               </td>
            </tr>
 <tr>
               <td>Email ID:</td>
               <td> <input type = "text" name = "email">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
            
           
            
          <center>  <tr>
               <td align="right">
                  <input type = "submit" name = "submit" value = "Submit" action=""> 
               </td>
            </tr>
            </center>
         </table>
      </form>
      
     </center>
     </center>   
   </body>
</html>
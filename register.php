<html>
<body bgcolor="powderblue">

<?php

$Fullname=$_POST['fullname'];
$Email=$_POST['email'];
$Username=$_POST['username'];
$Password=$_POST['password'];
$encrypt_pas=password_hash($Password, PASSWORD_DEFAULT);


$server="localhost";
$username="root";
$password="root";
$database="registration";
$connect=new mysqli($server, $username, $password, $database);
if($connect->connect_error)
 {
   die("connection failed".$connect->connect_error);
 }
else
 {
     $SELECT = "SELECT email From student Where email = ? Limit 1";
     $INSERT = "INSERT Into student (fullname, email, username, password) values(?, ?, ?, ?)";
    
     $stmt = $connect->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) 
     {
      $stmt->close();
      $stmt = $connect->prepare($INSERT);
      $stmt->bind_param("ssss", $Fullname, $Email, $Username, $encrypt_pas);
      $stmt->execute();
      echo '<span style="color: blue; font-size: 70px;">Welcome  '.$Fullname;
      echo "<br>";
      echo "<br>";
      $link_address1 = 'form.php';
      echo "<a href='$link_address1'>Go to Registration Page</a>";

     } 
    else
     { 
      echo '<span style="color:red; font-size:70px;"?>This email id is already registered';
      echo "<br>";
      echo "<br>";
      echo "<a href='$link_address1'>Try Again with different Email ID</a>";
     }
     $stmt->close();
     $conn->close();
 }
?>
</body>
</html>

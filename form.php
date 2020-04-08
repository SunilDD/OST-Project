<!DOCTYPE HTML>
<html>
<head>
<title>Registration form</title>
<style type="text/css">
 body{
    background-image:url(form3.jpg);
    background-size:cover;
    background-attachment:fixed;
   }
</style>
</head>
<body>
<?php
$nameError=$name=$namevalidate=$username=$uservalidate=$emailError = $userError= $passError=$conpassError=$passNotMatch=$email=$emailformat= "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $valid = true;

    if(empty($_POST['fullname'])){
        $valid=false;
        $nameError = "Name is missing";
    }
    else
     {
        $name=$_POST['fullname'];
        if(!preg_match("/^[a-zA-Z]*$/",$name))
         {
           $valid=false;
           $namevalidate="Only letters and white space allowed";
          } 
     }

    if(empty($_POST['email'])){
        $valid=false;
        $emailError = "Email is  missing";
    }
    else
    {
       $email=$_POST['email'];
       if(!filter_var($email,FILTER_VALIDATE_EMAIL))
       {
         $emailformat="Invalid email format";
         $valid=false;
       }
    }
    if(empty($_POST['username']))
    {
      $valid=false;
      $userError="Username is missing";
    }
    else
    {
      $username=$_POST['username'];
        if(!preg_match("/^[a-zA-Z]*$/",$username))
         {
           $valid=false;
           $uservalidate="Only letters and white space allowed";
          } 
    }
   
   if(empty($_POST['password']))
   {
      $valid=false;
      $passError="Password can't be empty";
   }
   if(empty($_POST['conpassword']))
   {
      $valid=false;
      $conpassError="Confirm Password can't be empty";
   }
   $password=$_POST['password'];
   $conpassword=$_POST['conpassword'];
   if($password!=$conpassword)
    {
      $valid=false;
      $passNotMatch="Passwords should be same";
    }
    if($valid){
        include('register.php');
        exit();
    }
}

?>

<div style="text-align:center">
 <h1>Welcome to Registration Form</h1>
</div>

<style>

h1   {color: red;}

td { 
   width:150px; 
   text-align:center;  
   padding:10px
   }
 
</style> 



<form action="" method="post">
<table align="center">

<tr>
<td><font color="blue">Full Name*</td></font>
<td> <input type="text" name="fullname" size="30"/> <?PHP echo $nameError; ?><?PHP echo $namevalidate; ?> <br> </td>
</tr>

<tr>
<td><font color="blue">Email ID*</td>
<td>  <input type="text" name="email" size="30"/> <?PHP echo $emailError; ?> <?PHP echo $emailformat; ?> <br> </td>
</tr>

<tr>
<td><font color="blue">Username*</td>
<td>  <input type="text" name="username" size="30"/> <?PHP echo $userError; ?><?PHP echo $uservalidate; ?> <br> </td>
</tr>

<tr>
<td><font color="blue">Password*</td>
<td>  <input type="password" name="password" size="30"/> <?PHP echo $passError; ?> <br> </td>
</tr>

<tr>
<td><font color="blue">Confirm Password*</td>
<td>  <input type="password" name="conpassword" size="30"/> <?PHP echo $conpassError; ?><?PHP echo $passNotMatch; ?>  <br> </td>
</tr>


<tr>
<td> <input type="submit" value="Submit" style="margin-left:150%" /> </td>
</tr>
</form>
</table>
</body>
</html>


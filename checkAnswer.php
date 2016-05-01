<?php
session_start();
include('login/credentials.php');

$conn=new mysqli ($DB_SERVER , $DB_USERNAME  ,$DB_PASSWORD , $DB_DATABASE);
if($conn->connect_error)
{
   die("connection failed: ".$conn->connect_error);
}

$secureans=mysqli_real_escape_string($conn,stripslashes($_POST['answer']));
$ans=strtolower($secureans);







$sql="SELECT `level` FROM `users` WHERE `email`='$_SESSION[user_check]'";
$result= $conn->query($sql);

if($result->num_rows > 0)
{
   while($row= $result->fetch_assoc())
   {
      $level=$row['level'];
      break;
   }
}

$sql="INSERT INTO `submissions` (`level` , `user` ,`answer`,`time_stamp`) VALUES ('$level' ,'$_SESSION[user_check]', '$ans',now())";
$conn->query($sql);
$a=0;
$level++;

$sql="SELECT `answer` FROM `question` WHERE `level`='$level'";
$result= $conn->query($sql);

if($result->num_rows > 0)
{
   while($row= $result->fetch_assoc())
   {
      if($ans==$row['answer'])
      {
         $a=1;
      }
      break;

   }
}

if($a==1)
{



   $sql = "UPDATE `users` SET `level`='$level',`lastSubmission`=now() WHERE email='$_SESSION[user_check]'";

   if ($conn->query($sql) === TRUE) {
 //echo "Record updated successfully";
     header('location: home.php');
  } else {
 //echo "Error updating record: " . $conn->error;
     header('location: index.php');

  }

  $conn->close();
}
else if($level==6){
  if($ans==$_SESSION["user_check"]){

   $sql = "UPDATE `users` SET `level`='$level',`lastSubmission`=now() WHERE email='$_SESSION[user_check]'";

   if ($conn->query($sql) === TRUE) {
 //echo "Record updated successfully";
     header('location: home.php');
  } else {
 //echo "Error updating record: " . $conn->error;
     header('location: index.php');

  }

  $conn->close();
  }else{
    
    header('location: home.php?answer=0');
  }

}
else
{
  header('location: home.php?answer=0');
  //echo $level;
}
?>
   <?php
// Start the session
   session_start();
   if($_SESSION['user_check']){
      if($_SESSION['user_check']=='vipinkhushu@hotmail.com'){

      }
      else{
       header("location: index.php");
    }
 }
 else{
    header("location: index.php");
 }
 if(isset($_POST["question"])&&isset($_POST["answer"])&&isset($_POST["level"])){
   include('login/credentials.php');
   $statement=$_POST['question'];
   $level=$_POST['level'];;
//echo $statement;
   $ans=$_POST['answer'];
//echo $ans;
//create comnnection
   $conn=new mysqli ($DB_SERVER , $DB_USERNAME  ,$DB_PASSWORD , $DB_DATABASE);
//check connection
   if($conn->connect_error)
   {
      die("Connection faiiled: " . $conn->connect_error);
   }
   $sql="INSERT INTO `question` (questionstatement , answer,level)
   VALUES ('$statement' , '$ans','$level')";
   if($conn->query($sql) === TRUE)
   {
   //echo "created";
      header('vkvyst.php?action=done');
   }
   else
   {
   //echo "Error :".$sql."<br>".$conn->error;
      header('vkvyst.php?action=failed');

   }
   $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
   }

   main {
      flex: 1 0 auto;
   }
</style>
</head>
<body>
  <header>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper  teal lighten-2">
          <a href="#!" class="brand-logo center">Xunbao</a>
          
       </div>
    </nav>
 </div>
</header>
<main class="yellow lighten-4">


 <div class="container-fluid">
   <div class="row" id="info">
      <br><br>
   </div>

   <div class="row">
    <form class="col s12" action="" method="post">
     <div class="row">
      <label>Question statement</label> <br/>
      <script src="ckeditor/ckeditor.js"></script>

      <textarea id="editor1" name="question" required>
         Your Question Here.....
      </textarea>
      <script>
       CKEDITOR.replace('editor1');
    </script>


 </div>
 <div class="row">
   <div class="input-field col s6">
    <label for="answer">Answer</label>
    <input placeholder="answer here" name="answer" id="answerofproblem" type="text" class="form-control" required>

 </div>

</div>
<div class="input-field col s6">
   <label for="answer">level</label>
   <input placeholder="level here" name="level" id="level" type="text" class="form-control" required>

</div>

</div>
<div class="row">
   <div class="col s7 offset-s5">
    <br>
    <input  type='submit'  value='Create' id='Create'>
 </div>
</div>


</form>

</div>

</div>

</main>






</body>
</html>





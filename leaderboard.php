<?php 
session_start();
if($_SESSION['user_check']){
    include('login/credentials.php');
    $conn=new mysqli ($DB_SERVER , $DB_USERNAME  ,$DB_PASSWORD , $DB_DATABASE);
    if($conn->connect_error)
    {
      die("connection failed: ".$conn->connect_error);
    }
}else{
  header("location: index.php");
}

?>
<?php require_once('header.php');?>

  <body>
  
   <div class="container-fluid center">
    <div class="container center"><!--For Logo-->
      <a href="index.php"><img class="responsive-img" src="assets/images/logo1.png"></a>
      <!--<p>Its a treasure Hunt, in a way, And you are the detective</p>-->
      <br/><br/>
    </div>
    <div class="container">
    <div class="card-panel black">
        <p class="center"><a href="index.php" class="white-text"><i class="fa fa-home"></i> Back To Game</a></p>
       <table class="responsive">
        <thead>
          <tr>
              <th data-field="id">Rank</th>
              <th data-field="name">Name</th>
              <th data-field="price">Level</th>
          </tr>
        </thead>

        <tbody>
        <?php
              $sql="SELECT * FROM `users` ORDER BY `level` DESC, `lastSubmission` ASC";
              $result= $conn->query($sql);
              $s=1;
              if($result->num_rows > 0)
              {
               while($row= $result->fetch_assoc())
               {
                echo '<tr>';
                echo '<td>'.$s++.'</td>';
                echo '<td><img style="max-width:50px;" src="'.$row["dp"].'" class="responsive-image circle" align="middle">&nbsp;'.$row["fullname"].'</td>';
                echo '<td>'.$row["level"].'</td>';
                echo '</tr>';
              }
            }

        ?>
        </tbody>
      </table>
         </div>   
    </div>
  <div class="container-fluid">
    <nav class="transparent">
      <div class="nav-wrapper">
        <ul id="nav-mobile">
          <li class="transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Like Our Facebook Page"><a href="#"><i class="fa fa-facebook" style="font-size: 25px;"></i></a></li>
          <li class="transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Visit Our Website"><a href="#"><i class="fa fa-globe" style="font-size: 25px;"></i></a></li>
          <li class="transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Github"><a href="#"><i class="fa fa-github" style="font-size: 25px;"></i></a></li>
        </ul>
        <ul id="nav-mobile" class="right">
          <li><a href="#">&copy; VIPSAM</a></li>
        </ul>
      </div>
    </nav>
  </div>
  </div>
</body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/init.js"></script>
<script src="assets/js/flipclock.min.js"></script>

</html>

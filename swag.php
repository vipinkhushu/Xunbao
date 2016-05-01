        <?php
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
              include('login/credentials.php');
              $conn=new mysqli ($DB_SERVER , $DB_USERNAME  ,$DB_PASSWORD , $DB_DATABASE);
              if($conn->connect_error)
              {
                die("connection failed: ".$conn->connect_error);
              }
              ?>
<?php require_once('header.php');?>

  <body>
  
   <div class="container-fluid center">
<div class="container">
  <div class="card-panel grey">
  <div class="row">
  <div class="col s5 m5 l5">
          <form action="swag.php" method="get">
        <select class="icons black" name="userEmail">
              <option value="" disabled selected>Choose One</option>

                  <?php
              $sql="SELECT `fullname`,`dp`,`email` FROM `users`";
              $result= $conn->query($sql);
              if($result->num_rows > 0)
              {
               while($row= $result->fetch_assoc())
               {
                   echo'<option data-icon="'.$row["dp"].'" value="'.$row["email"].'" class="circle">'.$row["fullname"].'</option>';
               }
             }
                ?>

        </select>
        </div>
         <div class="col s1 m1 l1">
          <button class="waves-effect waves-light btn grey darken-4">Submit</button>
</form>
         </div>
    </div>
  </div>
</div>
    <div class="container">
    <div class="card-panel black">
        <p class="center"><a href="index.php" class="white-text"><i class="fa fa-key"></i> Xunbao'16 Logs</a></p>
  
       <table class="responsive">
        <thead>
          <tr>
              <th data-field="id">Email</th>
              <th data-field="name">Level</th>
              <th data-field="price">Answer</th>
              <th data-field="price">Time</th>
          </tr>
        </thead>

        <tbody>
        <?php
              if(isset($_GET["userEmail"])){
                                   $userEmail=$_GET["userEmail"];
                                   $sql="SELECT * FROM `submissions` WHERE `user`='$userEmail' ORDER BY `time_stamp` DESC";
                                    $result= $conn->query($sql);
                                    if($result->num_rows > 0)
                                    {
                                     while($row= $result->fetch_assoc())
                                     {
                                      echo '<tr>';
                                      echo '<td>'.$row["user"].'</td>';
                                      echo '<td>'.$row["level"].'</td>';
                                      echo '<td>'.$row["answer"].'</td>';
                                      echo '<td>'.$row["time_stamp"].'</td>';
                                      echo '</tr>';
                                    }
                                  }
              }else{
                              $sql="SELECT * FROM `submissions` ORDER BY `time_stamp` DESC";
                            $result= $conn->query($sql);
                            if($result->num_rows > 0)
                            {
                             while($row= $result->fetch_assoc())
                             {
                              echo '<tr>';
                              echo '<td>'.$row["user"].'</td>';
                              echo '<td>'.$row["level"].'</td>';
                              echo '<td>'.$row["answer"].'</td>';
                              echo '<td>'.$row["time_stamp"].'</td>';
                              echo '</tr>';
                            }
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

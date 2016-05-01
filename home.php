
<?php 
session_start();
if($_SESSION['user_check']){
    include('login/credentials.php');
    $conn=new mysqli ($DB_SERVER , $DB_USERNAME  ,$DB_PASSWORD , $DB_DATABASE);
    if($conn->connect_error)
    {
      die("connection failed: ".$conn->connect_error);
    }
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

}else{
  header("location: index.php");
}

?>
<?php require_once('header.php');?>

  <body>


    
      <ul id="slide-out" class="side-nav black">
      <div class="black">
            <div class="row hoverable">
              <div class="col s4 m4 l4"><br/>
                <img src="<?php echo $_SESSION['dp'];?>" alt="Contact Person" class="circle responsive-image">
              </div>
              <div class="col s8 m8 l8" style="margin-top:5%;"><br/>
                Welcome <?php echo $_SESSION['fname'];?><br/>
                <a href="login/logout.php" class="brown-text bold align-right"><i class="fa fa-sign-out brown-text"></i>Logout</a>
              </div>
            </div>
          </div>
        <li class="black"><a href="leaderboard.php" class="white-text"><i class="fa fa-trophy"></i> Leaderboard</a></li>
        <br/></br>
        <?php
              $sql="SELECT `questionstatement` FROM `question`";
              $result= $conn->query($sql);
              $numberOfQuest=$result->num_rows;
              for($i=0;$i<$numberOfQuest;$i++){
                $print=$i+1;
                echo'<li  class="black"><a href="#!" class="white-text"> ';
                if($i<=$level)
                    echo'<i class="material-icons white-text">lock_open</i>';
                else
                    echo'<i class="material-icons grey-text">lock</i>';

                echo'&nbsp;Level '.$print.'</a></li>';

              }
             ?>
        
      </ul>
    
       
    <div class="container-fluid">
      <div class="row">

        <div class="col s12 m2 l2 black scrollable hide-on-med-and-down" id="ex3" style="min-height:100%;position:absolute;padding:0px;">
          <div class="black">
            <div class="row hoverable">
              <div class="col s4 m4 l4"><br/>
                <img src="<?php echo $_SESSION['dp'];?>" alt="Contact Person" class="circle responsive-image">
              </div>
              <div class="col s8 m8 l8" style="margin-top:5%;"><br/>
                Welcome <?php echo $_SESSION['fname'];?><br/>
                <a href="login/logout.php" class="brown-text align-right"><i class="fa fa-sign-out brown-text"></i>Logout</a>
              </div>
            </div><br/>
          </div>
          <div class=" blue-grey darken-3">
            <a href="leaderboard.php" class="white-text">
            <h5 style="padding:10px;"><i class="fa fa-trophy"></i> Leaderboard</h5>   
            </a> 
          </div>
          <div>
            <ul class="collection blue-grey darken-3" style="margin-top:0px;border:0px;">
            <?php
              $sql="SELECT `questionstatement` FROM `question`";
              $result= $conn->query($sql);
              $numberOfQuest=$result->num_rows;
              for($i=0;$i<$numberOfQuest;$i++){
                $print=$i+1;
                echo'<li class="collection-item blue-grey darken-3" id="black-bottom"><div>Level '.$print.'<a href="#!" class="secondary-content">';
                if($i<=$level)
                    echo'<i class="material-icons right white-text">lock_open</i>';
                else
                    echo'<i class="material-icons right black-text">lock</i>';

                echo'</a></div></li>';
              }
             ?>
               </ul>
         </div>
       </div>
       <div class="col s12 m12 l12">
       <div class="row">
        <div class="col s11 m12 l12">
        <div class="container center"><!--For Logo-->
          <img class="responsive-img" src="assets/images/logo1.png">
          <!--<p>Its a treasure Hunt, in a way, And you are the detective</p>-->
        </div>
        </div>
        <div class="s1 m0 l0" style="padding:2%;">
              <a href="#" data-activates="slide-out" class="button-collapse white-text">
              <i class="fa fa-bars"></i></a>
        </div>
        </div>
        <div class="container center"><!--For question-->
          <div class="row">

            <div class="col s12 m12 l12">
              Question No #
              <!--PHP FOR DISPLAYING QUESTION STATEMENT---->

              <?php
              

            if(isset($level)==null)
              $level=0;

            echo $level."<br/>";
            $level++;
            $sql="SELECT `questionstatement` FROM `question` WHERE `level`='$level'";
            $result= $conn->query($sql);

            if($result->num_rows > 0)
            {
             while($row= $result->fetch_assoc())
             {
              echo $row["questionstatement"];
              break;
            }
          }
          else
          {
           echo "Question Will Be  Comming Soon.....";
         }

         $conn->close();
         ?>

         <!--PHP FOR DISPLAYING QUESTION STATEMENT | ENDS---->
       </div>
     </div>
     <br/>
   </div>
   <div class="container"><!--For answer-->
    <div class="row">

      <div class="col s0 m2 l2 hide-on-med-and-down">&nbsp;
      </div>
      <div class="col s12 m7 l7">
        <form action="checkAnswer.php" method="post">

          <div class="input-field">
            <i class="fa fa-fort-awesome prefix text-white"></i>
            <input id="icon_prefix" name="answer" type="text" placeholder="Your Answer" class="validate" autocomplete="off" required>
            <br/>


          </div>

        </div>
        <div class="col s12 m3 l3">
          <button class="waves-effect waves-light btn grey darken-4">Submit</button>
        </form>
      </div>
    </div>

  </div>
  <div class="container-fluid" style="bottom:0px;">
    <nav class="transparent">
    <br/>
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
</div>

</body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/init.js"></script>
<script src="assets/js/flipclock.min.js"></script>

</html>
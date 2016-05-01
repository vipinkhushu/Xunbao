<?php 
session_start();if(isset($_SESSION['user_check'])){header("location:home.php");}?>

<?php require_once('header.php');?>


  <body>
   <div class="container-fluid center">
    <div class="container center"><!--For Logo-->
      <img class="responsive-img" src="assets/images/logo1.png">
      <!--<p>Its a treasure Hunt, in a way, And you are the detective</p>-->
      <br/><br/>
    </div>
    <div class="container center hide-on-med-and-down"><!--For timer-->
      <div class="row">
        <div class="col s0 m2 l2"> &nbsp;&nbsp;</div>
        <div class="col s12 m12 l12">
                  Top Hunters<br/>
        <?php
            include('login/credentials.php');
    $conn=new mysqli ($DB_SERVER , $DB_USERNAME  ,$DB_PASSWORD , $DB_DATABASE);
    if($conn->connect_error)
    {
      die("connection failed: ".$conn->connect_error);
    }
                      
                       $sql="SELECT * FROM `users` ORDER BY `level` DESC, `lastSubmission` ASC LIMIT 5";
                      $result= $conn->query($sql);

                      if($result->num_rows > 0)
                      {
                       while($row= $result->fetch_assoc())
                       {
                        echo"<img class='responsive-img circle tooltipped' data-position='top' data-delay='50' data-tooltip='".$row["fullname"]."' style='margin:10px;' src='". $row["dp"]."' width='70px' height='70px'>";
                        
                      }
                    }
                    
                    
                   
                    ?>
                    
 
        </div>
      </div>
      <br/>
    </div>
    <div class="container"><!--For login buttons-->
      <!--Login To Play-->
      Register Now<br/>
      <?php
          /******Improting Facebook API Files**************/
          require_once 'login/src/Facebook/autoload.php';
          require_once 'login/credentials.php';
          /******Facebook API Connection With My APP**************/
          $fb = new Facebook\Facebook([
          'app_id' => $appid,
          'app_secret' => $appsecret,
          'default_graph_version' => 'v2.2',
          ]);

          /******Initializing The Login**************/
          $helper = $fb->getRedirectLoginHelper();
          $permissions = ['email', 'publish_actions']; // optional
          $loginUrl = $helper->getLoginUrl($incommingurl, $permissions);

          /******Printing The Login URL**************/
          echo'<a href="' . $loginUrl . '" class="login white-text" title="Login With Facebook"><i class="fa fa-facebook-square fa-4x"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
          ?>
            <?php
          /******Importing Google API Files**************/
          require_once 'login/includes/google-api-php-client/apiClient.php';
          require_once 'login/includes/google-api-php-client/contrib/apiOauth2Service.php';
          
          /******Google API Connection With My APP**************/
          $client = new apiClient();
          //$client->setApplicationName("TheASP");
          $client->setClientId($client_id);
          $client->setClientSecret($client_secret);
          $client->setDeveloperKey($api_key);
          $client->setRedirectUri($redirect_url);
          $client->setApprovalPrompt(false);
          $oauth2 = new apiOauth2Service($client);
          ?>  
          <a href="<?php echo $client->createAuthUrl()?>" class="login white-text" title="Login With Google"><i class="fa fa-google-plus-square fa-4x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="login/collectUserDataTwitter.php" class="login white-text" title="Login With Twitter"><i class="fa fa-twitter-square fa-4x"></i></a>&nbsp;
      <br/>
    </div>

  </div>
<?php require_once('footer.php');?>
</body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/init.js"></script>
<script src="assets/js/flipclock.min.js"></script>

</html>
<?php
  $title = 'Meal Planner | Sign Up';
  include ('./includes/header.html');
  //session_start();
  if($_SERVER["REQUEST_METHOD"]=="POST") {

    require_once ('./mysqli_connect.php');
    $errors = array();

    // username and pass from form
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $password_confirm = mysqli_real_escape_string($db,$_POST['password_confirm']);

    // first make sure that the passwords match.
    if($password != $password_confirm) {
        $errors[] = "Passwords do not match";
    }
    
    $sql = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // IF there are any results, the username is already taken
    if($count > 0) {
        //session_register("myusername");
        //$_SESSION['login_user'] = $myusername;
        //$_SESSION['id'] = $row["id"];
        //header("location: index.php");
        $errors[] = "Username is already taken";
    }
  }
?>
<!-- Navigation -->
<nav class="purple darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Meal Planner</a>
    </div>
  </nav>
  <!-- End Navigation -->

  <!-- Create Account -->
  <div class="section no-pad-bot" id="index-banner">
    <div class="container center">
      <br><br>
      <h1 class="red-text text-darken-1">Sign Up</h1>
      <div class="row card-panel grey lighten-5">
        <form action="" method="post" class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input name="username" id="email" type="email" class="validate" required>
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="password" id="password" type="password" class="validate" required>
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="password_confirm" id="passwordConfirm" type="password" class="validate" required>
              <label for="passwordConfirm">Confirm Password</label>
            </div>
          </div>
          <input class="btn lime accent-4 black-text" type="submit" value="Create Account">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            if(empty($errors)) {
                // add user to db and either redirect to home page or echo out success message
                $query = "INSERT INTO user (username, password) VALUES ('$username','$password')";
                $result = @mysqli_query($db,$query);
                if ($result) {
                    echo '<h3>Thank you!</h3>
                <p>Your account has been created!</p><p><br /></p>';	
                } else {
                    echo '<h3>System Error</h3>
                    <p class="error">Your account was not created due to a database error.</p>'; 
                    echo '<p>' . mysqli_error($db) . '<br /><br />Query: ' . $query . '</p>';
                } 
                mysqli_close($db);
                include ('includes/footer.html'); 
                exit();

            } else {
                echo '<h3>Error!</h3>
                <p class="error">The following error(s) occurred:<br />';
                foreach ($errors as $msg) {
                    echo " - $msg<br />\n";
                }
                echo '</p><p>Please try again.</p>';
            }
        }
        ?>
      </div>
      <br><br>
    </div>
  </div>

<?php
include ('./includes/footer.html');
?>
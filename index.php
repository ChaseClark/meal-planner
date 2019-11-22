<?php
  $title = 'Meal Planner | Login';
  include ('./includes/header.html');
  session_start();
  
  if($_SERVER["REQUEST_METHOD"]=="POST") {
    require_once ('./mysqli_connect.php');
    // username and pass from form
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    
    $sql = "SELECT id,username FROM user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
  
    if($count == 1) {
        //session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        $_SESSION['id'] = $row["id"];
        mysqli_close($db);
        header("location: home.php");
    }else {
        $error = "Username or Password is invalid.";
    }
  }
  //mysqli_close($db);
?>
      <!-- Navigation -->

  <nav class="purple darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Meal Planner</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="create.php">Create Account</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="create.php">Create Account</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <!-- End Navigation -->

  <!-- Login  -->
  <div class="section no-pad-bot">
    <div class="container center red-text text-darken-1">
      <h2>Make meal planning simple</h2>
      <br><br>
      <h5 class="indigo-text">Please, login into your account</h5>
      <div class="row card-panel grey lighten-5">
          <form action="" method="post" class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="username" required>
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate" name="password" required>
                  <label for="password">Password</label>
                </div>
              </div>
          <input class="btn teal accent-4" type="submit" value="Log In">
          </form>
        </div> 
      <br><br>
    </div>
  </div>

<?php
include ('./includes/footer.html');
?>
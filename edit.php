<?php
$title = 'Meal Planner | Edit';
include ('./includes/header.html');
include('session.php');

require_once ('./mysqli_connect.php');
$user_id = $_SESSION['id'];
$username =$_SESSION['login_user'];

// maybe code to prevent cross-user access
if($_SERVER["REQUEST_METHOD"]=="POST") {
  $query = "UPDATE meals SET breakfast_id = '{$_POST['selectBreakfast']}' WHERE meals_id='{$_GET['meals_id']}'";
  $result = @mysqli_query($db,$query);
  if ($result) {
      header("Location: home.php");
      exit;
  } else {
      echo '<h3>System Error</h3>
      <p class="error">Your meals were not updated due to a database error.</p>'; 
      echo '<p>' . mysqli_error($db) . '<br /><br />Query: ' . $query . '</p>';
  } 
  mysqli_close($db);
}

function loadNewSection($meal_name){
  global $db;
  // get all preset recipes
  $q1 = "SELECT * FROM recipe WHERE is_custom = '0'";
  $r1 = mysqli_query($db,$q1);
  $n1 = mysqli_num_rows($r1);

  echo '<div id="'.$meal_name.'" class="meal-selection">
  <a id="btn'.$meal_name.'" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>'.$meal_name.'</a>
  <div id="ddl'.$meal_name.'" class="input-field initial-hide">
    <select name="select'.$meal_name.'">
      <option value="0">None</option>
      <option value="?">Custom Recipe</option>';
      if($n1 > 0) {
        while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
          echo '<option value="'.$row1['recipe_id'].'">'.$row1['name'].'</option>';
        }
      }
    echo '</select>
  </div>

  <div id="new'.$meal_name.'" class="col s12 card-panel grey lighten-5 initial-hide">
        <div class="row">
          <div class="input-field col s12">
            <input id="name'.$meal_name.'" type="text" class="validate" name="name'.$meal_name.'">
            <label for="name'.$meal_name.'">Name</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input id="ingredients'.$meal_name.'" type="text" class="validate" name="ingredients'.$meal_name.'">
              <label for="ingredients'.$meal_name.'">Ingredients (separate with comma)</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input id="calories'.$meal_name.'" type="number" class="validate" name="calories'.$meal_name.'" min="0" max="9999" step="1">
              <label for="calories'.$meal_name.'">Calories (Whole Number)</label>
            </div>
        </div>
  </div>

</div>

<hr>';
}

function loadSavedSection($meal_name){
  global $db;
  // get all preset recipes
  $q1 = "SELECT * FROM recipe WHERE is_custom = '0'";
  $r1 = mysqli_query($db,$q1);
  $n1 = mysqli_num_rows($r1);

  echo '<div id="'.$meal_name.'" class="meal-selection">
  <a id="btn'.$meal_name.'" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>'.$meal_name.'</a>
  <div id="ddl'.$meal_name.'" class="input-field initial-hide">
    <select name="select'.$meal_name.'">
      <option value="0">None</option>
      <option value="?">Custom Recipe</option>';
      if($n1 > 0) {
        while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
          echo '<option value="'.$row1['recipe_id'].'">'.$row1['name'].'</option>';
        }
      }
    echo '</select>
  </div>

  <div id="new'.$meal_name.'" class="col s12 card-panel grey lighten-5 initial-hide">
        <div class="row">
          <div class="input-field col s12">
            <input id="name'.$meal_name.'" type="text" class="validate" name="name'.$meal_name.'">
            <label for="name'.$meal_name.'">Name</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input id="ingredients'.$meal_name.'" type="text" class="validate" name="ingredients'.$meal_name.'">
              <label for="ingredients'.$meal_name.'">Ingredients (separate with comma)</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input id="calories'.$meal_name.'" type="number" class="validate" name="calories'.$meal_name.'" min="0" max="9999" step="1">
              <label for="calories'.$meal_name.'">Calories (Whole Number)</label>
            </div>
        </div>
  </div>

</div>

<hr>';
}

?>

<!-- if recipe isnt custom, load the data but do not allow for editing, add -->
<!-- add 'disabled' in the html -->
<body>
  <!-- Navigation -->
  <nav class="purple darken-2" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo">Meal Planner</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav">
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
  <!-- End Navigation -->

  <!-- Edit Section -->

  <!-- TODO: Add a "saved" toast or notification, add save button -->
  <div class="section no-pad-bot">
    <div class="container center">
    <?php
      $sql = "SELECT * FROM meals WHERE user_id = '$user_id' and meals_id='{$_GET['meals_id']}'";
      $result = mysqli_query($db,$sql);
      $num = mysqli_num_rows($result);

      if($num == 1) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<h1 class="center red-text darken-1">Edit - '.$row['date'].'</h1>
            <div class="card-panel grey lighten-5">
            <form action="" method="post" class="col s12">';

            // breakfast
            if($row['breakfast_id'] < 1) {
              // display the add button
              loadNewSection('Breakfast');
            }
            else {
              // load the current recipe id in dropdown or custom format
              loadSavedSection('Breakfast');
            }
          }
      }else {
          echo "No meal id detected or in db.";
          // show datepicker and create a new meals entry for the current user
      }
      // echo bottom portion of form
      echo '<div class="section"></div>
            <div class="section"></div>
            <div class="section"></div>
            <div class="section"></div>
            <input class="btn uniform-btn-width teal accent-4" type="submit" value="Save"> 
            <a href="home.php" class="waves-effect waves-light btn uniform-btn-width red accent-4"><i class="material-icons right">cancel</i>Cancel</a>
            </form>
            </div> ';
      ?>
      <!-- <h1 class="center red-text darken-1">Edit - 10/28/19</h1>
      <div class="card-panel grey lighten-5">
      <form action="" method="post" class="col s12">

      <div id="Breakfast" class="meal-selection">
        <a id="btnBreakfast" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>breakfast</a>
        <div id="ddlBreakfast" class="input-field initial-hide">
          <select class="icons">
            <option value="" disabled selected>Choose your option</option>
            <option value="0">None</option>
            <option value="?" data-icon="images/plus.png">Custom Recipe</option>
            <option value="42345" data-icon="images/filet-mignon.png">Filet Mignon</option>
            <option value="46456" data-icon="images/salmon.png">Smoked Salmon</option>
          </select>
        </div>

        <div id="newBreakfast" class="col s12 card-panel grey lighten-5 initial-hide">
              <div class="row">
                <div class="input-field col s12">
                  <input id="nameBreakfast" type="text" class="validate" name="nameBreakfast">
                  <label for="nameBreakfast">Name</label>
                </div>
              </div>
              <div class="row">
                  <div class="input-field col s12">
                    <input id="ingredientsBreakfast" type="text" class="validate" name="ingredientsBreakfast">
                    <label for="ingredientsBreakfast">Ingredients (separate with comma)</label>
                  </div>
              </div>
              <div class="row">
                  <div class="input-field col s12">
                    <input id="caloriesBreakfast" type="number" class="validate" name="caloriesBreakfast" min="0" max="9999" step="1">
                    <label for="caloriesBreakfast">Calories (Whole Number)</label>
                  </div>
              </div>
        </div>

      </div>

      <hr>
      <div id="Lunch" class="meal-selection">
        <a id="btnLunch" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>lunch</a>
        <div id="ddlLunch" class="input-field initial-hide">
          <select class="icons">
          <option value="" disabled selected>Choose your option</option>
            <option value="0">None</option>
            <option value="123213" data-icon="images/plus.png">Custom Recipe</option>
            <option value="42345" data-icon="images/filet-mignon.png">Filet Mignon</option>
            <option value="46456" data-icon="images/salmon.png">Smoked Salmon</option>
          </select>
        </div>
      </div>
      <hr>
      <div id="Dinner" class="meal-selection">
        <a id="btnDinner" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>dinner</a>
        <div id="ddlDinner" class="input-field initial-hide">
          <select class="icons">
          <option value="" disabled selected>Choose your option</option>
            <option value="0">None</option>
            <option value="123213" data-icon="images/plus.png">Custom Recipe</option>
            <option value="42345" data-icon="images/filet-mignon.png">Filet Mignon</option>
            <option value="46456" data-icon="images/salmon.png">Smoked Salmon</option>
          </select>
        </div>
      </div>

      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <input class="btn uniform-btn-width teal accent-4" type="submit" value="Save"> 
      <a href="home.php" class="waves-effect waves-light btn uniform-btn-width red accent-4"><i class="material-icons right">cancel</i>Cancel</a>
      </form>
</div> -->

    </div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="includes/js/materialize.js"></script>
  <script src="includes/js/init.js"></script>
  <script src="includes/js/edit.js"></script>


</body>

</html>
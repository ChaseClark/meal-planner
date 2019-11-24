<?php
$title = 'Meal Planner | Edit';
include ('./includes/header.html');
include('session.php');

require_once ('./mysqli_connect.php');
$user_id = $_SESSION['id'];
$username =$_SESSION['login_user'];

// maybe code to prevent cross-user access
if($_SERVER["REQUEST_METHOD"]=="POST") {
  // simple function to check if recipe_id is custom or not
  function isPreset($r_id){
    global $db;
    $sql = "SELECT * FROM recipe WHERE recipe_id = '$r_id' and is_custom='0'";
    $result = mysqli_query($db,$sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      return true;
    } else {
      return false;
    }
  }


  // var to hold newly inserted meals_id
  $new_meals_id = 0;
  $sql = "SELECT * FROM meals WHERE user_id = '$user_id' and meals_id='{$_GET['meals_id']}'";
  $result = mysqli_query($db,$sql);
  $num = mysqli_num_rows($result);
  if ($num > 0) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row['breakfast_id'] > 0) {
      $update_breakfast_id = $row['breakfast_id'];
    } elseif (isPreset($row['breakfast_id'])){
      $update_breakfast_id = -1;
    } else{
      $update_breakfast_id = -1;
    }

    if($row['lunch_id'] > 0) {
      $update_lunch_id = $row['lunch_id'];
    } elseif (isPreset($row['lunch_id'])){
      $update_breakfast_id = -1;
    } else{
      $update_breakfast_id = -1;
    }

    if($row['dinner_id'] > 0) {
      $update_dinner_id = $row['dinner_id'];
    } elseif (isPreset($row['dinner_id'])){
      $update_breakfast_id = -1;
    } else{
      $update_breakfast_id = -1;
    }

  } else {
    // no mealS_id detected
    // create a new meals entry check if date is already taken for current user
    $sql = "SELECT * FROM meals WHERE user_id = '$user_id' and date='{$_GET['date']}'";
    $result = mysqli_query($db,$sql);
    $num = mysqli_num_rows($result);
    if ($num < 1) {
      // none detected
      $insert_query = "INSERT INTO meals (date,user_id) VALUES ('{$_GET['date']}','$user_id')";
      $insert_result = mysqli_query($db,$insert_query);
      if ($insert_result) {
          // grab the last inserted id
          $new_meals_id = mysqli_insert_id($db);
      } else {
          echo '<div class="container center">
          <h1>Everything is broke. Please go back and try again.</h1>
          <a class="btn" href="home.php">Take Me Back</a>
          </div>';
          exit();
      }
    }
    else {
      // date already in use
      echo '<div class="container center">
            <h1>Date is already in use. Please go back and try again.</h1>
            <a class="btn" href="home.php">Take Me Back</a>
            </div>';
      exit();
    }
  }


  if($_POST['selectBreakfast']==-1) {
    // check if we need to update rather than insert
    if($update_breakfast_id > 0) {
      $update_query = "UPDATE recipe SET name='{$_POST['nameBreakfast']}', ingredients='{$_POST['ingredientsBreakfast']}', instructions='{$_POST['instructionsBreakfast']}', calories='{$_POST['caloriesBreakfast']}' WHERE recipe_id=$update_breakfast_id";
      $update_result = @mysqli_query($db,$update_query);
    } else {
      $insert_query = "INSERT INTO recipe (name,is_custom,ingredients,instructions, calories) VALUES ('{$_POST['nameBreakfast']}','1','{$_POST['ingredientsBreakfast']}','{$_POST['instructionsBreakfast']}','{$_POST['caloriesBreakfast']}')";
      $insert_result = @mysqli_query($db,$insert_query);
      if ($insert_result) {
          // grab the last inserted id
          $update_breakfast_id = mysqli_insert_id($db);
      } else {
        # error
      }
    }
  }
  else {
    // either none or a preset is selected
    $update_breakfast_id = $_POST['selectBreakfast'];
  }

  if($_POST['selectLunch']==-1) {
    if($update_lunch_id > 0) {
      $update_query = "UPDATE recipe SET name='{$_POST['nameLunch']}', ingredients='{$_POST['ingredientsLunch']}', instructions='{$_POST['instructionsLunch']}', calories='{$_POST['caloriesLunch']}' WHERE recipe_id=$update_lunch_id";
      $update_result = @mysqli_query($db,$update_query);
    } else {
      $insert_query = "INSERT INTO recipe (name,is_custom,ingredients,instructions, calories) VALUES ('{$_POST['nameLunch']}','1','{$_POST['ingredientsLunch']}','{$_POST['instructionsLunch']}','{$_POST['caloriesLunch']}')";
      $insert_result = @mysqli_query($db,$insert_query);
      if ($insert_result) {
          // grab the last inserted id
          $update_lunch_id = mysqli_insert_id($db);
      } else {
        # error
      }
    }
  }
  else {
    // either none or a preset is selected
    $update_lunch_id = $_POST['selectLunch'];
  }

  if($_POST['selectDinner']==-1) {
    if($update_dinner_id > 0) {
      $update_query = "UPDATE recipe SET name='{$_POST['nameDinner']}', ingredients='{$_POST['ingredientsDinner']}', instructions='{$_POST['instructionsDinner']}', calories='{$_POST['caloriesDinner']}' WHERE recipe_id=$update_dinner_id";
      $update_result = @mysqli_query($db,$update_query);
    } else {
      $insert_query = "INSERT INTO recipe (name,is_custom,ingredients,instructions, calories) VALUES ('{$_POST['nameDinner']}','1','{$_POST['ingredientsDinner']}','{$_POST['instructionsDinner']}','{$_POST['caloriesDinner']}')";
      $insert_result = @mysqli_query($db,$insert_query);
      if ($insert_result) {
          // grab the last inserted id
          $update_dinner_id = mysqli_insert_id($db);
      } else {
        # error
      }
    }
  }
  else {
    // either none or a preset is selected
    $update_dinner_id = $_POST['selectDinner'];
  }

  // we can update all 3 at once
  if ($new_meals_id == 0) {
    // editing an existing meals_id
    $query = "UPDATE meals SET breakfast_id = '$update_breakfast_id',
    lunch_id = '$update_lunch_id', dinner_id = '$update_dinner_id' WHERE meals_id='{$_GET['meals_id']}'";
  } else {
    // new meals id
    $query = "UPDATE meals SET breakfast_id = '$update_breakfast_id',
    lunch_id = '$update_lunch_id', dinner_id = '$update_dinner_id' WHERE meals_id='$new_meals_id'";
  }
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

function loadNewSection($meal_type){
  global $db;
  // get all preset recipes
  $q1 = "SELECT * FROM recipe WHERE is_custom = '0'";
  $r1 = mysqli_query($db,$q1);
  $n1 = mysqli_num_rows($r1);

  echo '<div id="'.$meal_type.'" class="meal-selection">
  <a id="btn'.$meal_type.'" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>'.$meal_type.'</a>
  <div id="ddl'.$meal_type.'" class="input-field initial-hide">
    <select name="select'.$meal_type.'">
      <option value="0">None</option>
      <option value="-1">Custom Recipe</option>';
      if($n1 > 0) {
        while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
          echo '<option value="'.$row1['recipe_id'].'">'.$row1['name'].'</option>';
        }
      }
    echo '</select>
  </div>

  <div id="new'.$meal_type.'" class="col s12 card-panel grey lighten-5 initial-hide">
        <div class="row">
          <div class="input-field col s12">
            <input id="name'.$meal_type.'" type="text" class="validate" name="name'.$meal_type.'">
            <label for="name'.$meal_type.'">Name</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <textarea id="ingredients'.$meal_type.'" class="validate materialize-textarea" name="ingredients'.$meal_type.'"></textarea>
              <label for="ingredients'.$meal_type.'">Ingredients (separate with comma)</label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="instructions'.$meal_type.'" type="text" class="validate materialize-textarea" name="instructions'.$meal_type.'"></textarea>
            <label for="instructions'.$meal_type.'">Instructions (separate with comma)</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input id="calories'.$meal_type.'" type="number" class="validate" name="calories'.$meal_type.'" min="0" max="9999" step="1">
              <label for="calories'.$meal_type.'">Calories (Whole Number)</label>
            </div>
        </div>
  </div>

</div>

<hr>';
}

function loadSavedSection($meal_type, $r_id){
  global $db;
  // get all preset recipes
  $q1 = "SELECT * FROM recipe WHERE is_custom = '0'";
  $r1 = mysqli_query($db,$q1);
  $n1 = mysqli_num_rows($r1);

  $t_query = "SELECT * FROM recipe WHERE recipe_id = '{$r_id}'";
  $t_result = mysqli_query($db,$t_query);
  $t_num = mysqli_num_rows($t_result);
  if($t_num == 1){
    // check for custom
    $t_row = mysqli_fetch_array($t_result, MYSQLI_ASSOC);
  }

  // removed initial hide js from ddl and added it to btn
  echo '<div id="'.$meal_type.'" class="meal-selection">
  <a id="btn'.$meal_type.'" class=" initial-hide waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>'.$meal_type.'</a>
  <div id="ddl'.$meal_type.'" class="input-field">
    <select name="select'.$meal_type.'">
      <option value="0">None</option>';
      if($t_num == 1) {
          // set to selected if custom
          if($t_row['is_custom']==1)
          {
            echo '<option selected value="-1">Custom Recipe</option>';
          }
          else {
            echo '<option value="-1">Custom Recipe</option>';
          }
      }      
      if($n1 > 0) {
        while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
          // check if selected
          if($row1['recipe_id']==$r_id)
          {
            echo '<option value="'.$row1['recipe_id'].'" selected>'.$row1['name'].'</option>';
          }
          else {
            echo '<option value="'.$row1['recipe_id'].'">'.$row1['name'].'</option>';
          }
        }
      }
    echo '</select>
  </div>';
  
  if($t_num == 1){
    // check for custom
      if($t_row['is_custom'] == 0) {
        // not custom
        echo '<div id="new'.$meal_type.'" class="col s12 card-panel grey lighten-5 initial-hide">
        <div class="row">
          <div class="input-field col s12">
            <input id="name'.$meal_type.'" type="text" class="validate" name="name'.$meal_type.'">
            <label for="name'.$meal_type.'">Name</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <textarea id="ingredients'.$meal_type.'" type="text" class="validate materialize-textarea" name="ingredients'.$meal_type.'"></textarea>
              <label for="ingredients'.$meal_type.'">Ingredients (separate with comma)</label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="instructions'.$meal_type.'" type="text" class="validate materialize-textarea" name="instructions'.$meal_type.'"></textarea>
            <label for="instructions'.$meal_type.'">Instructions (separate with comma)</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input id="calories'.$meal_type.'" type="number" class="validate" name="calories'.$meal_type.'" min="0" max="9999" step="1">
              <label for="calories'.$meal_type.'">Calories (Whole Number)</label>
            </div>
        </div>
          </div>

        </div>

        <hr>';
      }
      else {
        // this is custom
        // we are adding html "value" fields here to prefill the data from db
        echo '<div id="new'.$meal_type.'" class="col s12 card-panel grey lighten-5">
        <div class="row">
          <div class="input-field col s12">
            <input id="name'.$meal_type.'" type="text" class="validate" name="name'.$meal_type.'" value="'.$t_row['name'].'">
            <label for="name'.$meal_type.'">Name</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <textarea id="ingredients'.$meal_type.'" type="text" class="validate materialize-textarea" name="ingredients'.$meal_type.'">'.$t_row['ingredients'].'</textarea>
              <label for="ingredients'.$meal_type.'">Ingredients (separate with comma)</label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="instructions'.$meal_type.'" type="text" class="validate materialize-textarea" name="instructions'.$meal_type.'">'.$t_row['instructions'].'</textarea>
            <label for="instructions'.$meal_type.'">Instructions (separate with comma)</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input id="calories'.$meal_type.'" type="number" class="validate" name="calories'.$meal_type.'" min="0" max="9999" step="1" value="'.$t_row['calories'].'">
              <label for="calories'.$meal_type.'">Calories (Whole Number)</label>
            </div>
        </div>
          </div>

        </div>

        <hr>';
      }
  }
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
              loadSavedSection('Breakfast',$row['breakfast_id']);
            }

            // lunch
            if($row['lunch_id'] < 1) {
              // display the add button
              loadNewSection('Lunch');
            }
            else {
              // load the current recipe id in dropdown or custom format
              loadSavedSection('Lunch',$row['lunch_id']);
            }

            // dinner
            if($row['dinner_id'] < 1) {
              // display the add button
              loadNewSection('Dinner');
            }
            else {
              // load the current recipe id in dropdown or custom format
              loadSavedSection('Dinner',$row['dinner_id']);
            }            

          }
      }else {
          // load the 3 new sections and modify the h1 text
          echo '<h1 class="center red-text darken-1">New - '.$_GET['date'].'</h1>
          <div class="card-panel grey lighten-5">
          <form action="" method="post" class="col s12">';


          loadNewSection('Breakfast');
          loadNewSection('Lunch');
          loadNewSection('Dinner');
          
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

    </div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="includes/js/materialize.js"></script>
  <script src="includes/js/init.js"></script>
  <script src="includes/js/edit.js"></script>


</body>

</html>
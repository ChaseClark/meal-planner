<?php
$title = 'Meal Planner | Edit';
include ('./includes/header.html');
include('session.php');
?>

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
      <h1 class="center red-text darken-1">Edit - 10/28/19</h1>
      <div class="card-panel grey lighten-5 edit-card">

      <div id="Breakfast" class="meal-selection">
        <a id="btnBreakfast" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>breakfast</a>
        <div id="ddlBreakfast" class="input-field">
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
      <div id="Lunch" class="meal-selection">
        <a id="btnLunch" class="waves-effect waves-light btn uniform-btn-width purple darken-2"><i class="material-icons right">add</i>lunch</a>
        <div id="ddlLunch" class="input-field">
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
        <div id="ddlDinner" class="input-field">
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
      <a class="waves-effect waves-light btn uniform-btn-width teal accent-4"><i class="material-icons right">save</i>Save</a>
      <a href="home.php" class="waves-effect waves-light btn uniform-btn-width red accent-4"><i class="material-icons right">cancel</i>Cancel</a>
</div>
    </div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="includes/js/materialize.js"></script>
  <script src="includes/js/init.js"></script>
  <script src="includes/js/edit.js"></script>


</body>

</html>
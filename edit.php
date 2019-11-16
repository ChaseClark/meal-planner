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
  <div class="section no-pad-bot" id="index-banner">
    <div class="container center">
      <h1 class="center red-text darken-1">Edit - 10/28/19</h1>
      <div class="card-panel grey lighten-5 edit-card">
      <a id="btnBreakfast" class="waves-effect waves-light btn uniform-btn-width brown darken-3"><i class="material-icons right">add</i>breakfast</a>
      <div id="dropdown" class="input-field">
        <select class="icons">
          <option value="" disabled selected>Choose your option</option>
          <option value="" data-icon="images/plus.png">Custom Recipe</option>
          <option value="" data-icon="images/filet-mignon.png">Filet Mignon</option>
          <option value="" data-icon="images/salmon.png">Smoked Salmon</option>
        </select>
      </div>

      <hr>
      <a class="waves-effect waves-light btn uniform-btn-width red darken-3"><i class="material-icons right">add</i>lunch</a>
      <hr>
      <a class="waves-effect waves-light btn uniform-btn-width blue"><i class="material-icons right">add</i>dinner</a>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <a class="waves-effect waves-light btn uniform-btn-width teal accent-4"><i class="material-icons right">save</i>Save</a>
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
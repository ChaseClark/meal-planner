<?php
$title = 'Meal Planner | Home';
include ('./includes/header.html');
include('session.php');
?>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Meal Planner</a>
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

    <!-- Do not need to render past days with no data to show -->
    <div class="section no-pad-bot" id="index-banner">
        <div class="container center">
            <h1 class="center">Weekly Schedule</h1>
            <br>
            <h5>Select A Date</h5>
            <input id="date" type="text" class="datepicker center">
            <h5><-- Swipe to change day --></h5>
            <div class="carousel carousel-slider center meals-carousel">
                    <div class="card hoverable carousel-item">
                        <a href="edit.html" class="btn-floating right waves-effect waves-light red"><i
                                class="material-icons">edit</i></a>
                        <div class="card-content">
                            <span id="card0" class="card-title">change me</span>
                            <p>Total Calories: 2000</p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a href="#breakfast0">Breakfast</a></li>
                                <li class="tab"><a href="#lunch0">Lunch</a></li>
                                <li class="tab"><a href="#dinner0">Dinner</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="breakfast0">Breakfast</div>
                            <div id="lunch0">Lunch</div>
                            <div id="dinner0">Dinner</div>
                        </div>
                    </div>
                    <div class="card hoverable carousel-item">
                        <a href="edit.html" class="btn-floating right waves-effect waves-light red"><i
                                class="material-icons">edit</i></a>
                        <div class="card-content">
                            <span class="card-title">Monday - 10/28/2019</span>
                            <p>Total Calories: 2000</p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a href="#breakfast0">Breakfast</a></li>
                                <li class="tab"><a href="#lunch0">Lunch</a></li>
                                <li class="tab"><a href="#dinner0">Dinner</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="breakfast0">Breakfast</div>
                            <div id="lunch0">Lunch</div>
                            <div id="dinner0">Dinner</div>
                        </div>
                    </div>

                    <div class="card hoverable carousel-item ">
                        <a href="edit.html" class="btn-floating right waves-effect waves-light red"><i
                                class="material-icons">edit</i></a>
                        <div class="card-content">
                            <span class="card-title">Monday - 10/28/2019</span>
                            <p>Total Calories: 2000</p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a href="#breakfast0">Breakfast</a></li>
                                <li class="tab"><a href="#lunch0">Lunch</a></li>
                                <li class="tab"><a href="#dinner0">Dinner</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="breakfast0">Breakfast</div>
                            <div id="lunch0">Lunch</div>
                            <div id="dinner0">Dinner</div>
                        </div>
                    </div>

                    <div class="card hoverable carousel-item">
                        <a href="edit.html" class="btn-floating right waves-effect waves-light red"><i
                                class="material-icons">edit</i></a>
                        <div class="card-content">
                            <span class="card-title">Monday - 10/28/2019</span>
                            <p>Total Calories: 2000</p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a href="#breakfast0">Breakfast</a></li>
                                <li class="tab"><a href="#lunch0">Lunch</a></li>
                                <li class="tab"><a href="#dinner0">Dinner</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="breakfast0">Breakfast</div>
                            <div id="lunch0">Lunch</div>
                            <div id="dinner0">Dinner</div>
                        </div>
                    </div>

                    <div class="card hoverable carousel-item">
                        <a href="edit.html" class="btn-floating right waves-effect waves-light red"><i
                                class="material-icons">edit</i></a>
                        <div class="card-content">
                            <span class="card-title">Monday - 10/28/2019</span>
                            <p>Total Calories: 2000</p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab"><a href="#breakfast0">Breakfast</a></li>
                                <li class="tab"><a href="#lunch0">Lunch</a></li>
                                <li class="tab"><a href="#dinner0">Dinner</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            <div id="breakfast0">Breakfast</div>
                            <div id="lunch0">Lunch</div>
                            <div id="dinner0">Dinner</div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>

    </div> <!-- end of content div-->
<!-- <div id="footer">
    <p>Copyright &copy; Meal Planner</p>
</div> -->
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="includes/js/materialize.js"></script>
<script src="includes/js/init.js"></script>
<script src="includes/js/home.js"></script>
</body>

</html>
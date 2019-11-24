<?php
$title = 'Meal Planner | Home';
include ('./includes/header.html');
include('session.php');

require_once ('./mysqli_connect.php');
$user_id = $_SESSION['id'];
$username =$_SESSION['login_user'];

?>
    <nav class="purple darken-2" role="navigation">
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

    <!-- when a date is selected, check for existing entry, then go to edit.php or load the card on this day -->
    <!-- Do not need to render past days with no data to show -->
    <!-- date is in yyyy-mm-dd format -->
    <div class="section no-pad-bot">
        <div class="container center">
            <h1 class="center red-text text-darken-1">Weekly Schedule</h1>
            <br>
            <!-- <h5>Select A Date To Add New Entry</h5>
            <input id="date" type="text" class="datepicker center"> -->
            <h5>< Swipe to change day ></h5>
            <div class="carousel carousel-slider center meals-carousel">
                <?php
                    $sql = "SELECT * FROM meals WHERE user_id = '$user_id' ORDER BY 'date'";
                    $result = mysqli_query($db,$sql);
                    $num = mysqli_num_rows($result);
                    //$active = $row['active'];

                    // If result matched $myusername and $mypassword, table row must be 1 row

                    if($num > 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo '<div class="card hoverable carousel-item">
                            <a href="edit.php?meals_id='.$row['meals_id'].'" class="btn-floating right waves-effect waves-light teal accent-4"><i
                                    class="material-icons">edit</i></a>
                            <div class="card-content">
                                <span id="card0" class="card-title">'.
                                $row['date'].
                                '</span>
                            </div>
                            <div class="card-tabs">
                                <ul class="tabs tabs-fixed-width">
                                    <li class="tab"><a href="#breakfast'.$row['meals_id'].'">Breakfast</a></li>
                                    <li class="tab"><a href="#lunch'.$row['meals_id'].'">Lunch</a></li>
                                    <li class="tab"><a href="#dinner'.$row['meals_id'].'">Dinner</a></li>
                                </ul>
                            </div>
                            <div class="card-content lighten-2">';
                            

                            $q1 = "SELECT * FROM recipe WHERE recipe_id = '{$row['breakfast_id']}'";
                            $r1 = mysqli_query($db,$q1);
                            $n1 = mysqli_num_rows($r1);
                            if ($n1 == 1) {
                                # there should only every be 1 result
                                $row1 = mysqli_fetch_array($r1,MYSQLI_ASSOC);
                                echo '<div id="breakfast'.$row['meals_id'].'">
                                    <h4>'.$row1['name'].'</h4>
                                    <p><em>Calories: '.$row1['calories'].'</em></p>
                                    <br/>
                                    <p>Ingredients: '.$row1['ingredients'].'</p>
                                    <br/>
                                    <p>Instructions: '.$row1['instructions'].'</p>
                                </div>';
                            }
                            else {
                                echo '<div id="breakfast'.$row['meals_id'].'">
                                        Click the Edit button to add me...
                                    </div>';
                            }

                            $q2 = "SELECT * FROM recipe WHERE recipe_id = '{$row['lunch_id']}'";
                            $r2 = mysqli_query($db,$q2);
                            $n2 = mysqli_num_rows($r2);
                            if ($n2 == 1) {
                                # there should only every be 1 result
                                $row2 = mysqli_fetch_array($r2,MYSQLI_ASSOC);
                                echo '<div id="lunch'.$row['meals_id'].'">
                                    <h4>'.$row2['name'].'</h4>
                                    <p><em>Calories: '.$row2['calories'].'</em></p>
                                    <br/>
                                    <p>Ingredients: '.$row2['ingredients'].'</p>
                                    <br/>
                                    <p>Instructions: '.$row2['instructions'].'</p>
                                </div>';
                            }
                            else {
                                echo '<div id="lunch'.$row['meals_id'].'">
                                        Click the Edit button to add me...
                                    </div>';
                            }

                            
                            $q3 = "SELECT * FROM recipe WHERE recipe_id = '{$row['dinner_id']}'";
                            $r3 = mysqli_query($db,$q3);
                            $n3 = mysqli_num_rows($r3);
                            if ($n3 == 1) {
                                # there should only every be 1 result
                                $row3 = mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                echo '<div id="dinner'.$row['meals_id'].'">
                                    <h4>'.$row3['name'].'</h4>
                                    <p><em>Calories: '.$row3['calories'].'</em></p>
                                    <br/>
                                    <p>Ingredients: '.$row3['ingredients'].'</p>
                                    <br/>
                                    <p>Instructions: '.$row3['instructions'].'</p>
                                </div>';
                            }
                            else {
                                echo '<div id="lunch'.$row['meals_id'].'">
                                        Click the Edit button to add me...
                                    </div>';
                            }


                            echo '</div>
                        </div> ';
                        }
                        mysqli_close($db);
                    }else {
                        echo "Nothing found.";
                    }

                ?>


                <!-- '<div id="breakfast'.$row['meals_id'].'">Breakfast</div>'
                <div id="lunch'.$row['meals_id'].'">Lunch</div>
                <div id="dinner'.$row['meals_id'].'">Dinner</div> -->


            <!--
                    <div class="card hoverable carousel-item">
                        <a href="edit.php" class="btn-floating right waves-effect waves-light teal accent-4"><i
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
                        <div class="card-content grey lighten-2">
                            <div id="breakfast0">Breakfast</div>
                            <div id="lunch0">Lunch</div>
                            <div id="dinner0">Dinner</div>
                        </div>
                    </div>  -->
            </div>
        </div>
    </div>

    </div> 
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="includes/js/materialize.js"></script>
<script src="includes/js/init.js"></script>
<script src="includes/js/home.js"></script>
</body>

</html>
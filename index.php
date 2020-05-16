<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Region Wars</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylequiz.css"/>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    
    session_start();
        $username = '';
        if(isset($_GET['username'])){
            if(isset($_SESSION['username'])){
                unset($_SESSION['username']);
            }
            $_SESSION['username'] = $_GET['username'];
        }else{
            // have to relogging 
        }
    ?>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>FAT</h3>
            </div>

            <ul class="list-unstyled components">
                <p><?=$_SESSION['username'];?></p>
                <li>
                    <a href="profile.html">Profile</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Games</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href=#>Region Wars</a>
                        </li>
                        <li>
                            <a href="minibossSchedule.php">Mini Boss Schedule</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Rewards</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="rewards.php">Rewards</a>
                        </li>
                        <li>
                            <a href=#>Vouchers</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="transactions.php">Wallet</a>
                </li>
                <li>
                    <a href="#">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

           
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
            
            <br>

            <img src="img/meteorite.png" class="header-image">
            <p class="header-text">Region Wars</p>

            <div class="line"></div>

            

                <div class="quiz-home-box custom-box show">
                    <h4 style="color:black">The Boss is in your region!</h4>
                    <!-- <p>Time left to enter:</p>
                    <div class="time-to-enter">
                            <div class="remaining-time-to-enter"></div>
                            <span class="time-up-to-enter">Time's Up</span>
                        </div> -->
                    <button type="button" class="start-quiz-btn btn">Gear up and Fight!</button>
                </div>

                <!-- <div class="quiz-home-box-completed custom-box show">
                    <h4>Boss is defeated!</h4>
                    <button type="button" class="start-quiz-btn btn">Fight!</button>
                </div> -->

                <div class="quiz-box custom-box">
                    <div class="stats">
                        <div class="quiz-time">
                            <div class="remaining-time"></div>
                            <span class="time-up-text">Time's Up</span>
                        </div>
                        <div class="score-board">
                            <span class="score-text">Damaged Inflicted:</span>
                            <span class="correct-answers"></span>
                        </div>
                    </div>
                    <div class="question-box">
                        <div class="current-question-num">

                        </div>
                        <div class="question-text">

                        </div>
                    </div>
                    <div class="option-box">

                    </div>
                    <div class="answer-description">

                    </div>
                    <div class="next-question">
                        <button type="button" class="next-question-btn btn">Next Question</button>
                        <button type="button" class="see-result-btn btn">See Your Result</button>
                    </div>

                </div>

                <div class="quiz-over-box custom-box">
                    <h1>Fight Results</h1>
                    <h4>Total Opportunities: <span class="total-questions"></span></h4>
                    <h4>Successful Attacks: <span class="total-correct"></span></h4>
                    <h4>Missed Attacks: <span class="total-wrong"></span></h4>
                    <h4>Strike Percentage: <span class="percentage"></span></h4>
                    <h4>Total Damage Dealt: <span class="dmg-dealt"></span></h4>
                    <!-- <button type="button" class="start-again-quiz-btn btn">Start Again</button> -->
                    <button type="button" class="go-home-btn btn">Go to Home</button>
                </div>

                <script src="scriptquiz.js"></script>
            


        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
        </script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
        </script>
        <form method='GET'><input type='hidden' name='accountID' id='accountID' value=''></form>
<script>
    var username = "<?php echo $username; ?>";
    var accountID = ''
    $(async () => {
        var serviceURL =
            "http://54.169.136.72:5001/getCustomerAID/" + username;
        // to make the post + lmk ill send code 
        try {
            const response =
                await fetch(serviceURL, {
                    method: 'GET'
                });
            const data = await response.json();
            console.log(data.accountID)
            //console.log(data['0'].amount
            
            document.getElementById("accountID").value = accountID;

        } catch (error) {
            //  showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }
    });
    </script>

</body>

</html>
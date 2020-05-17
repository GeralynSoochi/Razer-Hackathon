<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Schedule</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
</head>

<body>

    <?php
     session_start();
        $username= '';
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            }else{
            }

    ?>

    <div class="wrapper">   
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>FAT</h3>
            </div>

            <ul class="list-unstyled components">
                <p><?=$_SESSION['username'];?></p>
                <li>
                    <a href="profile.php">Profile</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Games</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="gameboss.php">Region Wars</a>
                        </li>
                        <li>
                            <a href=#>Mini Boss Schedule</a>
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
                            <a href="vounchers.php">Vouchers</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="transactions.php">Wallet</a>
                </li>
                <li>
                    <img src="img/exit.png" class="logout-image">
                    <a class="logout-text" href="./logout.php">Logout</a>
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
            <img src="img/hunter.png" class="header-image">
            <p class="header-text">Mini Boss Schedule</p>

            <div class="line"></div>

    <script>
    var username = "<?php echo $username; ?>";
    var accountID = ''
    </script>

        <div id='bosschallenge'>

         <!-- The Grid -->
         <div class="w3-row">


        <div class="w3-col m6 w3-padding">

        <div class="w3-card w3-round w3-green">
        <div class="w3-container w3-padding" id='mon'><h4>Monday:</h4>
        </div><br/>
        </div><br>

        <div class="w3-card w3-round w3-orange">
        <div class="w3-container w3-padding" id='tue'><h4>Tuesday:</h4>
        </div><br/>
        </div><br>

        <div class="w3-card w3-round w3-indigo">
        <div class="w3-container w3-padding" id='wed'><h4>Wednesday:</h4>
        </div><br/>
        </div><br>

        </div>

        <div class="w3-col m6 w3-padding">

        <div class="w3-card w3-round w3-blue">
        <div class="w3-container w3-padding" id='thu'><h4>Thursday:</h4>
        </div><br/>
        </div><br>

        <div class="w3-card w3-round w3-yellow">
        <div class="w3-container w3-padding" id='fri'><h4>Friday:</h4>
        </div><br/>
        </div><br>
                    
        <div class="w3-card w3-round w3-red">
        <div class="w3-container w3-padding" id='sat'><h4>Saturday:</h4>
        </div><br/>
        </div><br>

        </div>

                    
        </div>
        </div><br/>
        <div id='bossdates'>


                    

        </div>
    <script>
    // user username 
    // get postalcode -> user region
    var region = '';
    var postalcode = '';
    var spawnDate = '';
    var Bossname = ''
    var BossType =''

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
            console.log(data)
            accountID = data.accountID
            region = data.region
            postalcode = data.postalcode
            //console.log(data['0'].amount

        } catch (error) {
            //  showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }
        // get region spawn date 
        console.log(postalcode)


        var serviceURL = "http://54.169.136.72:5004/getCustRegion/" + postalcode
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            region = data['RegionName']

        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }

        // get mini boss date + questions
        console.log(region)

        var serviceURL = "http://54.169.136.72:5004/getSpawnDate/" + region
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            spawnDate = data['spawnDate']

        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }

        // base on mini boss the questions 
        var serviceURL = "http://54.169.136.72:5009/getMiniBoss"
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            Bossname = data['bossName']
            BossType = data['bossType']

        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }

        // maybe boss type can be a more reative name next time 
        var challenge = `<div class="w3-card">
                                            <h2>${Bossname}
                                            </h2>
                                            </div>`


        $("#bosschallenge").append(challenge)


        console.log(spawnDate) // array 
        spawnDate = spawnDate.split(',');
        

        for(var i = 0 ; i < spawnDate.length; i++ ){

            var happen = "";
            console.log(spawnDate[i])
            switch(spawnDate[i]){


            case '0': happen +="#mon"
                break;
            
            case '1': happen += "#tue"
                break;
            
            case '2': happen += "#wed"
                break;
            
            case '3': happen += "#thu"
                break;
            
            case '4': happen += "#fri"
                break;
            
            case '5': happen += "#sat"
                break;
            
            default: 

            }

            
        var icon ="<div class='schedule'><img src='img/evil.png' width='42' height='42'><p style='color:white'>Mini Boss Alert</p></div>";

        $(happen).append(icon)


        }
        //
       // $("#bossdates").append(happen)



    });
    </script>


</div>
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

</body>

</html>
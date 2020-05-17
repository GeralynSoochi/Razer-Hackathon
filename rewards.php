<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Rewards</title>

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
            $username= '';
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
            }else{

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
                            <a href="index.php">Region Wars</a>
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
                            <a href=#>Rewards</a>
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
                <img src="img/exit.png" class="logout-image">
                    <a class="logout-text" href="#">Logout</a>
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

            <img src="img/trophy.png" class="header-image">
            <p class="header-text">Rewards</p>

            <div class="line"></div>


    <!-- retrieve redeemable rewards -->

    <div id='rewardcontainer'>
    
    
    
    </div>
    
    <script>
    var username = "<?php echo $username; ?>";
    var accountID = ''
    </script>

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


    <script>
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
            accountID = data.accountID
            //console.log(data['0'].amount

        } catch (error) {
            //  showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }
        var serviceURL = "http://54.169.136.72:5022/retrieveRedeemableRewards/" + accountID
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            if(data.length > 0){
                for(x in data){
                var rewardAva  = data[x]

                var printrow1 = `<div><b>${rewardAva.item}<b>
                            <input type='hidden' id='rewardID' value='${rewardAva.rewardID}'/>
                            <input type='hidden' id='points' value='${rewardAva.rewardValue}'/>
                            <button id='buttonredeem' onclick='buttonreddem()'>Redeem</button>
                            </div>`
            $("#rewardcontainer").append(printrow1)
            

            }
        
            }else{

                var printrow1 = `<div><p>No rewards earned! Participate in some Boss fights and mini challenges!</p>
                            </div>`
            $("#rewardcontainer").append(printrow1)

            }

           
  

            }


        catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }
    });
    // call based on the accountID 
    </script>
    <!-- redeem rewards button ss -->
    <script>
          
         async function buttonreddem(event){
        var rewardID = $('#rewardID').val();
        var points = $('#points').val();
        console.log("press")

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
            accountID = data.accountID
            //console.log(data['0'].amount
            


        } catch (error) {
            //  showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }


        var serviceURL2 = "http://54.169.136.72:5022/redeemRewards/" + accountID + "/" + rewardID + "/" + points;
        try {
            const response = await fetch(serviceURL2, {
                method: 'PUT',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)

            if(data){
                //refresh page 
                var loc = window.location.pathname;
                var dir = loc.substring(0, loc.lastIndexOf('/'));
                // change to ip
                window.location.href = "http://54.169.136.72" + dir + "/rewards.php";
                    
            }

        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }





        

    };




    </script>

</div>
</body>

</html>
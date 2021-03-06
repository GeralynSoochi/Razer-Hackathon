<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Profile</title>
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylequiz.css"/>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <!--JQUERY LIBRARY-->
    
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
            header("Location: login.php");
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
                    <a href=#>Profile</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Games</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="gameboss.php">Region Wars</a>
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
                            <a href="vouchers.php">Vouchers</a>
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
            
            <br>
            <img src="img/man.png" class="header-image">
            <p class="header-text">My Profile</p>
        
            <div class="line"></div>

            <body>  

                <div class="container" id="main-container">
                    <!-- <ul class="list-unstyled components">
                        <p>Joseph Lee</p>
                        <li>
                            <a href="profile.html">Profile</a>
                        </li>
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href=#>Region Wars</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="transactions.php">Transactions</a>
                        </li>
                        <li>
                            <a href="#">How do I battle?</a>
                        </li>
                    </ul> -->
                    
                    <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">Username</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Postal Code</th>
                            <th scope="col">Account ID</th>
                            <th scope="col">Points</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td id="user">Username</td>
                            <td id="first">firstName</td>
                            <td id="last">lastName</td>
                            <td id="postal">Postal</td>
                            <td id="accid">AccID</td>
                            <td id="points">Points</td>
                          </tr>
                        </tbody>
                      </table>

                    <h4>Current Accounts</h4>
                    <table class="table table-bordered" id="accsTable">
                        
                    </table>

                </div>

              </body>

            
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        if (!sessionStorage['username']){
			window.location.href = "http://54.169.136.72/app/login.php";
		} else {
            var username = sessionStorage['username']
        }
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        function showError(message) {
            // Hide the table and button in the event of error
            $('#accsTable').hide();
    
            // Display an error under the main container
            $('#main-container')
                .append("<label>"+message+"</label>");
        }
        $(async() => {
            var serviceURL = "http://54.169.136.72:5001/getCustomer/" + username;

            try {
                const response =
                await fetch(
                    serviceURL, { method: 'GET'}
                );
                const data = await response.json();
                // array or array.length are falsy
                if (!data) {
                    showError('Error retrieving your data.')
                } else {
                    accid = data.encodedKey
                    $('#user').text(username)
                    $('#points').text(data.points)
                    $('#accid').text(accid)
                    $('#postal').text(data.postalcode)
                }
            } catch (error) {
                // Errors when calling the service; such as network error, 
                // service offline, etc
                showError
                  ('There is a problem retrieving data, please try again later.<br />'+error);
               
            } 
            var serviceURL = "http://54.169.136.72:5015/getDetails/"+ accid;
            
            try {
                const response =
                await fetch(
                    serviceURL, { method: 'GET'}
                );
                const data = await response.json();
                if (data["returnCode"]) {
                    showError('Error retrieving your data.')
                } else {
                    $('#first').text(data["firstName"])
                    $('#last').text(data["lastName"])
                }
            } catch (error) {
                // Errors when calling the service; such as network error, 
                // service offline, etc
                showError
                  ('There is a problem retrieving data, please try again later.<br />'+error);
               
            } 
            
            var serviceURL = "http://54.169.136.72:5015/currentacc/getUser/" + accid; 
    
            try {
                const response =
                await fetch(
                    serviceURL, { method: 'GET'}
                );
                const data = await response.json();
                // array or array.length are falsy
                if (data["returnCode"]) {
                    showError('Error retrieving current accounts.')
                } else {
                    $('#accsTable').text("");
                    var theads = "<thead> <tr>  <th scope='col'>#</th> <th scope='col'>Acc ID</th> <th scope='col'>Balance</th> </tr> </thead>";
                    $('#accsTable').append(theads);
                    var rows = "";
                    var count = 0
                    for (const acc of data) {
                        count += 1
                        eachRow =
                            "<td>" + count + "</td>" +
                            "<td>" + acc["id"] + "</td>" +
                            "<td>" + acc["balance"] + "</td>";
                        rows += "<tbody><tr>" + eachRow + "</tr></tbody>";
                    }
                    // add all the rows to the table
                    $('#accsTable').append(rows);
                }
            } catch (error) {
                // Errors when calling the service; such as network error, 
                // service offline, etc
                showError
                  ('There is a problem retrieving data, please try again later.<br />'+error);
               
            } // error
        });
    </script>
</body>

</html>
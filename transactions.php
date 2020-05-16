<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Region Wars</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
  

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--JQUERY LIBRARY-->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>FAT</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Joseph Lee</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="index.html">Region Wars</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href=#>Transactions</a>
                </li>
                <li>
                    <a href="#">How do I battle?</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
            </nav>

            <h2>Transactions</h2>

            <div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    
                <!-- The Grid -->
                <div class="w3-row">
                  <!-- Left Column -->
                  <div class="w3-col m4">
              
                    <!--  --> 
                    <div class="w3-card w3-round w3-white">
                      <div class="w3-container w3-padding">
                       <h5></h5>
              
                       
              
                        <br><br>
              
                        <div id='TransContainer' class="w3-responsive">
                        <table class="w3-table-all">
                        <tr id=''>
                              <!-- <th><h6>Code</h6></th>
                        <th><h6>Title</h6></th>
                        <th><h6>Section</h6></th>
                        </tr> -->

                            <script>    
                            function dateExtractor(fullDate){
                                var datefull = new Date(fullDate);
                                return datefull
                            }

                            // you need to code outside of this container
                            


                                $(async() => {
                                    var serviceURL = "http://localhost:5044/getUserTransaction/WMMF954";
                                  
                                    try {
                                        const response =
                                            await fetch(serviceURL, { method: 'GET' });
                                        const data = await response.json();
                                        console.log(data)
                                        console.log(data['0'].amount)

                                        // GTM + 8 adds to 00 gtm
                                        var hrs = -(new Date().getTimezoneOffset() / 60)
                                        console.log(hrs)


                                        for(i in data){
                                            transaction = data[i];
                                            // convert bookingDate to time 
                                            fullDate = dateExtractor(transaction.bookingDate)

                                            var panel = `<div 
                                            class="w3-panel w3-hover-shadow w3-blue w3-card-4">
                                                                <p style="color:black;"><br/>
                                            TransactionID: ${transaction.transactionId}<br/>
                                            Date/Time: ${fullDate.toLocaleString('en-US', { timeZone: 'Asia/Singapore' })}<br/>
                                            Amount: ${transaction.amount}<br/>
                                            Comment: ${transaction.comment}<br/>
                                            </p>
                                            </div>`
                                            $("#TransContainer").append(panel)
                                        
                                        }


                                    } catch (error) {
                                        showError
                                            ('There is a problem retrieving books data, please try again later.<br />' + error);
                                    }
                                });
                                </script>



                        </table>
                        </div>
              
                      </div>
                    </div>
                    <br>
               
                  <!-- End Left Column -->
                  </div>
                  
                  <!-- Right Column -->
                  <div class="w3-col m8">
                  
                    <div class="w3-row-padding">
              
                      <div class="w3-col m12">
                      <!-- Savings -->
                        <div class="w3-card w3-round w3-white">
                          <div class="w3-container w3-padding">
                          <h5>Savings</h5>
                          <form method="POST" action="transactions.php">
                            <fieldset data-role="controlgroup" data-mini="true" data-type="horizontal">
                            <div data-role = "fieldcontain">
              
                            <label id="balanceContainer"></label>
                            <script>    
                            function deleteChild(id) { 
                                var e = document.getElementById(id); 
                                e.innerHTML = ""; 
                            }

                            deleteChild("balanceContainers")

                            // retrieve particular info 
                                $(async() => {
                                    var serviceURL = "http://localhost:5044/getOverallSavingAccount/WMMF954"; 
                                    // to make the post + lmk ill send code 
                                    try {
                                        const response =
                                        await fetch(serviceURL, { method: 'GET' });
                                        const data = await response.json();
                                        console.log(data)
                                        //console.log(data['0'].amount)
                                          var printrow1 = "<h6>Your Account Balance : <b>"+ data.balance +"</b> </h6>"
                                        $("#balanceContainer").append(printrow1)
                                    

                                    } catch (error) {
                                        showError
                                            ('There is a problem retrieving books data, please try again later.<br />' + error);
                                    }
                                });
                                </script>
              
              
                            
                            </div>
                            
                            <br>
                            <div>
                            <input type='text' name='DepositAmount'>
                            <button name="deposit" value="Deposit" class="w3-button rounded-pill">Deposit</button> 
                            </div>
                            <div>
                            <input type='text' name='WithdrawAmount'>
                            <button name="withdrawBtn" value="Withdraw"class="w3-button rounded-pill">Withdraw</button>
                            </div>

                            <div><textarea name='comments' rows='5' cols='10'></textarea></div>

                            </form>
              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              
                  <!-- End Right Column -->
                  </div>
                
                <!-- End Grid -->
                </div>
                
              <!-- End Page Container -->
              </div>

            </div>
    </div>

    <!--Process transaction submit data to mambu redirect user with the success msg -->
                                
 
    <script>    
        $('#withdrawBtn').click(async(event) => {

            console.log("Retrieve Payment info");
            // get the username and password
            /*
                {
                    "amount": 200,
                    "notes": "Deposit into savings account",
                    "type": "DEPOSIT",
                    "method": "bank",
                    "customInformation": [
                        {
                            "value": "unique identifier for receipt",
                            "customFieldID": "IDENTIFIER_TRANSACTION_CHANNEL_I"
                        }
                    ]
                }
            */

            var password = $('#WithdrawAmount').val();
            var notes = $('#notes').val();
            // not sure if bank need var bank = $('#bank').val();
            
            // hashing is here 


            var requestBody = {
                    "amount": 200,
                    "notes": "Deposit into savings account",
                    "type": "DEPOSIT",
                    "method": "bank",
                    "customInformation": [
                        {
                            "value": "unique identifier for receipt",
                            "customFieldID": "IDENTIFIER_TRANSACTION_CHANNEL_I"
                        }
                    ]
                }


            var serviceURL = "http://13.250.108.137:8000/customer/auser/" + username;
                    
            var requestParam = {
                headers: {  "Content-Type": "application/json" },
                method: 'POST',
                mode: 'cors',
                body: JSON.stringify(requestBody)
            }

            var authenticated = "False";
            try {
                const response = await fetch(serviceURL, requestParam);
                data = await response.json();
                console.log(data['message'])
                authenticated = data['message'];
            } catch (error) {
            console.error(error);
            }

            if(authenticated == "True"){
                //save username is javascript session
                sessionStorage.setItem("username",username)
                // console.log(sessionStorage.getItem("username"))
                var loc =  window.location.pathname;
                var dir = loc.substring(0, loc.lastIndexOf('/'));

                window.location.href = "http://54.169.99.219"+ dir + "/indexlogin.html?user=" + username;
                    
            }else{
                showError(authenticated)
            }


         });
     // retrieve particular info 
             $(async () => {
                var serviceURL = "http://localhost:5044/getOverallSavingAccount/WMMF954";
                                    // to make the post + lmk ill send code 
                    try {
                        const response =
                        await fetch(serviceURL, {
                        method: 'GET'
                        });
                    const data = await response.json();
                    console.log(data)
                                        //console.log(data['0'].amount)
                    var printrow1 = "<h6>Your Account Balance : <b>" + data.balance + "</b> </h6>"
                    $("#balanceContainer").append(printrow1)


                    } catch (error) {
                        showError
                        ('There is a problem retrieving books data, please try again later.<br />' + error);
                     }
                    });
    
    </script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
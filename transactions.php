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


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <!--JQUERY LIBRARY-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
            </nav>

            <h2>Transactions Wallet</h2>

            <div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    

                <!-- The Grid -->
                <div class="w3-row">
                  <!-- Left Column -->
                  <div class="w3-col m6">
              
                    <!--  --> 
                    <div class="w3-card w3-round w3-white">
                      <div class="w3-container w3-padding">
                       <h5>Inflow & Outflow</h5>
              
                        <br>

                        <table class="w3-table w3-bordered">

                        
                        <tbody id="TransContainer" style="display: block; height: 800px; overflow-y: scroll">
      
                        </tbody>
		
                        
                        </table>
                        <br>
                        
                      </div>
                    </div>
                    <br>
               
                  <!-- End Left Column -->
                  </div>
                  
                  <!-- Right Column -->
                  <div class="w3-col m4">
                  
                    <div class="w3-row-padding">
              
                      <div class="w3-col m12">
                      <!-- Savings -->
                        <div class="w3-card w3-round w3-white">
                          <div class="w3-container w3-padding">
                          <h5>Savings</h5>
                            <fieldset data-role="controlgroup" data-mini="true" data-type="horizontal">
                            <div data-role = "fieldcontain">
              
                            <label id="balanceContainer"></label>
                            <script>    

                            // retrieve particular info 
                                $(async() => {
                                    var serviceURL = "http://localhost:5044/getOverallSavingAccount/" + accountID; 
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
                                      //  showError
                                           // ('There is a problem retrieving books data, please try again later.<br />' + error)
                                    }
                                });
                                </script>
              
                             <script>    

                            // retrieve particular info 
                                $(async() => {
                                    var serviceURL = "http://localhost:5001/getPoints/" + accountID; 
                                    // to make the post + lmk ill send code 
                                    try {
                                        const response =
                                        await fetch(serviceURL, { method: 'GET' });
                                        const data = await response.json();
                                        console.log(data)
                                        //console.log(data['0'].amount)
                                        var printrow1 = "<h6>Your Points Balance : <b>"+ data.points +"</b> </h6>"
                                        $("#balanceContainer").append(printrow1)
                                    
                                        
                                    } catch (error) {
                                      //  showError
                                           // ('There is a problem retrieving books data, please try again later.<br />' + error)
                                    }
                                });
                                </script>
                            
                            </div>
                            
                            <br>
                            <div>
                            <select id='type'>
                                <option value='Transfer'>Transfer</option>
                                <option value='Deposit'>Deposit</option>
                            </select>
                            </div>
                            <div>
                            <input type='text' id='Amount' name='DepositAmount' placeholder='DepositAmount'>
                            </div>
                            <div>
                            <input type='text' id='accountno' name='accountno' placeholder='Transfer Account Here'>
                            <button id="TransactionBtn" value="Transfer" class="w3-button rounded-pill">Deposit</button>
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
                                        <fieldset data-role="controlgroup" data-mini="true" data-type="horizontal">
                                            <div data-role="fieldcontain">

                                                <label id="balanceContainer"></label>
                                                <script>

                                                </script>


                                                <script>
                                                var username = "<?php echo $username; ?>";
                                                var accountID = ''
                                                $(async () => {

                                                });



                                                // retrieve particular info
                                                $(async () => {
                                                    var serviceURL =
                                                        "http://localhost:5001/getCustomerAID/" + username;
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
                                                    var serviceURL =
                                                        "http://localhost:5044/getOverallSavingAccount/" +
                                                        accountID;
                                                    // to make the post + lmk ill send code 
                                                    try {
                                                        const response =
                                                            await fetch(serviceURL, {
                                                                method: 'GET'
                                                            });
                                                        const data = await response.json();
                                                        console.log(data)
                                                        //console.log(data['0'].amount)
                                                        var printrow1 = "<h6>Your Account Balance : <b>" +
                                                            data.balance + "</b> </h6>"
                                                        $("#balanceContainer").append(printrow1)


                                                    } catch (error) {
                                                        //  showError
                                                        // ('There is a problem retrieving books data, please try again later.<br />' + error)
                                                    }
                                                });
                                                </script>

                                                <script>
                                                // retrieve particular info 
                                                $(async () => {
                                                    var serviceURL =
                                                        "http://localhost:5001/getCustomerAID/" + username;
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
                                                    var serviceURL = "http://localhost:5001/getPoints/" +
                                                        accountID;
                                                    // to make the post + lmk ill send code 
                                                    try {
                                                        const response =
                                                            await fetch(serviceURL, {
                                                                method: 'GET'
                                                            });
                                                        const data = await response.json();
                                                        console.log(data)
                                                        //console.log(data['0'].amount)
                                                        var printrow1 = "<h6>Your Points Balance : <b>" +
                                                            data.points + "</b> </h6>"
                                                        $("#balanceContainer").append(printrow1)


                                                    } catch (error) {
                                                        //  showError
                                                        // ('There is a problem retrieving books data, please try again later.<br />' + error)
                                                    }
                                                });
                                                </script>

                                            </div>

                                            <br>
                                            <div>
                                                <select id='type'>
                                                    <option value='Transfer'>Transfer</option>
                                                    <option value='Deposit'>Deposit</option>
                                                </select>
                                            </div>
                                            <div>
                                                <input type='text' id='Amount' name='DepositAmount'>
                                            </div>
                                            <div>
                                                <input type='text' id='accountno' name='accountno'
                                                    placeholder='Transfer Account Here'>
                                                <button id="TransactionBtn" value="Transfer"
                                                    class="w3-button rounded-pill">OKay</button>
                                            </div>
                                            <div><textarea id='notes' name='comments' rows='5' cols='10'></textarea>
                                            </div>

                                            <div id='informationcard'>


                                            </div>

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

    <script>
    var alltrans = []
    var alldepo = []

    // this month and last day of month 
    var todayd = new Date();
    var todaym = todayd.getMonth() + 1;
    var lastday = new Date(todayd.getFullYear(), todayd.getMonth() + 1, 0).toString()

    console.log(lastday)

    function dateExtractor(fullDate) {
        var datefull = new Date(fullDate);
        return datefull
    }
    async function updatepoints(accountID, points) {
        var serviceURL =
            "http://localhost:5001/getCustomerAID/" + username;
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
        var serviceURL = "http://localhost:5001/addPoints/" + accountID + "/" + points
        try {
            const response = await fetch(serviceURL, {
                method: 'PUT'
            });
            const data = await response.json();
            console.log(data)
            if (date) {
                return TRUE
            } else {
                return FALSE
            }
        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }
    }




    $(async () => {
        var serviceURL =
            "http://localhost:5001/getCustomerAID/" + username;
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
        var serviceURL = "http://localhost:5044/getUserTransaction/" + accountID;



        try {
            const response =
                await fetch(serviceURL, {
                    method: 'GET'
                });
            const data = await response.json();
            console.log(data)
            console.log(data['0'].amount)

            // GTM + 8 adds to 00 gtm
            var hrs = -(new Date().getTimezoneOffset() / 60)
            console.log(hrs)
            for (i in data) {
                transaction = data[i];
                // convert bookingDate to time 
                fullDate = dateExtractor(transaction.bookingDate)
                positivetransfer = 0
                //positive the values 
                if (transaction.amount < 0) {
                    positivetransfer = 1
                }

                // if the data is this month = add to this counter 
                var transm = fullDate.getMonth() + 1
                if (transm == todaym) {

                    if (transaction.type == 'TRANSFER') {
                        alltrans.push(transaction.amount)
                    } else {
                        alldepo.push(transaction.amount)
                    }

                }

                if (positivetransfer == 1) {
                    var panel = `<div 
                                class="w3-panel w3-hover-shadow w3-blue w3-card-4">
                                <p style="color:black;"><br/>
                                TransactionID: ${transaction.transactionId}<br/>
                                Date/Time: ${fullDate.toLocaleString('en-US', { timeZone: 'Asia/Singapore' })}<br/>
                                Amount: <b style='color:red;'> ${transaction.amount * -1}</b><br/>
                                Comment: ${transaction.comment}<br/>
                                </p>
                                </div>`
                    $("#TransContainer").append(panel)
                } else {
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



            }


            console.log(lastday)
            var sumdepo = 0
            var sumtrans = 0
            for (x in alldepo) {
                sumdepo += parseInt(alldepo[x], 10)
            }
            for (x in alltrans) {
                sumtrans += parseInt(alltrans[x], 10)
            }
            sumtrans = sumtrans * -1

            var panelDepo = `<div class="w3-card">
                                            <p>
                                            ${sumdepo}
                                            </p>
                                            </div>`

            var paneltrans = `<div class="w3-card">
                                            <p
                                            ${sumtrans}
                                            </p>
                                            </div>`


            $("#informationcard").append(panelDepo)

            $("#informationcard").append(paneltrans)

            if (lastday == todayd) {
                saveamt = sumdepo - sumtrans
                if (saveamt >= 50) {
                    // call the async function
                    var updated = updatepoints(accountID, 200)
                    if (updated == TRUE) {
                        var loc = window.location.pathname;
                        var dir = loc.substring(0, loc.lastIndexOf('/'));
                        // change to ip
                        window.location.href = "http://localhost" + dir + "/transactions.php";
                    }
                    // refresh page 

                }
            }

        } catch (error) {
            // showError
            //('There is a problem retrieving books data, please try again later.<br />' + error);
        }
    });
    </script>
    <!--Process transaction submit data to mambu redirect user with the success msg -->


    <script>
    $('#TransactionBtn').click(async (event) => {

        //options value 

        var transType = $('#type').val();

        console.log(transType)

        if (transType == 'Deposit') {
            var amount = $('#Amount').val();
            var notes = $('#notes').val();
            var requestBody = {
                "amount": amount,
                "notes": notes,
                "type": "DEPOSIT",
                "method": "bank",
                "customInformation": [{
                    "value": "unique identifier for receipt",
                    "customFieldID": "IDENTIFIER_TRANSACTION_CHANNEL_I"
                }]
            }
        } else {
            var amount = $('#Amount').val();
            var Toaccount = $('#accountno').val();
            var notes = $('#notes').val();
            // not sure if bank need var bank = $('#bank').val();
            // hashing is here 

            // if amount is number then pass && client ID is different then pass  
            var requestBody = {
                "type": "TRANSFER",
                "amount": amount,
                "notes": notes,
                "toSavingsAccount": Toaccount,
                "method": "bank"
            }

        }


        var serviceURL =
            "http://localhost:5001/getCustomerAID/" + username;
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

        var serviceURL = "http://localhost:5044/createNewTransaction/" + accountID;

        var requestParam = {
            headers: {
                "Content-Type": "application/json"
            },
            method: 'POST',
            mode: 'cors',
            body: JSON.stringify(requestBody)
        }

        var authenticated = "False";

        try {
            const response = await fetch(serviceURL, requestParam);
            data = await response.json();
            console.log(data)
            authenticated = data;
        } catch (error) {
            console.error(error);
        }

        if (authenticated == "True") {
            //save username is javascript session
            // console.log(sessionStorage.getItem("username"))
            var loc = window.location.pathname;
            var dir = loc.substring(0, loc.lastIndexOf('/'));
            // change to ip
            // window.location.href = "http://localhost"+ dir + "/transactions.php";

        } else {
            //  showError(authenticated)
        }

    });


    // update the eligibility her
    // get the last day of the month 
    </script>

    <script>

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
</body>

</html>
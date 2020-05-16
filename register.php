<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    
    <div class="limiter">
		<div class="container-login100 custom-box">
			<div class="wrap-login100 p-t-85 p-b-20 custom-box">
				<form class="login100-form validate-form">
					<span style='color: #6d7fcc' id="crowd">
						FAT
					</span> 
                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input id="username" class="input100" type="text" name="username" placeholder="Username" />
                        <!--<span class="focus-input100" data-placeholder="Username"></span> -->
                        <!-- <input type="text"  id="username"> -->
					</div>
        

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input id="password" class="input100" type="password" name="pass"  placeholder="Password"  />
                        <!--<span class="focus-input100" data-placeholder="Password"></span> -->
                        <!-- <input type="password" id="password"> -->
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-50">
						<input id="firstname" class="input100" type="text" name="pass"  placeholder="Firstname"  />
                        <!--<span class="focus-input100" data-placeholder="Password"></span> -->
                        <!-- <input type="text" id="firstname"> -->
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-50">
						<input id="lastname" class="input100" type="text" name="pass"  placeholder="Lastname"  />
                        <!--<span class="focus-input100" data-placeholder="Password"></span> -->
                        <!-- <input type="text" id="lastname"> -->
                    </div>
                
                    
                    <div class="wrap-input100 validate-input m-b-50">
						<input id="validUntil" class="input100" type="text" name="pass"  placeholder="validUntil"  />
                        <!--<span class="focus-input100" data-placeholder="Password"></span> -->
                        <!-- <input type="text" id="validUntil"> -->
                    </div>

                    <div class="wrap-input100 validate-input m-b-50">
						<input id="documentId" class="input100" type="text" name="pass"  placeholder="documentId"  />
                        <!--<span class="focus-input100" data-placeholder="Password"></span> -->
                        <!-- <input type="text" id="documentId"> -->
                    </div>

                    <div class="wrap-input100 validate-input m-b-50">
						<input id="postalCode" class="input100" type="text" name="pass"  placeholder="postalCode"  />
                        <!--<span class="focus-input100" data-placeholder="Password"></span> -->
                        <!-- <input type="text" id="postalCode"> -->
                    </div>

                    <div   class="container-login100-form-btn">
						<button id="submissionBtn" style='background-color: #6d7fcc' type='button' class="login100-form-btn">
                        Register
						</button>
					</div>

        </form>
		</div>
	</div>
</div>

    <script>    
       
     $('#submissionBtn').click(async(event) => {

        //options value 
        
        var username = $('#username').val();
        
        var password = $('#password').val();
        
        var firstName = $('#firstname').val();
        
        var lastName = $('#lastname').val();
        
        var assignedBranchKey = $('#assignedBranchKey').val();
        
        var validUntil = $('#validUntil').val();
        
        
        var documentId = $('#documentId').val();

        var postalCode = $('#postalCode').val();


            var requestBody = {
                        "username" : username,
                        "password" : password,
                        "firstName": firstName,
                            "lastName": lastName,
                            "validUntil": validUntil,
                            "documentId" :documentId,
                            "postalCode" : postalCode
                        }
     
        
            
            var serviceURL = "http://54.169.136.72:5015/registration";
                    
            var requestParam = {
                headers: {  "Content-Type": "application/json" },
                method: 'POST',
                mode: 'cors',
                body: JSON.stringify(requestBody)
            }

            var registered = "False";
            console.log("registered")


            try {
                const response = await fetch(serviceURL, requestParam);
                data = await response.json();
                console.log(data)
                registered = data;



            } catch (error) {
            console.error(error);
            }

            if(registered == "True"){
                //save username is javascript session
                // console.log(sessionStorage.getItem("username"))
                var loc =  window.location.pathname;
                var dir = loc.substring(0, loc.lastIndexOf('/'));
                // change to ip
                window.location.href = "http://54.169.136.72"+ dir + "/login.php?msg=success";
                    
            }else{
              //  showError(authenticated)
            }

         });
 
    
         // update the eligibility her
         // get the last day of the month 
    
    </script>

</body>
</html>
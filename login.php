<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>

<script>
      var getParams = function (url) {
      var params = {};
      var parser = document.createElement('a');
      parser.href = url;
      var query = parser.search.substring(1);
      var vars = query.split('&');
      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
      }
      return params;
    };
	// info of url x : y
    var data = getParams(window.location.href);
	
	// y
    console.log(data.message);

	//var product = data.productcat;
    //$('#name').append(data.productcat);



		console.log("Press");
			window.addEventListener( "pageshow", function ( event ) {
			var historyTraversal = event.persisted || 
									( typeof window.performance != "undefined" && 
										window.performance.navigation.type === 2 );
			if ( historyTraversal ) {
				// Handle page restore.
				window.location.reload();
			}
			});
</script>
 
<body>



	<div class="limiter">
		<div class="container-login100 custom-box">
			<div class="wrap-login100 p-t-85 p-b-20 custom-box">
				<form class="login100-form validate-form">
					<span style='color:#6d7fcc' id="crowd">
						FAT
					</span> 
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input id="username" class="input100" type="text" name="username" placeholder="Username" />
						<!--<span class="focus-input100" data-placeholder="Username"></span> -->
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input id="password" class="input100" type="password" name="pass"  placeholder="Password"  />
						<!--<span class="focus-input100" data-placeholder="Password"></span> -->
					</div>

					<div   class="container-login100-form-btn">
						<button id="loginBtn" style='background-color:#6d7fcc' type='button' class="login100-form-btn">
							Login
						</button>
					</div>


					<ul id="Errors" style="margin-top:50px;" class="login-more">


					</ul>

					<ul style="margin-top:50px;">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="./register.php" class="txt2">
								Sign up
							</a>
						</li>
					</ul>




				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>


	<script>

				$(document).ready(function(){
				})



			function showError(message) {
                // Display an error under the main container
				console.log('i am in ');
				$('#Errors').empty();
                $('#Errors')
                    .append("<li style='color:red;'>" + message + "</li>");
            }
			
			function showSuccess(message) {
                // Display an error under the main container
				console.log('i am in ');
				$('#Errors').empty();
                $('#Errors')
                    .append("<li style='color:green;'>" + message + "</li>");
            }
			if (data.message || data.message) {
			showSuccess(data.message);}
		 $('#loginBtn').click(async(event) => {

				console.log("Hashed Password");
				// get the username and password
                var password = $('#password').val();
                var username = $('#username').val();


                var requestBody = {
                    "password": password
                };


				var serviceURL = "http://54.169.136.72:5001/authC/" + username;
                          
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

					window.location.href = "http://localhost/"+ dir + "/index.php?username=" + username;
						
						
				}else{
					showError(authenticated)
				}


            });



	
	
	</script>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



</body>
</html>
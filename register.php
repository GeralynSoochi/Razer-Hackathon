<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    

        <input type="text"  id="username">

        <input type="password" id="password">
        
        <input type="text" id="firstname">
        
        <input type="text" id="lastname">
        
        <input type="text" id="assignedBranchKey">
        
        <input type="text" id="validUntil">
        
        <input type="text" id="documentId">
        
        <input type="text" id="postalCode">

        <button id='submissionBtn'>Register</button>
    

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
                            "assignedBranchKey": '',
                            "validUntil": validUntil,
                            "documentId" :documentId,
                            "postalCode" : postalCode
                        }
     
        
            
            var serviceURL = "http://localhost:5015/registration";
                    
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
                //window.location.href = "http://localhost"+ dir + "/login.php?msg=success";
                    
            }else{
              //  showError(authenticated)
            }

         });
 
    
         // update the eligibility her
         // get the last day of the month 
    
    </script>

</body>
</html>
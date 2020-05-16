<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewards</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- retrieve redeemable rewards -->

    <div id='rewardcontainer'>
    
    
    
    </div>
    <?php
            session_start();
            $username= '';
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
            }else{

            }

        ?>
    <script>
    var username = "<?php echo $username; ?>";
    var accountID = ''
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

                var printrow1 = `<div><p>Sorry Pal no rewards for you  kill some bosses man</p>
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


        var serviceURL2 = "http://54.169.136.72:5022/redeemRewards/" + accountID + "/" + rewardID + "/" + points
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

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewards</title>
</head>
    <body>
        <!-- retrieve redeemable rewards -->

        <script>
    

        <script>
        
        <script> 
            async function retrieveRewards(accountID) {
                
                    var serviceURL = "http://localhost:5022/retrieveRedeemableRewards/" + accountID
                    try {
                        const response = await fetch(serviceURL, { 
                            method: 'GET',
                            mode: 'cors'
                        });
                        const data = await response.json();
                        console.log(data)

                    } catch (error) {
                        //   showError
                        // ('There is a problem retrieving books data, please try again later.<br />' + error)
                    }
                }
           // call based on the accountID 

           
            retrieveRewards("VEXO341")

        
        </script> 

        <!-- redeem rewards -->
        <script> 
            async function redeemReward( accountID,rewardID, points ) {
                    var serviceURL2 = "http://localhost:5022/redeemRewards/" + accountID + "/" + rewardID + "/" + points
                    try {
                        const response = await fetch(serviceURL2, { 
                            method: 'PUT',
                            mode: 'cors'
                        });
                        const data = await response.json();
                        console.log(data)

                    } catch (error) {
                        //   showError
                        // ('There is a problem retrieving books data, please try again later.<br />' + error)
                    }
                }
            // call based on the accountID 
            redeemReward("VEXO341",1 , 1500)

        
        </script> 

    </body>
</html>
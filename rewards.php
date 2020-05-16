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
            async function retrieveRewards(accountID) {
                    var serviceURL = "http://localhost:5002/retrieveRedeemableRewards/" + accountID
                    console.log (serviceURL);
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
            retrieveRewards("VEXO341")
        
        </script> 

    </body>
</html>
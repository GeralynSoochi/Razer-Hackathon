<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

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

    <div>


    </div>

    <script>
    // user username 
    // get postalcode -> user region
    var region = '';
    var postalcode = '';

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
            console.log(data)
            accountID = data.accountID
            region = data.region
            postalcode = data.postalcode
            //console.log(data['0'].amount

        } catch (error) {
            //  showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }


        // get region spawn date 
        console.log(postalcode)
        var serviceURL = "http://localhost:5004/getCustRegion/" + postalcode
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            if (data.length > 0) {
                for (x in data) {
                    region = data[x]
                    region = data[x].RegionName
                }

            
                console.log(region)

            } else {

                var printrow1 = `<div><p>Sorry Pal no rewards for you  kill some bosses man</p>
                            </div>`
                $("#rewardcontainer").append(printrow1)

            }




        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }

        // get mini boss questions




    });
    </script>




</body>

</html>
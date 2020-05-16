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

        <div id='bosschallenge'>


        </div>

        <div id='bossdates'>


        </div>

    <script>
    // user username 
    // get postalcode -> user region
    var region = '';
    var postalcode = '';
    var spawnDate = '';
    var Bossname = ''
    var BossType =''

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


        var serviceURL = "http://54.169.136.72:5004/getCustRegion/" + postalcode
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            region = data['RegionName']

        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }

        // get mini boss date + questions
        console.log(region)

        var serviceURL = "http://54.169.136.72:5004/getSpawnDate/" + region
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            spawnDate = data['spawnDate']

        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }

        // base on mini boss the questions 
        var serviceURL = "http://54.169.136.72:5009/getMiniBoss"
        try {
            const response = await fetch(serviceURL, {
                method: 'GET',
                mode: 'cors'
            });
            const data = await response.json();
            console.log(data)
            Bossname = data['bossName']
            BossType = data['bossType']

        } catch (error) {
            //   showError
            // ('There is a problem retrieving books data, please try again later.<br />' + error)
        }

        // maybe boss type can be a more reative name next time 
        var challenge = `<div class="w3-card">
                                            <h2>${Bossname}
                                            </h2>
                                            </div>`


        $("#bosschallenge").append(challenge)


        console.log(spawnDate) // array 
        spawnDate = spawnDate.split(',');
        var happen = "";

        for(var i = 0 ; i < spawnDate.length; i++ ){
            console.log(spawnDate[i])
            switch(spawnDate[i]){


            case '0': happen += "<p>BOSS is ON MONDAY</p>"
                break;
            
            case '1': happen += "<p>BOSS is ON TUESDAY</p>"
                break;
            
            case '2': happen += "<p>BOSS is ON WEDNESDAY</p>"
                break;
            
            case '3': happen += "<p>BOSS is ON THURSDAY</p>"
                break;
            
            case '4': happen += "<p>BOSS is ON FRIDAY</p>"
                break;
            
            case '5': happen += "<p>BOSS is ON SATURDAY</p>"
                break;
            
            default: 

            }



        }
        console.log("This is happen: "+happen)
        
        $("#bossdates").append(happen)



    });
    </script>




</body>

</html>
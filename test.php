<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
session_start();

?>
<script>    

var accountID = "<?php echo $_SESSION['accountID']; ?>";


// retrieve particular info 
    $(async() => {
        // Change serviceURL to your own
        var serviceURL = "http://54.169.136.72:5044/getUserTransaction/WMMF954";
        // var serviceURL = "http://54.169.136.72:5044/getOverallSavingAccount/WMMF954"; - to view overall saving acc
        // to make the post + lmk ill send code 
        try {
            const response =
                await fetch(serviceURL, { method: 'GET' });
            const data = await response.json();
            console.log(data)
            console.log(data['0'].amount)

        } catch (error) {
            showError
                ('There is a problem retrieving books data, please try again later.<br />' + error);
        }
    });
    </script>


</body>
</html>
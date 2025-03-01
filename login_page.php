<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="example@.com">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="password">
        <input type="submit"  id="button" name='submit' ></button>
    </form> 
    <?php 
    

$serverName = "localhost";
$userName = "root";
$password = "";

// Connect to MySQL
$conn = mysqli_connect($serverName, $userName, $password);



// Create database if it doesn't exist
$createDatabase = "CREATE DATABASE IF NOT EXISTS info";
mysqli_query($conn, $createDatabase);

// Select the database
mysqli_select_db($conn, 'info' ) ;

// Create the `weather` table
$createTable = "CREATE TABLE IF NOT EXISTS info_table(
    user_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user_mail varchar(100) ,
    user_passkey varchar(255)
)";
mysqli_query($conn, $createTable);


// form Data READ
if(isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    // API to VERIFY THE MAIL
    $url='https://api.emailable.com/v1/verify?email='.$email.'&api_key=live_510bf881b48717e1a54d';
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    // CHECK mail
    if($data['state']=='deliverable'){
        $passkey=$_POST['password'];
        // $passkey = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Encrypt password
    $insertIntoTable="INSERT INTO info_table(user_mail,user_passkey)
    VALUE('$email','$passkey')
    ";
    mysqli_query($conn, $insertIntoTable);
    }
    //VERIFY na bahko mail
    else{
        echo('Email not Verified.Try again');
    }
   
}

    ?>
</body>
</html>

<?php
   //DB connection
   require('../../config/db_connection.php');
   //Get data from register form http://beta/api/src/backend/signup.php
function save_data_Supabase($email, $passwd) {
 $SUPABASE_URL = 'https://ctnerdreczfwnmbkicym.supabase.co';
 $SUPABASE_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImN0bmVyZHJlY3pmd25tYmtpY3ltIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzAzODg3MDMsImV4cCI6MjA0NTk2NDcwM30.pra096q5FFe_SOT4YSScS-brjAO6vD2SOpWsYv8qhag';
 $url = "$SUPABASE_URL/rest/v1/users";
 $data = [
    'email' => $email,
    'password' => $passwd,
 ];

 $options = [
    'http' => [
       'header' => [
       "content-Type: application/json",
       "Authorization: Bearer $SUPABASE_KEY",
       "apikey: $SUPABASE_KEY"
    ],
       'method' => 'POST',
       'content' => json_encode($data),
    ],   
 ];	

 $context = stream_context_create($options);
 $response = file_get_contents($url, true , $context);
 //$response_data = json_decode($response, true);

 if($response === false) {
    echo "Error: unable to save data supabase";
    exit;
 }

 echo "user has been created.";
}

//DB connection
require('../../config/db_connection.php');
//Get data from register form
$email = $_POST['email'];	
$pass = $_POST['passwd'];
//Encrypt password with md5 hashing algorithm
$enc_pass = md5($pass);
//query to inset data into user table
$query = "SELECT * from users where email = '$email'";
$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);
if($row) {
 // echo "Registration successful!";
 echo "<script>alert('Email already exist!');</script>";
 header('Refresh:0;url=http://127.0.0.1/beta/api/src/register_form.html');
 exit();
}

//validate if email already exists
//query to inset data into user table
$query = "INSERT INTO users (email, password) 
        VALUES ('$email', '$enc_pass')";
//Execute the query
$result = pg_query($conn, $query);

//Check if the query was successful
if($result) {
// echo "Registration successful!";
save_data_supabase($email, $enc_pass);
echo "<script>alert('Registration successful!');</script>";
header('Refresh:0;url=http://127.0.0.1/beta/api/src/login_form.html');
} else {
 echo "Registration failed ";
}

pg_close($conn);



//echo "Email: " . $email;
//echo "<br>Passwords: " . $pass;
//echo "<br>Enc. Password: " . $enc_pass;
?>
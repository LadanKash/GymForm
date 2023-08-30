
<?php
$db = new mysqli('localhost', 'root', 'root', 'gym_membership_form'); // Connect to server
if ($db->connect_error) { // Connection error message
die("Connection failed: " . $db->connect_error);
}

    $sql = "INSERT INTO gym_members (first_name, last_name, email_address, gender, birthdate, membership_type, height_cm, weight_kg)

            VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[email_address]', '$_POST[gender]', '$_POST[birthdate]', '$_POST[membership_type]', '$_POST[height_cm]', '$_POST[weight_kg]')";


if (!mysqli_query($db, $sql)){ // Query error message
die('Error: ' . $db_error());
}
echo "1 record added"; // Confirmation message
$db->close();
?>


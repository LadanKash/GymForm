<?php

    $host = "localhost";
    $dbname = "gym_membership_form";
    $dbusername = "root";
    $dbpassword = "root";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

    if (! $conn) {
        die("Connection error: " . mysqli_connect_error());
    }

    // Fetch user by email from the database

    $sql = "SELECT * FROM gym_members WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                echo "Login successful. Welcome, " . $row['username'] . "!";
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
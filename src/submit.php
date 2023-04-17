<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        // Database credentials
        //$db_host = $_ENV['RDS_HOSTNAME'];
        $servername = $_ENV['RDS_HOSTNAME'];
        $username = $_ENV['RDS_USERNAME'];
        $password = $_ENV['RDS_PASSWORD'];
        $dbname = $_ENV['RDS_DB_NAME'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO contacts (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Thank you for your message!";
        } else {
            echo "Sorry, there was an error sending your message. Please try again later.";
        }

        $conn->close();
}
?>
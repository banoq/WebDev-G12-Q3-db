<?php
require "connect.php";

// Check if the necessary POST data is received
if (isset($_POST['Activity_ID'], $_POST['Club_ID'], $_POST['Activity_Name'], $_POST['Date'], $_POST['Venue'], $_POST['Persons_Involved'])) {
    // Sanitize and store the received data
    $Activity_ID = $_POST['Activity_ID'];
    $Club_ID = $_POST['Club_ID'];
    $Activity_Name = $_POST['Activity_Name'];
    $Date = $_POST['Date'];
    $Venue = $_POST['Venue'];
    $Persons_Involved = $_POST['Persons_Involved'];

    try {
        // Establish a database connection
        $pdo = Database::letsconnect();

        // Prepare the SQL query to update event data
        $sql = "UPDATE events SET Club_ID = :Club_ID, Activity_Name = :Activity_Name, Date = :Date, Venue = :Venue, Persons_Involved = :Persons_Involved WHERE Activity_ID = :Activity_ID";

        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Activity_ID', $Activity_ID, PDO::PARAM_STR);
        $stmt->bindParam(':Club_ID', $Club_ID, PDO::PARAM_STR);
        $stmt->bindParam(':Activity_Name', $Activity_Name, PDO::PARAM_STR);
        $stmt->bindParam(':Date', $Date, PDO::PARAM_STR);
        $stmt->bindParam(':Venue', $Venue, PDO::PARAM_STR);
        $stmt->bindParam(':Persons_Involved', $Persons_Involved, PDO::PARAM_STR);
        $stmt->execute();

        // Output success message
        echo "Event updated successfully!";
    } catch (PDOException $e) {
        // Output error message if database operation fails
        echo "Error updating event: " . $e->getMessage();
    }
} else {
    // Output error message if required POST data is not received
    echo "Error: Incomplete data received.";
}
?>

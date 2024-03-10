<?php
require "connect.php";

// Check if the necessary POST data is received
if (isset($_POST['Activity_ID'])) {
    // Sanitize and store the received data
    $Activity_ID = $_POST['Activity_ID'];

    try {
        // Establish a database connection
        $pdo = Database::letsconnect();

        // Prepare the SQL query to delete the event
        $sql = "DELETE FROM events WHERE Activity_ID = :Activity_ID";

        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Activity_ID', $Activity_ID, PDO::PARAM_STR);
        $stmt->execute();

        // Output success message
        echo "Event deleted successfully!";
    } catch (PDOException $e) {
        // Output error message if database operation fails
        echo "Error deleting event: " . $e->getMessage();
    }
} else {
    // Output error message if required POST data is not received
    echo "Error: Incomplete data received.";
}
?>

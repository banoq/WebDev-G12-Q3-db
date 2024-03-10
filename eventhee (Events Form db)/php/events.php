<?php
require "connect.php";
$pdo = Database::letsconnect();

$transaction = "GET_EVENTS_DATA"; // Adjust if needed

switch ($transaction) {
  case "GET_EVENTS_DATA":
    getEventsData();
    break;
  default:
    # handle other cases
}

function getEventsData() {
  $sql = "SELECT * FROM events"; // Replace with your actual query
  $data = Database::GetAllData($GLOBALS['pdo'], $sql);
  echo json_encode($data);
}

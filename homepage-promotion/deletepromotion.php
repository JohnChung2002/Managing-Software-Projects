<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/api/api_functions.php';
    $conn = mysqli_connect($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

    $sql = "DELETE FROM content_info WHERE content_id='" . $_GET["content_id"] . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Content deleted successfully";
            echo '<button type="button" class="btn btn-success">
                    <a href="/Managing-Software-Projects/editpromotion.php">Go Back! Success </a>
                    </button>';
        } else {
            echo "Error deleting content: " . mysqli_error($conn);
        }
        mysqli_close($conn);
?>
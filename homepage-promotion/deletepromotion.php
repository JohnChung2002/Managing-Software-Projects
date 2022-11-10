<?php
    include '../page_head.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/api/api_functions.php';
    $conn = mysqli_connect($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

    $sql = "DELETE FROM content_info WHERE content_id='" . $_GET["content_id"] . "'";
        if (mysqli_query($conn, $sql)) {
            echo '
                    <div class="d-flex justify-content-center mx-auto">
                        <h1> Content deleted successfully </h1>
                    </div>
                    <button type="button" class="btn btn-success position-absolute top-50 start-50 translate-middle">
                        <a href="/Managing-Software-Projects/editpromotion.php" class = "text-white justify-content-center"> GO BACK</a>
                    </button>
                    ';
        } else {
            echo "Error deleting content: " . mysqli_error($conn);
        }
        mysqli_close($conn);
?>
<?php
    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_admin()) {
        http_response_code(400);
        exit;
    }

?>
	
	
	

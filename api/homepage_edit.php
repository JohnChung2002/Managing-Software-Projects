<?php

    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_admin()) {
        http_response_code(400);
        exit;
    }

    function Setcontent() {
        var ContentSet = tinymce.get('page_resource').setContent(contentOne);

        
       }

    var buttonSet = document.getElementById('page_resource_button');
    buttonSet.addEventListener('click', Setcontent, false);

    

       
?>
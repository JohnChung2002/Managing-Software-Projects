<?php
    function Setcontent() {
        var ContentSet = document.getElementById("page_resource_button");
       tinymce.get('page_resource').setContent(contentOne);
       }
       var buttonSet = document.getElementById('page_resource_button');
       buttonSet.addEventListener('click', Setcontent, false);
?>
<?php 
require_once 'database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO content_info (content_type, content_title, content_resource) VALUES ('Announcement', 'Closure of Store due to Fumigation and Santisation Exercise on 21st October 2022', '<p>Dear valued patrons,</p><br/><br/><p>Our store will be closed on 21st October 2022 for a fumigation and santisation exercise to ensure the safety of all visitors and employees. We will be back on 24th October 2022.</p><br/><br/><p>Thank you for your understanding.</p><br/><br/><p>Regards,</p><p>Cacti Succulent Kuching</p>');";
$command .= "INSERT INTO content_info (content_type, content_title, content_resource) VALUES ('Promotion', '40% off Cacti Seedling from 17th Oct 2022 to 31st Oct 2022', '<p>Dear valued patrons,</p><br/><br/><p>In conjunction with Halloween, we will be having a promotion whereby all Cacti Seedlings will be eligible for a 40% discount</p><br/><br/><p>With Love,</p><p>Cacti Succulent Kuching</p>');";
$command .= "INSERT INTO content_info (content_type, content_title, content_resource) VALUES ('Promotion', 'Buy 1 Free 1 for Pots and Vases on 11th November 2022', '<p>Dear valued patrons,</p><br/><br/><p>In conjunction with the 11.11 sales, we will be having a buy 1 free 1 sale on all pots and vases.</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>');";
$command .= "INSERT INTO content_info (content_type, content_title, content_resource) VALUES ('Announcement', 'Pop Up Store at Vivacity Mall on 8th November 2022', '<p>Dear valued patrons,</p><br/><br/><p>During the Yee Peng festival, we will be setting up a pop up store on the 8th November 2022 in Vivacity Mall. Be sure to drop by and visit us for some freebies!</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>');";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>

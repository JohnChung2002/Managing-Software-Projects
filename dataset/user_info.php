<?php 
require_once 'database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Helen.Fleming@testemail.cf', '0109051738', 'Helen Fleming', 'Male', '[\"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Helen.Low@testemail.cf', '0188729563', 'Helen Low', 'Female', '[\"Herbs\", \"Gardening\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Rebecca.Todd@testemail.cf', '0151056923', 'Rebecca Todd', 'Male', '[\"Fruits\", \"Succulent\", \"Herbs\", \"Bonsai\", \"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Sarah.Zwilling@testemail.cf', '0166751249', 'Sarah Zwilling', 'Female', '[\"Bonsai\", \"Succulent\", \"Herbs\", \"Fruits\", \"Gardening\", \"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Morris.Hannah@testemail.cf', '0123029768', 'Morris Hannah', 'Female', NULL);";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('William.Deacy@testemail.cf', '0184308597', 'William Deacy', 'Male', '[\"Fruits\", \"Herbs\", \"Bonsai\", \"Succulent\", \"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Deanna.Flickinger@testemail.cf', '0165318906', 'Deanna Flickinger', 'Male', '[\"Succulent\", \"Seedlings\", \"Herbs\", \"Bonsai\", \"Fruits\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Jack.Hull@testemail.cf', '0121596023', 'Jack Hull', 'Female', '[\"Herbs\", \"Fruits\", \"Gardening\", \"Succulent\", \"Seedlings\", \"Bonsai\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Rita.Kenyon@testemail.cf', '01143065182', 'Rita Kenyon', 'Male', '[\"Succulent\", \"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Debbie.Pierce@testemail.cf', '01106548972', 'Debbie Pierce', 'Male', '[\"Herbs\", \"Fruits\", \"Succulent\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Clifford.Bautista@testemail.cf', '01169501432', 'Clifford Bautista', 'Male', '[\"Herbs\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('David.Woody@testemail.cf', '0165704189', 'David Woody', 'Female', '[\"Succulent\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Robert.Abud@testemail.cf', '0188412753', 'Robert Abud', 'Male', '[\"Herbs\", \"Gardening\", \"Bonsai\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Jill.Poirier@testemail.cf', '0125814062', 'Jill Poirier', 'Male', NULL);";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Nola.Lee@testemail.cf', '01123508691', 'Nola Lee', 'Female', '[\"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Harmony.Walker@testemail.cf', '0146542378', 'Harmony Walker', 'Female', NULL);";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Monika.Hutson@testemail.cf', '0142971640', 'Monika Hutson', 'Female', '[\"Bonsai\", \"Seedlings\", \"Herbs\", \"Succulent\", \"Fruits\", \"Gardening\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Mary.Nichols@testemail.cf', '0147429603', 'Mary Nichols', 'Female', '[\"Succulent\", \"Seedlings\", \"Bonsai\", \"Gardening\", \"Fruits\", \"Herbs\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Marilyn.Goodale@testemail.cf', '0127125089', 'Marilyn Goodale', 'Male', '[\"Herbs\", \"Succulent\", \"Gardening\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('William.Arruda@testemail.cf', '0193172046', 'William Arruda', 'Female', '[\"Herbs\", \"Succulent\", \"Gardening\", \"Bonsai\", \"Fruits\", \"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Henry.Scales@testemail.cf', '01165893174', 'Henry Scales', 'Male', '[\"Herbs\", \"Fruits\", \"Succulent\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Steven.Haupt@testemail.cf', '0165720813', 'Steven Haupt', 'Male', '[\"Succulent\", \"Fruits\", \"Herbs\", \"Bonsai\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Rodney.Taylor@testemail.cf', '0198792014', 'Rodney Taylor', 'Male', '[\"Succulent\", \"Bonsai\", \"Herbs\", \"Seedlings\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Eli.Labbe@testemail.cf', '0194379502', 'Eli Labbe', 'Male', '[\"Gardening\", \"Seedlings\", \"Succulent\", \"Bonsai\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Terry.Chambers@testemail.cf', '01134605291', 'Terry Chambers', 'Female', '[\"Fruits\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Leslie.Fuller@testemail.cf', '0155386749', 'Leslie Fuller', 'Male', NULL);";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Daniel.Humphreys@testemail.cf', '0150439562', 'Daniel Humphreys', 'Male', '[\"Seedlings\", \"Succulent\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Glenna.Farmer@testemail.cf', '0185123460', 'Glenna Farmer', 'Male', '[\"Fruits\", \"Succulent\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Daniel.Claunch@testemail.cf', '0165802193', 'Daniel Claunch', 'Female', '[\"Herbs\", \"Fruits\"]');";
$command .= "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('Victoria.Yeaton@testemail.cf', '0187529138', 'Victoria Yeaton', 'Male', '[\"Gardening\"]');";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>

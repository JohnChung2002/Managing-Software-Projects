CREATE DATABASE IF NOT EXISTS  `cacti_succulent_kuching`;
USE `cacti_succulent_kuching`;
CREATE TABLE IF NOT EXISTS `user_info` (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email_address VARCHAR(254),
    phone_number CHAR(11) NOT NULL,
    gender ENUM('Male', 'Female'),
    preference JSON,
    PRIMARY KEY (user_id)
);
CREATE TABLE IF NOT EXISTS `user_credentials` (
    email_address VARCHAR(254) NOT NULL,
    password CHAR(60) NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    user_role ENUM('Admin', 'User') NOT NULL,
    account_created_timestamp TIMESTAMP,
    account_status ENUM('Unactivated', 'Activated', 'Pending Reset', 'Deleted') NOT NULL,
    account_token CHAR(22),
    token_expiry DATETIME,
    notification_token JSON,
    PRIMARY KEY (email_address),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);
ALTER TABLE `user_info` ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY IF NOT EXISTS (`email_address`) REFERENCES `user_credentials`(`email_address`);
CREATE TABLE IF NOT EXISTS `booking_info` (
    booking_id CHAR(11) NOT NULL,
    booking_timestamp TIMESTAMP NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_timeslot TIME NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    number_of_attendees TINYINT UNSIGNED NOT NULL,
    booking_status ENUM('Confirmed', 'Cancelled') NOT NULL,
    PRIMARY KEY (booking_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);
CREATE TABLE IF NOT EXISTS `default_store_availability` (
    day_of_week ENUM('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday') NOT NULL,
    operating_hours JSON 
);
CREATE TABLE IF NOT EXISTS `custom_store_availability` (
    operating_date DATE NOT NULL,
    operating_hours JSON
);
CREATE TABLE IF NOT EXISTS `homepage_info` (
    version_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    version_timestamp TIMESTAMP NOT NULL,
    page_resource TEXT,
    remarks VARCHAR(255),
    PRIMARY KEY (version_id)
);
CREATE TABLE IF NOT EXISTS `content_info` (
    content_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    content_type ENUM('Announcement', 'Promotion') NOT NULL,
    content_creation_timestamp TIMESTAMP NOT NULL,
    content_title VARCHAR(255) NOT NULL,
    content_resource TEXT,
    PRIMARY KEY (content_id)
);
CREATE TABLE IF NOT EXISTS `encyclopedia_item_categories` (
    item_category_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_category_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (item_category_id)
);
CREATE TABLE IF NOT EXISTS `encyclopedia_item_types` (
    item_type_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_type_name VARCHAR(255) NOT NULL,
    item_category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (item_type_id),
    FOREIGN KEY (item_category_id) REFERENCES encyclopedia_item_categories(item_category_id)
);
CREATE TABLE IF NOT EXISTS `encyclopedia_items` (
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_type_id INT UNSIGNED NOT NULL,
    item_name VARCHAR(255) NOT NULL,
    availability_in_store ENUM('Not Available', 'Out of Stock', 'Available') NOT NULL,
    price_in_store DECIMAL(5,2),
    encyclopedia_resource TEXT,
    PRIMARY KEY (item_id),
    FOREIGN KEY (item_type_id) REFERENCES encyclopedia_item_types(item_type_id)
);
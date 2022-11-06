CREATE DATABASE IF NOT EXISTS  `cacti_succulent_kuching`;
USE `cacti_succulent_kuching`;
CREATE TABLE IF NOT EXISTS `user_info` (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email_address VARCHAR(254),
    phone_number CHAR(11) NOT NULL,
    name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female'),
    preference JSON,
    PRIMARY KEY (user_id)
);
CREATE TABLE IF NOT EXISTS `user_credentials` (
    email_address VARCHAR(254) NOT NULL,
    password CHAR(60) NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    profile_image TEXT,
    user_role ENUM('Super Admin', 'Admin', 'User') NOT NULL,
    account_created_timestamp TIMESTAMP,
    account_status ENUM('Unactivated', 'Activated', 'Pending Reset', 'Pending Delete', 'Deleted') NOT NULL,
    account_token CHAR(22),
    token_expiry DATETIME,
    notification_token JSON NOT NULL DEFAULT (JSON_ARRAY()),
    PRIMARY KEY (email_address),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);
CREATE TABLE IF NOT EXISTS `booking_info` (
    booking_id CHAR(11) NOT NULL,
    booking_timestamp TIMESTAMP NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_timeslot TIME NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    number_of_attendees TINYINT UNSIGNED NOT NULL,
    booking_status ENUM('Confirmed', 'Cancelled') NOT NULL,
    edit_count INT UNSIGNED NOT NULL,
    cancellation_remarks VARCHAR(255),
    PRIMARY KEY (booking_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);
CREATE TABLE IF NOT EXISTS `default_store_availability` (
    day_of_week ENUM('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday') NOT NULL,
    operating_hours JSON,
    PRIMARY KEY (day_of_week)
);
CREATE TABLE IF NOT EXISTS `custom_store_availability` (
    operating_date DATE NOT NULL,
    operating_hours JSON,
    PRIMARY KEY (operating_date)
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
CREATE TABLE IF NOT EXISTS `encyclopedia_items` (
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_category VARCHAR(255) NOT NULL,
    item_subcategory VARCHAR(255),
    item_name VARCHAR(255) NOT NULL,
    item_image TEXT NOT NULL,
    availability_in_store ENUM('Not Available', 'Out of Stock', 'Available') NOT NULL,
    price_in_store DECIMAL(5,2),
    description TEXT,
    PRIMARY KEY (item_id)
);
CREATE TABLE IF NOT EXISTS `notification_history` (
    notification_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    notification_timestamp TIMESTAMP NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    notification_type ENUM('Booking Confirmation', 'Booking Update', 'Booking Cancellation', 'Booking Reminder', 'Promotion', 'Announcement') NOT NULL,
    notification_title VARCHAR(255) NOT NULL,
    notification_link TEXT NOT NULL,
    notification_status ENUM('Unread', 'Read') NOT NULL,
    PRIMARY KEY (notification_id),
    FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);
CREATE TABLE IF NOT EXISTS `enquiries` (
    enquiry_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    enquiry_timestamp TIMESTAMP NOT NULL,
    contact_name VARCHAR(255) NOT NULL,
    contact_info VARCHAR(254) NOT NULL,
    enquiry_subject VARCHAR(255) NOT NULL,
    enquiry_content TEXT NOT NULL,
    enquiry_status ENUM('Answered', 'Unanswered') NOT NULL,
    enquiry_reply TEXT,
    PRIMARY KEY (enquiry_id)
)
CREATE TABLE IF NOT EXISTS `banner` (
    banner_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    banner_image TEXT NOT NULL,
    banner_description VARCHAR(255) NOT NULL,
    banner_status ENUM('Active', 'Inactive') NOT NULL,
    PRIMARY KEY (banner_id)
);
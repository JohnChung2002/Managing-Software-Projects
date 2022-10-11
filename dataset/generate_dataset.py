from sre_parse import CATEGORIES
import string
import random
from telnetlib import STATUS
from unicodedata import category
import names
import secrets
import base64
import bcrypt
import datetime

ALLCHAR = string.ascii_lowercase + string.ascii_uppercase + string.digits + string.punctuation

GENDER = ["Male", "Female"]
ROLES = ["Admin", "Admin", "Admin", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User"]
CUSTOM_OP_TIME = [["09:00:00-11:00:00", "14:00:00-17:00:00"], ["09:00:00-12:00:00"], ["09:00:00-14:00:00"]]
ACCOUNT_STATUS = ['Unactivated', 'Activated', 'Pending Reset', 'Deleted']
BOOKING_STATUS = ["Confirmed", "Cancelled"]
ITEM_AVAILABILITY = ["Not Available", "Out of Stock", "Available"]
PREFERENCES = ["Gardening", "Bonsai", "Succulent", "Herbs", "Fruits", "Seedlings"]
DAY_OF_WEEK = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
CONTENT_TYPE = ["Announcement", "Promotion", "Promotion", "Announcement"]
CONTENT_TITLE = ["Closure of Store due to Fumigation and Santisation Exercise on 21st October 2022", "40% off Cacti Seedling from 17th Oct 2022 to 31st Oct 2022", "Buy 1 Free 1 for Pots and Vases on 11th November 2022", "Pop Up Store at Vivacity Mall on 8th November 2022"]
CONTENT_RESOURCE = ["<p>Dear valued patrons,</p><br/><br/><p>Our store will be closed on 21st October 2022 for a fumigation and santisation exercise to ensure the safety of all visitors and employees. We will be back on 24th October 2022.</p><br/><br/><p>Thank you for your understanding.</p><br/><br/><p>Regards,</p><p>Cacti Succulent Kuching</p>", "<p>Dear valued patrons,</p><br/><br/><p>In conjunction with Halloween, we will be having a promotion whereby all Cacti Seedlings will be eligible for a 40% discount</p><br/><br/><p>With Love,</p><p>Cacti Succulent Kuching</p>", "<p>Dear valued patrons,</p><br/><br/><p>In conjunction with the 11.11 sales, we will be having a buy 1 free 1 sale on all pots and vases.</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>", "<p>Dear valued patrons,</p><br/><br/><p>During the Yee Peng festival, we will be setting up a pop up store on the 8th November 2022 in Vivacity Mall. Be sure to drop by and visit us for some freebies!</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>"]
CATEGORIES_TYPE_NAME = {"Compost & Soil" : [], "Fertiliser" : [], "Pesticides" : [], "Pots & Vases" : ["Ceramic", "Fiber", "Glass", "Plastic"], "Tools & Accessories" : [], "Seeds" : ["Flower and Fruits", "Vegetables and Herbs"], "Plants" : ["Orchids", "Succulents", "Herbs", "Fruits", "Seedlings"]}
ITEMS_NAME = ["Agrosoil", "Ferti 53", "Mr Ganick Natural Pesticide", "Chinese Ceramic Pot", "Wood Fiber Pot", "Terrarium Glass Pot", "Garden Plastic Pot", "Pressure Pump Sprayer", "Sunflower Seeds", "Coriander Seeds", "Orchid Cattleya", "Ornatum Star Cactus", "Aloe Vera", "Avocado", "Foxtail Lily"]
ITEMS_IMAGE = ["https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-2146/ZAPXaUTi1619778545-808x1080.jpeg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-669/LExBlpgU1586244672-416x584.png", "https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-310/GM_mr_ganick_scale_terminator_1-01_1662356874-1772x1772.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-858/or-plant-home-deco-a-9804-96224722-29085c5ea4ee10f0f8bcb668f8df2c26-1920x1920.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-391/garden-wood-style-pot-1002651-4141-98884867-29175d6e46e35f225ae3d3f861827268-1920x1920.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-334/icueXlZy1596250341-795x669.JPG", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-515/co-9555412901410-9354-31183684-928803f6b7cc81e102aee8a2092322a0-1920x1920.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-2052/druSuAs71621738114-960x1241.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-3276/njGk4Aad1635401385-1772x1772.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-1018/eL1RZXvH1601001526-851x851.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-3473/gsD28dSL1625979265-1689x2251.jpg", "https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-2717/gN7fiQZ01599554008-810x1080.jpg", "https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-1267/cKV5UqyK1572428837-520x525.jpg", "https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-1405/koSobKdW1574127623-400x318.jpg", "https://garden-tags-live.s3-accelerate.amazonaws.com/69036_treefrog44_1615989575222_1080.jpeg"]
PHPHEADER = '''<?php 
require_once '../database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
'''
PHPFOOTER = '''mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
'''
categoriesTypeID = {}
roleList =[]
statusList = []
bookingDict = {}
bookingIdList = []
nameList = []
emailList = []
numberList = []
passwordList = []

def generate_id():
    token = secrets.token_bytes(8)
    return base64.b64encode(token).decode('ascii').rstrip("=")

def generate_booking_id():
    while True:
        id = generate_id()
        if (id not in bookingIdList):
            bookingIdList.append(id)
            return id

def generate_booking_date_time():
    date = generate_weekday()
    if (date not in bookingDict):
        bookingDict[date] = []
    while True:
        time = "{:02d}:00:00".format(random.randint(9, 17))
        if (bookingDict[date].count(time) < 3):
            bookingDict[date].append(time)
            return [date, time]

def generate_weekday():
    while True:
        date = (datetime.datetime.now() + datetime.timedelta(days=random.randint(1, 30)))
        if (date.weekday() != 5 and date.weekday() != 6):
            return date.strftime("%Y-%m-%d")

def generate_phone_number():
    while True:
        num1 = random.randint(0, 9)
        if (num1 == 1):
            rand_list = random.sample(range(0, 10), 8)
            number = "01{0}{1}{2}{3}{4}{5}{6}{7}{8}".format(num1, *rand_list)
        else:
            rand_list = random.sample(range(0, 10), 7)
            number = "01{0}{1}{2}{3}{4}{5}{6}{7}".format(num1, *rand_list)
        if (number not in numberList):
            numberList.append(number)
            return number

def generate_name_and_email(gender):
    while True:
        name = names.get_full_name(gender)
        if (name not in nameList):
            email = "{0}.{1}@testemail.cf".format(name.split()[0], name.split()[1])
            nameList.append(name)
            emailList.append(email)
            return [name, email]

def generate_password():
    password = ''.join(random.sample(ALLCHAR, random.randint(10, 16)))
    passwordList.append(password)
    return bcrypt.hashpw(password.encode('utf-8'), bcrypt.gensalt()).decode('UTF-8')

def generate_user_info():
    arr = []
    for i in range(20):
        gender=GENDER[random.randint(0, 1)]
        name, email = generate_name_and_email(gender)
        phone_number = generate_phone_number()
        preference = random.sample(PREFERENCES, random.randint(0, len(PREFERENCES)))
        arr.append([email, phone_number, name, gender, preference])
    return arr

def generate_no_cred_users():
    arr = []
    for i in range(10):
        gender=GENDER[random.randint(0, 1)]
        name, email = generate_name_and_email(gender)
        phone_number = generate_phone_number()
        preference = random.sample(PREFERENCES, random.randint(0, len(PREFERENCES)))
        arr.append([email, phone_number, name, gender, preference])
    return arr

def generate_user_credentials():
    arr = []
    for i in range(20):
        password = generate_password()
        id = i+1
        role = ROLES[i]
        if (role == 'User'):
            account_status = ACCOUNT_STATUS[random.randint(0, 3)]
        else:
            account_status = ACCOUNT_STATUS[1]
        statusList.append(account_status)
        account_token = ""
        token_expiry = ""
        if (account_status == 'Unactivated' or account_status == 'Pending Reset'):
            account_token = generate_id() + generate_id()
            token_expiry = (datetime.datetime.now() + datetime.timedelta(days=1)).strftime("%Y-%m-%d %H:%M:%S")
        arr.append([emailList[i], password, id, role, account_status, account_token, token_expiry])
    return arr

def generate_booking():
    arr = []
    for i in range(20):
        if (statusList[i] == 'Activated' and ROLES[i] == 'User'):
            booking_id = generate_booking_id()
            appointment_date, appointment_time = generate_booking_date_time()
            user_id = i + 1
            num_of_attendees = random.randint(1, 8)
            booking_status = BOOKING_STATUS[random.randint(0, 1)]
            arr.append([booking_id, appointment_date, appointment_time, user_id, num_of_attendees, booking_status])
    for i in range(10):
        rand = random.randint(0, 4)
        if (rand == 0):
            booking_id = generate_booking_id()
            appointment_date, appointment_time = generate_booking_date_time()
            user_id = 20 + i + 1
            num_of_attendees = random.randint(1, 8)
            booking_status = BOOKING_STATUS[random.randint(0, 1)]
            arr.append([booking_id, appointment_date, appointment_time, user_id, num_of_attendees, booking_status])
    return arr

def generate_default_availability():
    arr = []
    for i in DAY_OF_WEEK:
        if (i == 'Saturday' or i == 'Sunday'):
            arr.append([i, None])
        else:
            arr.append([i, ["09:00:00-12:00:00", "13:00:00-17:00:00"]])
    return arr

def generate_custom_availability():
    arr = []
    for i in range(20):
        date = generate_weekday()
        op_hour = CUSTOM_OP_TIME[random.randint(0, 2)]
        arr.append([date, op_hour])
    return arr

def generate_content():
    arr = []
    for i in range(4):
        content_type = CONTENT_TYPE[i]
        content_title = CONTENT_TITLE[i]
        content_resource = CONTENT_RESOURCE[i]
        arr.append([content_type, content_title, content_resource])
    return arr

def generate_encyclopedia_category():
    return list(CATEGORIES_TYPE_NAME.keys())

def generate_encyclopedia_types():
    category_count = 1
    type_count = 1
    arr = []
    for i in CATEGORIES_TYPE_NAME:
        if (CATEGORIES_TYPE_NAME[i] != []):
            if (category_count not in categoriesTypeID):
                categoriesTypeID[category_count] = []
            for j in CATEGORIES_TYPE_NAME[i]:
                arr.append([j, category_count])
                categoriesTypeID[category_count].append(type_count)
                type_count += 1
        else:
            arr.append([i, category_count])
            if (category_count not in categoriesTypeID):
                categoriesTypeID[category_count] = []
            categoriesTypeID[category_count].append(type_count)
            type_count += 1
        category_count += 1
    return arr

def generate_items():
    arr = []
    for i in range(15):
        type_id = i + 1
        name = ITEMS_NAME[i]
        image = ITEMS_IMAGE[i]
        availability = ITEM_AVAILABILITY[random.randint(0, 2)]
        if (availability == 'Not Available'):
            price = None
        else:
            price = round(random.uniform(10.00, 130.00), 2) 
        resource = "<h1>This is {}</h1>".format(name)
        arr.append([type_id, name, image, availability, price, resource])
    return arr

def generate_homepage_versions():
    arr = []
    for i in range(1,6):
        version = "<h1>This is version {}</h1><p>You are now viewing version {}</p>".format(i, i)
        remarks = "Modified to Version {}".format(i)
        arr.append([version, remarks])
    return arr

def escape_string(string):
    return string.replace("'", "\\\"")

def escape_dollar(string):
    return string.replace("$", "\\$")

def sql_comms_user_info():
    info = generate_user_info() + generate_no_cred_users()
    with open('user_info.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            pref = escape_string(str(i[4]))
            if (pref == "[]"):
                f.write("$command .= \"INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('{}', '{}', '{}', '{}', NULL);\";\n".format(i[0], i[1], i[2], i[3]))
            else:
                f.write("$command .= \"INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('{}', '{}', '{}', '{}', '{}');\";\n".format(i[0], i[1], i[2], i[3], pref))
        f.write(PHPFOOTER)

def sql_comms_user_creds():
    info = generate_user_credentials()
    with open('user_credentials.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO user_credentials (email_address, password, user_id, user_role, account_status, account_token, token_expiry) VALUES ('{}', '{}', '{}', '{}', '{}', '{}', '{}');\";\n".format(i[0], escape_dollar(i[1]), i[2], i[3], i[4], i[5], i[6]))
        f.write(PHPFOOTER)
    with open('username_password.txt', 'w') as f:
        for i in range(20):
            f.write("Username:{} | Password: {}\n".format(emailList[i], passwordList[i]))

def sql_comms_booking():
    info = generate_booking()
    with open('booking.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('{}', '{}', '{}', {}, {}, '{}');\";\n".format(i[0], i[1], i[2], i[3], i[4], i[5]))
        f.write(PHPFOOTER)

def sql_comms_default_availability():
    info = generate_default_availability()
    with open('default_availability.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            if (i[1]!=None):
                f.write("$command .= \"INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('{}', '{}');\";\n".format(i[0], escape_string(str(i[1]))))
            else:
                f.write("$command .= \"INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('{}', NULL);\";\n".format(i[0]))
        f.write(PHPFOOTER)

def sql_comms_custom_availability():
    info = generate_custom_availability()
    with open('custom_availability.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('{}', '{}');\";\n".format(i[0], escape_string(str(i[1]))))
        f.write(PHPFOOTER)

def sql_comms_content():
    info = generate_content()
    with open('content.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO content_info (content_type, content_title, content_resource) VALUES ('{}', '{}', '{}');\";\n".format(i[0], i[1], i[2]))
        f.write(PHPFOOTER)

def sql_comms_encyclopedia_category():
    info = generate_encyclopedia_category()
    with open('encyclopedia_category.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('{}');\";\n".format(i))
        f.write(PHPFOOTER)

def sql_comms_encyclopedia_types():
    info = generate_encyclopedia_types()
    with open('encyclopedia_types.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('{}', {});\";\n".format(i[0], i[1]))
        f.write(PHPFOOTER)

def sql_comms_encyclopedia_items():
    info = generate_items()
    with open('encyclopedia_items.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            if (i[4] == None):
                f.write("$command .= \"INSERT INTO encyclopedia_items (item_type_id, item_name, item_image, availability_in_store, price_in_store, encyclopedia_resource) VALUES ({}, '{}', '{}', '{}', NULL, '{}');\";\n".format(i[0], i[1], i[2], i[3], i[5]))
            else:
                f.write("$command .= \"INSERT INTO encyclopedia_items (item_type_id, item_name, item_image, availability_in_store, price_in_store, encyclopedia_resource) VALUES ({}, '{}', '{}', '{}', {}, '{}');\";\n".format(i[0], i[1], i[2], i[3], i[4], i[5]))
        f.write(PHPFOOTER)

def sql_comms_homepage_versions():
    info = generate_homepage_versions()
    with open('homepage_versions.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO homepage_info (page_resource, remarks) VALUES ('{}', '{}');\";\n".format(i[0], i[1]))
        f.write(PHPFOOTER)

def php_all_caller():
    with open('load_data.php', 'w') as f:
        f.write("<?php\n")
        f.write("include 'user_info.php';\n")
        f.write("include 'user_credentials.php';\n")
        f.write("include 'booking.php';\n")
        f.write("include 'default_availability.php';\n")
        f.write("include 'custom_availability.php';\n")
        f.write("include 'content.php';\n")
        f.write("include 'encyclopedia_category.php';\n")
        f.write("include 'encyclopedia_types.php';\n")
        f.write("include 'encyclopedia_items.php';\n")
        f.write("include 'homepage_versions.php';\n")
        f.write("?>")

'''
generate_user_info()
generate_user_credentials()
generate_no_cred_users()
generate_booking()
generate_default_availability()
generate_custom_availability()
generate_encyclopedia_category()
generate_encyclopedia_types()
generate_items()
generate_homepage_versions()
'''

sql_comms_user_info()
sql_comms_user_creds()
sql_comms_booking()
sql_comms_default_availability()
sql_comms_custom_availability()
sql_comms_content()
sql_comms_encyclopedia_category()
sql_comms_encyclopedia_types()
sql_comms_encyclopedia_items()
sql_comms_homepage_versions()
php_all_caller()



'''
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
    item_image TEXT NOT NULL,
    availability_in_store ENUM('Not Available', 'Out of Stock', 'Available') NOT NULL,
    price_in_store DECIMAL(5,2),
    encyclopedia_resource TEXT,
    PRIMARY KEY (item_id),
    FOREIGN KEY (item_type_id) REFERENCES encyclopedia_item_types(item_type_id)
);
'''
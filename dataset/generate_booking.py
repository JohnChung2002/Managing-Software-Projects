import base64
import secrets
import random
import datetime
from tabnanny import check

ACCOUNT_STATUS = ['Unactivated', 'Activated', 'Pending Reset', 'Deleted']
BOOKING_STATUS = ["Confirmed", "Cancelled"]
bookingIdList = ['hylpYxpOlqg', 'mPj18yElS5k', '9fCty64D53A', '8A31RgZ/mWs', 'RAW/GZdwl3I', 'yRoQmHoWe5c', 'QKzXTCkJlLQ', 'HeukZjkjCGE' ]
bookingDict = { 
    "2022-10-17" : ["15:00:00"], 
    "2022-10-20" : ["9:00:00"]
}
defaultAvailability = {
    "Sunday": None,
    "Monday" : ["09:00:00-12:00:00", "13:00:00-17:00:00"],
    "Tuesday" : ["09:00:00-12:00:00", "13:00:00-17:00:00"],
    "Wednesday" : ["09:00:00-12:00:00", "13:00:00-17:00:00"],
    "Thursday" : ["09:00:00-12:00:00", "13:00:00-17:00:00"],
    "Friday" : ["09:00:00-12:00:00", "13:00:00-17:00:00"],
    "Saturday" : None
}
customAvailability = {"2022-10-20":["09:00:00-12:00:00"],"2022-10-26":["09:00:00-12:00:00"],"2022-10-25":["09:00:00-14:00:00"],"2022-10-18":["09:00:00-11:00:00", "14:00:00-17:00:00"],"2022-11-07":["09:00:00-14:00:00"],"2022-11-03":["09:00:00-14:00:00"],"2022-10-28":["09:00:00-14:00:00"],"2022-10-18":["09:00:00-14:00:00"],"2022-10-25":["09:00:00-14:00:00"],"2022-11-09":["09:00:00-14:00:00"],"2022-10-25":["09:00:00-12:00:00"],"2022-10-21":["09:00:00-14:00:00"],"2022-10-13":["09:00:00-11:00:00", "14:00:00-17:00:00"],"2022-11-02":["09:00:00-14:00:00"],"2022-10-17":["09:00:00-12:00:00"],"2022-10-28":["09:00:00-11:00:00", "14:00:00-17:00:00"],"2022-11-03":["09:00:00-11:00:00", "14:00:00-17:00:00"],"2022-10-12":["09:00:00-14:00:00"],"2022-10-19":["09:00:00-14:00:00"],"2022-10-26":["09:00:00-12:00:00"]}
statusList = ["Activated","Activated","Activated","Unactivated","Pending Reset","Activated","Unactivated","Unactivated","Activated","Activated","Deleted","Deleted","Deleted","Activated","Activated","Unactivated","Deleted","Unactivated","Pending Reset","Unactivated"]
ROLES = ["Admin", "Admin", "Admin", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User", "User"]
PHPHEADER = '''<?php 
require_once '../database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
'''
PHPFOOTER = '''mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
'''

def generate_id():
    token = secrets.token_bytes(8)
    return base64.b64encode(token).decode('ascii').rstrip("=")

def generate_booking_id():
    while True:
        id = generate_id()
        if (id not in bookingIdList):
            bookingIdList.append(id)
            return id

def checkSlotValid(date, time):
    time = datetime.datetime.strptime(time, "%H:%M:%S").time()
    if (date in customAvailability):
        if (customAvailability[date] != None):
            for slot in customAvailability[date]:
                start, end = slot.split("-")
                start = datetime.datetime.strptime(start, "%H:%M:%S").time()
                end = datetime.datetime.strptime(end, "%H:%M:%S").time()
                if (start <= time and end > time):
                    return True
    else:
        vdate = datetime.datetime.strptime(date, "%Y-%m-%d").strftime("%A")
        if (defaultAvailability[vdate] != None):
            for slot in defaultAvailability[vdate]:
                start, end = slot.split("-")
                start = datetime.datetime.strptime(start, "%H:%M:%S").time()
                end = datetime.datetime.strptime(end, "%H:%M:%S").time()
                if (start <= time and end > time):
                    return True
    return False

def generate_booking_date_time():
    while True:
        date = generate_bookingday()
        if (date not in bookingDict):
            bookingDict[date] = []
        time = "{:02d}:00:00".format(random.randint(9, 17))
        if (bookingDict[date].count(time) < 3):
            if (checkSlotValid(date, time)):
                status = BOOKING_STATUS[random.randint(0, 1)]
                if (status != "Cancelled"):
                    bookingDict[date].append(time)
                return [date, time, status]

def generate_bookingday():
    while True:
        date = (datetime.datetime.now() + datetime.timedelta(days=random.randint(1, 60)))
        dateStr = date.strftime("%Y-%m-%d")
        if (dateStr not in customAvailability):
            if (date.weekday() != 5 and date.weekday() != 6):
                return dateStr
        else:
            return dateStr

def generate_booking():
    arr = []
    for i in range(20):
        for x in range(30):
            rand = random.randint(0, 4)
            if (rand == 0):
                if (statusList[i] == 'Activated' and ROLES[i] == 'User'):
                    booking_id = generate_booking_id()
                    appointment_date, appointment_time, booking_status = generate_booking_date_time()
                    user_id = i + 1
                    num_of_attendees = random.randint(1, 8)
                    arr.append([booking_id, appointment_date, appointment_time, user_id, num_of_attendees, booking_status])
    for i in range(10):
        for x in range(30):
            rand = random.randint(0, 4)
            if (rand == 0):
                booking_id = generate_booking_id()
                appointment_date, appointment_time, booking_status = generate_booking_date_time()
                user_id = 20 + i + 1
                num_of_attendees = random.randint(1, 8)
                arr.append([booking_id, appointment_date, appointment_time, user_id, num_of_attendees, booking_status])
    return arr

def sql_comms_booking():
    info = generate_booking()
    with open('extra_booking.php', 'w') as f:
        f.write(PHPHEADER)
        for i in info:
            f.write("$command .= \"INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('{}', '{}', '{}', {}, {}, '{}');\";\n".format(i[0], i[1], i[2], i[3], i[4], i[5]))
        f.write(PHPFOOTER)

sql_comms_booking()
# Managing-Software-Projects
Project Title: Cacti Succulent Kuching’s Visitor Appointment Booking System
<br/><br/>
This is the repository for the case study of SWE20001 Managing Software Projects unit. A copy of the working system is available on [https://cactisucculentkuching.cf/](https://cactisucculentkuching.cf/)
<br/><br/>
A copy of the database export can be found in [/dataset/cacti_succulent_kuching.sql](/dataset/cacti_succulent_kuching.sql) which was exported from the live server.
<br/><br/>
The notification module is dependent on the following modules:

- Email -> Google Script
- Push Notification -> Google Firebase
- Cron Job -> Google Script

<br/>
1. Email Module
The Cacti Succulent Email Script is located in [google_script](/google_script/Cacti Succulent Email Script.gs) and should be deployed and the api link for Cacti Succulent Email Script should be overwritten in [api_credentials.php](api_credentials.php)
![Deployment Steps](https://media.discordapp.net/attachments/728159841494761483/1044454738592268338/image.png)
2. Push Notification Module
All the modules used by Firebase are setup using the two links below:
- [Firebase Client Side Setup](https://firebase.google.com/docs/cloud-messaging/js/client)
- [Firebase Admin PHP SDK Setup](https://firebase-php.readthedocs.io/en/stable/)
3. Cron Job Module
The Cacti Succulent Cron Job Script is located in [google_script](/google_script/Cacti Succulent Cron Job Script.gs) and should be deployed then the createTrigger() function should be executed to start a recurring time-trigger equivalent to a cron job.

<br/>
The following is the breakdown of functionality handled by each team member:
- John
    - Database Module
    - Notification Module
    - Reporting Module 
    - Visitor and Admin Booking Module (Backend)
    - Live Server Management
- Gabriel
    - Authentication Module
    - User Management Module
- Azfar
    - Homepage Module
    - Announcment/Promotion Module
- Brendan
    - Visitor Booking Module (Frontend)
    - Visitor Plant Encyclopedia Module
- Zi Xiang
    - Support Module
- Sherena
    - Admin Plant Encyclopedia Module
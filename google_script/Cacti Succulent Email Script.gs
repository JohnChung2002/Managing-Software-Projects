const API_KEY = "EB3914D9F167D9A414DF438C7D4CD"
const SENDER_NAME = "Cacti Succulent Kuching"
const EMAIL_HEAD = `
<div style="background-color:green; padding-top: 20px; padding-bottom: 5px;">
  <img src="https://imgur.com/bRTZ11w.jpeg" style="display:block; margin-left:auto; margin-right:auto; height: 10vh;"/>
  <h1 style="text-align: center; color: white; font-size: 36px;">Cacti Succulent Kuching</h1>
</div>`

function checkQuota() {
  Logger.log(`Remaining Quota: ${MailApp.getRemainingDailyQuota()}`);
  Logger.log(`Alias: ${GmailApp.getAliases()[0]}`);
}

function generateBody(e) {
  var result = {
    "status": "Failed", 
    "error" : "Unauthorised access"
  }
  if (e.parameter.key == API_KEY) {
    result = {
      "status": "Success"
    }
    switch (e.parameter.action) {
      case "verification":
        verifyEmail(e.parameter.email, e.parameter.token);
        break;
      case "reset":
        resetEmail(e.parameter.email, e.parameter.token);
        break;
      case "deleteaccount":
        deleteAccountEmail(e.parameter.email);
        break;
      case "createbookinguser":
        createBookingUserEmail(e.parameter.email, e.parameter.id, e.parameter.date, e.parameter.time, e.parameter.pax);
        break;
      case "createbookingadmin":
        createBookingAdminEmail(e.parameter.email, e.parameter.id, e.parameter.date, e.parameter.time, e.parameter.pax);
        break;
      case "updatebookinguser":
        updateBookingUserEmail(e.parameter.email, e.parameter.id, e.parameter.date, e.parameter.time, e.parameter.pax);
        break;
      case "updatebookingadmin":
        updateBookingAdminEmail(e.parameter.email, e.parameter.id, e.parameter.date, e.parameter.time, e.parameter.pax);
        break;
      case "cancelbookinguser":
        cancelBookingUserEmail(e.parameter.email, e.parameter.id, e.parameter.date, e.parameter.time, e.parameter.pax);
        break;
      case "cancelbookingadmin":
        cancelBookingAdminEmail(e.parameter.email, e.parameter.id, e.parameter.date, e.parameter.time, e.parameter.pax);
        break;
      case "reminder":
        reminderEmail(e.parameter.email, e.parameter.id, e.parameter.date, e.parameter.time, e.parameter.pax);
        break;
      case "content":
        contentEmail(e.parameter.email, e.parameter.id, e.parameter.title, e.parameter.type);
        break;
      case "createenquiryticket":
        enquiryTicketCreationEmail(e.parameter.email, e.parameter.name, e.parameter.id, e.parameter.title, e.parameter.enquiry);
        break;
      case "answerenquiry":
        answerEnquiryEmail(e.parameter.email, e.parameter.name, e.parameter.id, e.parameter.title, e.parameter.reply);
        break;
      default:
        result = {
          "status": "Failed", 
          "error" : "Unauthorised access"
        }
        break;
    }
  }
  return result;
}

function doGet(e) {
  var result = generateBody(e);
  return ContentService.createTextOutput(JSON.stringify(result)).setMimeType(ContentService.MimeType.JSON);
}

function doPost(e) {
  var result = generateBody(e);
  return ContentService.createTextOutput(JSON.stringify(result)).setMimeType(ContentService.MimeType.JSON);
}

function verifyEmail(email, token) {
  var subject = "Verify Your Account"
  var body = `
  ${EMAIL_HEAD}
  <p style="font-size: 20px;"> Hi there, 
  <br/><br/>
  This is the link for verification <a href="https://cactisucculentkuching.cf/verifyemail.php?email=${email}&token=${token}">https://cactisucculentkuching.cf/verifyemail.php?email=${email}&token=${token}</a>. The verification link is only valid for 5 minutes.
  <br/><br>
  Thanks,<br/>
  Cacti Succulent Kuching
  </p>`
  GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body});
}

function resetEmail(email, token) {
  var subject = "Reset Your Password"
  var body = `
  ${EMAIL_HEAD}
  <p style="font-size: 20px;"> Hi there, 
  <br/><br/>
  This is the link to reset your password <a href="https://cactisucculentkuching.cf/resetpassword.php?email=${email}&token=${token}">https://cactisucculentkuching.cf/resetpassword.php?email=${email}&token=${token}</a>. The verification link is only valid for 5 minutes.
  <br/><br>
  Thanks,<br/>
  Cacti Succulent Kuching
  </p>`
  GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body});
}

function deleteAccountEmail(email) {
  var subject = "Account Deletion"
  var body = `
  ${EMAIL_HEAD}
  <p style="font-size: 20px;"> Hi there, 
  <br/><br/>
  This is an email to notify you of your account deletion, if you wish to revert the account deletion, kindly log back in with your credentials at <a href="https://cactisucculentkuching.cf/login.php">https://cactisucculentkuching.cf/login.php</a> within 1 day.
  <br/><br>
  Thanks,<br/>
  Cacti Succulent Kuching
  </p>`
  GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body});
}

function createBookingUserEmail(email, id, date, time, pax) {
  while (true) {
    try {
      var response = UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/booking_ics.php?booking_id=${id}`);
      var fileBlob = response.getBlob()
      var subject = `[${id}] Booking Confirmation`
      var body = `
      ${EMAIL_HEAD}
      <p style="font-size: 20px;"> Hi there, 
      <br/><br/>
      Your booking for ${pax} pax is confirmed for ${date} at ${time}. 
      <br/><br>
      Thanks,<br/>
      Cacti Succulent Kuching
      </p>`
      fileBlob.setName("invite.ics")
      GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body, attachments: [fileBlob]});
      return;
    } catch(err) {
      Logger.log(err);
    }
  }
}

function createBookingAdminEmail(email, id, date, time, pax) {
  while (true) {
    try {
      var response = UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/booking_ics.php?booking_id=${id}`);
      var fileBlob = response.getBlob()
      var subject = `[${id}] Booking Confirmation`
      var body = `
      ${EMAIL_HEAD}
      <p style="font-size: 20px;"> Hi there, 
      <br/><br/>
      A new booking - ${id} has been created for ${pax} pax at ${date} ${time}. Kindly refer to <a href="https://cactisucculentkuching.cf/viewbookings.php">https://cactisucculentkuching.cf/viewbookings.php</a> for the latest booking calendar. 
      <br/><br>
      Thanks,<br/>
      Cacti Succulent Kuching
      </p>`
      fileBlob.setName("invite.ics")
      GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body, attachments: [fileBlob]});
      return;
    } catch(err) {
      Logger.log(err);
    }
  }
}

function updateBookingUserEmail(email, id, date, time, pax) {
  while (true) {
    try {
      var response = UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/booking_ics.php?booking_id=${id}`);
      var fileBlob = response.getBlob()
      var subject = `[${id}] Booking Update`
      var body = `
      ${EMAIL_HEAD}
      <p style="font-size: 20px;"> Hi there, 
      <br/><br/>
      Your booking for ${pax} pax has been updated to ${date} ${time}. 
      <br/><br>
      Thanks,<br/>
      Cacti Succulent Kuching
      </p>`
      fileBlob.setName("invite.ics")
      GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body, attachments: [fileBlob]});
      return;
    } catch(err) {
      Logger.log(err);
    }
  }
}

function updateBookingAdminEmail(email, id, date, time, pax) {
  while (true) {
    try {
      var response = UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/booking_ics.php?booking_id=${id}`);
      var fileBlob = response.getBlob()
      var subject = `[${id}] Booking Update`
      var body = `
      ${EMAIL_HEAD}
      <p style="font-size: 20px;"> Hi there, 
      <br/><br/>
      The ${id} booking for ${pax} pax has been updated to ${date} ${time}. Kindly refer to <a href="https://cactisucculentkuching.cf/viewbookings.php">https://cactisucculentkuching.cf/viewbookings.php</a> for the latest booking calendar. 
      <br/><br>
      Thanks,<br/>
      Cacti Succulent Kuching
      </p>`
      fileBlob.setName("invite.ics")
      GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body, attachments: [fileBlob]});
      return;
    } catch(err) {
      Logger.log(err);
    }
  }
}

function cancelBookingUserEmail(email, id, date, time, pax) {
  while (true) {
    try {
      var response = UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/booking_ics.php?booking_id=${id}`);
      var fileBlob = response.getBlob()
      var subject = `[${id}] Booking Cancellation`
      var body = `
      ${EMAIL_HEAD}
      <p style="font-size: 20px;"> Hi there, 
      <br/><br/>
      Your booking for ${pax} pax at ${date} ${time} has been cancelled. 
      <br/><br>
      Thanks,<br/>
      Cacti Succulent Kuching
      </p>`
      fileBlob.setName("invite.ics")
      GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body, attachments: [fileBlob]});
      return;
    } catch(err) {
      Logger.log(err);
    }
  }
}

function cancelBookingAdminEmail(email, id, date, time, pax) {
  while (true) {
    try {
      var response = UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/booking_ics.php?booking_id=${id}`);
      var fileBlob = response.getBlob()
      var subject = `[${id}] Booking Cancellation`
      var body = `
      ${EMAIL_HEAD}
      <p style="font-size: 20px;"> Hi there, 
      <br/><br/>
      The ${id} booking for ${pax} pax at ${date} ${time} has been cancelled. Kindly refer to <a href="https://cactisucculentkuching.cf/viewbookings.php">https://cactisucculentkuching.cf/viewbookings.php</a> for the latest booking calendar. 
      <br/><br>
      Thanks,<br/>
      Cacti Succulent Kuching
      </p>`
      fileBlob.setName("invite.ics")
      GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body, attachments: [fileBlob]});
      return;
    } catch(err) {
      Logger.log(err);
    }
  }
}

function reminderEmail(email, id, date, time, pax) {
  while (true) {
    try {
      var response = UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/booking_ics.php?booking_id=${id}`);
      var fileBlob = response.getBlob();
      var subject = `[${id}] Booking Reminder`
      var body = `
      ${EMAIL_HEAD}
      <p style="font-size: 20px;">
      Hi there,
      <br/><br/>
      Just a friendly reminder that you have a booking for ${pax} pax at ${date} ${time}, which is in 30 minutes. 
      <br/><br/>
      See you then! 
      <br/><br/>
      Best Regards,<br/>
      Cacti Succulent Kuching
      </p>`;
      fileBlob.setName("invite.ics");
      GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body, attachments: [fileBlob]});
      return;
    } catch(err) {
      Logger.log(err);
    }
  }
}

function contentEmail(email, id, title, type) {
  var subject = `[${type}] ${title}`;
  var body = `
  ${EMAIL_HEAD}
  <p style="font-size: 20px;"> Hi there, 
  <br/><br/>
  There is a new ${type} from Cacti Succulent Kuching! Visit <a href="https://cactisucculentkuching.cf/content.php?id=${id}">https://cactisucculentkuching.cf/content.php?id=${id}</a> for more information!
  <br/><br>
  Thanks,<br/>
  Cacti Succulent Kuching</p>`
  GmailApp.sendEmail(email, subject, "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body});
}

function enquiryTicketCreationEmail(email, name, id, title, enquiry) {
  var subject = `[##${id}] ${title}`;
  var body = `
  ${EMAIL_HEAD}
  <p style="font-size: 20px;"> Hi ${name}, 
  <br/><br/>
  Thank you for contacting Cacti Succulent Kuching. We have received your enquiry and a ticket has been created within our system. One of our employees will look into and answer your enquiry within 2-3 working days.
  <br/><br/>
  Enquiry Information:<br/>
  ${enquiry}
  <br/><br/>
  Do not reply to this system generated email.
  <br/><br/>
  Thanks,<br/>
  Cacti Succulent Kuching</p>`
  GmailApp.sendEmail(email, subject.toString(), "", {from: GmailApp.getAliases()[0], name: SENDER_NAME, htmlBody: body});
}

function answerEnquiryEmail(email, name, id, title, reply) {
  var subject = `[##${id}] ${title}`;
  var searchResult = GmailApp.search(`subject:${subject.toString()}`);
  var body = `
  ${EMAIL_HEAD}
  <p style="font-size: 20px;"> Hi ${name}, 
  <br/><br/>
  ${reply}
  <br/><br>
  If you are unsatisfied with the reply, do contact us via live chat or reopen a new enquiry ticket.
  <br/><br/>
  Do not reply to this system generated email.
  <br/><br/>
  Thanks,<br/>
  Cacti Succulent Kuching</p>
  <br/>`;
  if (searchResult.length != 0) {
    var messages = searchResult[0].getMessages();
    var latest = messages[messages.length - 1];
    var regExp = /\<([^<]+)\>/;
    var matches = regExp.exec(latest.getFrom());
    body += `<div class="gmail_quote">${latest.getBody()}</div>`;
    if (matches[1] == GmailApp.getAliases()[0]) {
      latest.forward(email, {from: GmailApp.getAliases()[0], name: SENDER_NAME, subject:subject, htmlBody: body})
    } else {
      latest.reply("", {from: GmailApp.getAliases()[0], name: SENDER_NAME, subject:subject, htmlBody: body});
    }
  }    
}
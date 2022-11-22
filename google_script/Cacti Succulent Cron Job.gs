API_KEY = "EB3914D9F167D9A414DF438C7D4CD";

Date.prototype.addHours = function(h) {
  this.setTime(this.getTime() + (h*60*60*1000));
  return this;
}

function triggerBookingNotification() {
  while(true) {
    try {
      UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/reminder_trigger.php?key=${API_KEY}`);
      break;
    } catch (err) {
      Logger.log(err);
    }
  }
}

function testconnection() {
  UrlFetchApp.fetch(`https://cactisucculentkuching.cf/api/reminder_trigger.php?key=${API_KEY}`)
}

function cronJobTrigger() {
  clearPastTrigger()
  var now = new Date()
  now.setMinutes(0, 0, 0);
  now.setMinutes(now.getMinutes() + 90);
  ScriptApp.newTrigger("cronJobTrigger")
  .timeBased()
  .at(now)
  .create()
  triggerBookingNotification()
}

function testTime() {
  var now = new Date();
  now.setMinutes(0, 0, 0);
  now.setMinutes(now.getMinutes() + 90);
  Logger.log(now)
}

function createTrigger() {
  var test = new Date(2022, 10, 10, 1, 30)
  Logger.log(test)
  ScriptApp.newTrigger("cronJobTrigger")
    .timeBased()
    .at(test)
    .create()
}

function clearPastTrigger() {
  var triggers = ScriptApp.getProjectTriggers()
  for (var x=0; x < triggers.length; x++) {
    ScriptApp.deleteTrigger(triggers[x])
  }
}
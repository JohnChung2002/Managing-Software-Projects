const monthName = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

function getToday() {
    var date = new Date();
    return formatNewDate(date)
}

function getNewMonth(date) {
    var string = formatNewDate(date);
    return `${string.split('-')[0]}-${string.split('-')[1]}-01`;
}

function formatNewDate(date) {
    return date.toLocaleDateString("en-CA", {timeZone: "Asia/Kuala_Lumpur"})
}

function formatStringDate(date) {
    var newDate = new Date(date);
    return formatNewDate(newDate);
}

function disablePrevNextMonthDates(days_arr, date) {
    var newDate = new Date(date);
    var prevMonthDate = new Date(`${newDate.getFullYear()}-${newDate.getMonth()}-01`);
    while (prevMonthDate.toLocaleString('default', { month: 'long' }) == monthName[newDate.getMonth()-1]) {
        days_arr.push(new Date(prevMonthDate).toLocaleDateString("en-CA"));
        prevMonthDate.setDate(prevMonthDate.getDate() + 1);
    }
    var nextMonthDate = new Date(`${newDate.getFullYear()}-${newDate.getMonth()+2}-01`);
    while (nextMonthDate.toLocaleString('default', { month: 'long' }) == monthName[newDate.getMonth()+1]) {
        days_arr.push(new Date(nextMonthDate).toLocaleDateString("en-CA"))
        nextMonthDate.setDate(nextMonthDate.getDate() + 1);
    }
    return days_arr;
}

function updateDisabled(input_date) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/date_availability.php",
            data: {
                date: input_date,
            },
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    })
}

function updateMonth(date, inst) {
    updateDisabled(date).then(function(data) {
        disabledDates = disablePrevNextMonthDates(data, date);
        $(inst).datepicker('setDatesDisabled', disabledDates);
        hideNextPrevMonthDates();
    }).catch(err => console.log(err));
}

function retrieveSlots(input_date) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/slot_availability.php",
            data: {
                date: input_date,
            },
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    })
}

function updateSlots(date) {
    retrieveSlots(date).then(function(data) {
        var availableSlots = data;
        $('#available-slot').empty()
        for (var i = 0; i < availableSlots.length; i++) {
            $('#available-slot').append(new Option(availableSlots[i], availableSlots[i]))
        }
        hideNextPrevMonthDates();
    }).catch(err => console.log(err));
}

function hideNextPrevMonthDates() {
    $(".day.new").css("cssText", "display: none !important");
    $(".day.old").css("cssText", "visibility: hidden !important"); 
}

function loadDatePicker() {
    $('#datepicker-container').datepicker({
        datesDisabled: disabledDates,
        format: "yyyy-mm-dd",
        startDate: getToday(),
        updateViewDate: false,
        useCurrent: false
    })
    .on("changeMonth", function(e) {
        updateMonth(getNewMonth(e.date), this);
    })
    .on("changeDate", function(e) {
        updateSlots(formatStringDate(e.date));
    })
}
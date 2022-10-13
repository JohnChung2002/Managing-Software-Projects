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
        disabledDates = data;
        $(inst).datepicker('setDatesDisabled', disabledDates);
    });
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
    });
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
    .on('changeDate', function(e) {
        updateSlots(formatStringDate(e.date));
    })
}
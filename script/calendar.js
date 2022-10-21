var calendar; // global variable
function retrieveBookings(start_date, end_date) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/get_all_bookings.php",
            data: {
                start: start_date,
                end: end_date
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

function updateViewData(event) {
    var view = calendar.view;
    if (event == "next") {
        calendar.next();
    } else if (event == "prev") {
        calendar.prev();
    } else if (event == "today") {
        calendar.today();
    }
    var start = view.activeStart.toLocaleDateString("en-CA", {timeZone: "Asia/Kuala_Lumpur"});
    var end = view.activeEnd.toLocaleDateString("en-CA", {timeZone: "Asia/Kuala_Lumpur"});
    var sources = calendar.getEventSources();
    sources.forEach(function (source) {
        source.remove();
    });
    retrieveBookings(start, end).then(function (result) {
        calendar.addEventSource(result);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'timeGridWeek',
    timeZone: 'Asia/Kuala_Lumpur',
    headerToolbar: {
        right : 'today prev,next',
    },
    slotEventOverlap : false,
    customButtons: {
        next : {
            click: function() {
                updateViewData("next");
            }
        },
        prev : {
            click: function() { 
                updateViewData("prev");

            }
        },
        today : {
            text: "Today",
            click: function() { 
                updateViewData("today");
            }
        }
    }
    });
    calendar.render();
    updateViewData();
});
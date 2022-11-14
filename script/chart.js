const monthName = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

const currentMonth = new Date().toLocaleString('default', {month: 'long'});

currentyear = new Date().getFullYear();

function getDate(){
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("current_date").innerHTML = month + "/" + day + "/" + year;
}

function getWeekObject(week_obj) {
    const defaultObj = {"Sunday": 0,"Monday": 0,"Tuesday": 0,"Wednesday": 0,"Thursday": 0,"Friday": 0,"Saturday": 0}
    return Object.entries(week_obj).reduce((acc, [key, value]) => 
        ({ ...acc, [key]: (acc[key] || 0) + value })
        , { ...defaultObj });
}

function getDaysInMonthObject(month_obj, month_name, year) {
    if (month_name !== undefined && year !== undefined) {
        var date = new Date(`${month_name} 01 ${year}`);
        var days = {};
        while (date.toLocaleString('default', { month: 'long' }) === month_name) {
            days[new Date(date).toLocaleDateString("en-CA")] = 0;
            date.setDate(date.getDate() + 1);
        }
        return Object.entries(month_obj).reduce((acc, [key, value]) => 
            ({ ...acc, [key]: (acc[key] || 0) + value })
            , { ...days });
    } else {
        return month_obj;
    }
}

function getHoursInDay(day_obj) {
    var hours = {};
    for (var i = 0; i < 24; i++) {
        hours[`${i.toString().padStart(2, '0')}:00:00`] = 0;
    }
    return Object.entries(day_obj).reduce((acc, [key, value]) => 
        ({ ...acc, [key]: (acc[key] || 0) + value })
        , { ...hours });
}

function getMonthsInYearObject(year_obj) {
    var months = {};
    for (var i = 0; i < 12; i++) {
        months[monthName[i]] = 0;
    }
    return Object.entries(year_obj).reduce((acc, [key, value]) => 
        ({ ...acc, [key]: (acc[key] || 0) + value })
        , { ...months });
}

function getDayStatistic(month_name, year) {
    if (month_name !== undefined && year !== undefined) {
        query_data = {month_name: month_name, year: year}
    } else if (month_name !== undefined) {
        query_data = {month_name: month_name}
    } else if (year !== undefined) {
        query_data = {year: year}
    } else {
        query_data = {}
    }
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/day_statistics.php",
            data: query_data,
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    })
}

function getMonthStatistic(month_name, year) {
    if (month_name !== undefined && year !== undefined) {
        query_data = {month_name: month_name, year: year}
    }
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/month_statistics.php",
            data: query_data,
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    });
}

function getTimeStatistic(month_name, year, day_name, date) {
    if (month_name !== undefined && year !== undefined) {
        query_data = {month_name: month_name, year: year}
    } else if (month_name !== undefined) {
        query_data = {month_name: month_name}
    } else if (year !== undefined) {
        query_data = {year: year}
    } else if (day_name !== undefined) {
        query_data = {day_name: day_name}
    } else if (date !== undefined) {
        query_data = {date: date}
    } else {
        query_data = {}
    }
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/time_statistics.php",
            data: query_data,
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    })
}

function getYearStatistic(year) {
    if (year !== undefined) {
        query_data = {year: year}
    } else {
        query_data = {}
    }
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/year_statistics.php",
            data: query_data,
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    })
}

// displays amount of bookings per day in a week format
function initialiseDayChart() {
    //month_name="October"
    getDayStatistic().then(function(data) {
        var week_obj = getWeekObject(data);
        var chartData = [];
        for (const [key, value] of Object.entries(week_obj)) {
            chartData.push({x: key, y: value});
        }
        new Chart("DayChart", {
            type: "line",
            data: {
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgb(65,83,54)",
                borderColor: "rgb(65,83,54)",
                label: "Number of Bookings",
                data: chartData
            }]
            },
            options: {
                scales: {
                    y: {beginAtZero: true}
                },
                ticks: {
                    stepSize: 1
                }
            }
        });
    }).catch(err => console.log(err));
    
};

//displays number of bookings in dates in a specific month
function initialiseMonthChart() {
    getMonthStatistic(month_name=currentMonth, year=currentyear).then(function(data) {
        var month_obj = getDaysInMonthObject(data, month_name, year);
        var chartData = [];
        for (const [key, value] of Object.entries(month_obj)) {
            chartData.push({x: key, y: value});
        }
        new Chart("MonthChart", {
            type: "line",
            data: {
              datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgb(65,83,54)",
                borderColor: "rgb(65,83,54)",
                label: "Number of Bookings",
                data: chartData
              }]
            },
            options: {
                scales: {
                    y: {beginAtZero: true}
                },
                ticks: {
                    stepSize: 1
                }
            }
          });
    }).catch(err => console.log(err));
    
}

// number of bookings each time
function initialiseTimeChart() {
    getTimeStatistic().then(function(data) {
        var day_obj = getHoursInDay(data);
        var chartData = [];
        for (const [key, value] of Object.entries(day_obj)) {
            chartData.push({x: key, y: value});
        }
        new Chart("TimeChart", {
            type: "line",
            data: {
              datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgb(65,83,54)",
                borderColor: "rgb(65,83,54)",
                label: "Number of Bookings",
                data: chartData
              }]
            },
            options: {
                scales: {
                    y: {beginAtZero: true}
                },
                ticks: {
                    stepSize: 1
                }
            }
          });
    }).catch(err => console.log(err));
}

// displays number of bookings per month
function initialiseYearChart() {
    getYearStatistic(year=2022).then(function(data) {
        var regex = /\d/;   
        if (regex.test(Object.keys(data)[0])) {
            year_obj = data;
        } else {
            year_obj = getMonthsInYearObject(data, year);
        }
        var chartData = [];
        for (const [key, value] of Object.entries(year_obj)) {
            chartData.push({x: key, y: value});
        }
        new Chart("YearChart", {
            type: "line",
            data: {
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgb(65,83,54)",
                borderColor: "rgb(65,83,54)",
                label: "Number of Bookings",
                data: chartData
            }]
            },
            options: {
                scales: {
                    y: {beginAtZero: true}
                },
                ticks: {
                    stepSize: 1
                }
            }
        });
    }).catch(err => console.log(err));
    
}
const emailRegex = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

function checkUserExist(input_email) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/get_user_info.php",
            data: {
                email: input_email,
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

function loadUser() {
    var user_email = document.getElementById("check-user");
    user_email.removeAttribute('class');
    user_email.style.marginTop = "-8px";
    var email = $('#email').val();
    if (emailRegex.test(email)) {
        checkUserExist(email).then(function(data) {
            $('#name').val(data.name);
            $('#gender').val(data.gender);
            $('#phone').val(data.phone_number);
            user_email.innerText = "User found!";
            user_email.classList.add("valid-feedback");
            user_email.style.display = "block";
        }).catch(function () {
            user_email.innerText = "User not found! Please fill in the details below.";
            user_email.classList.add("invalid-feedback");
            user_email.style.display = "block";
        });
    } else {
        user_email.innerText = "Invalid email!";
        user_email.classList.add("invalid-feedback");
        user_email.style.display = "block";
    }
}
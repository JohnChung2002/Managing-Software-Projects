function checkRadio() {
    var selects = document.getElementsByName("custom-option");
    for (var i = 0; i < selects.length; i++) {
        if (selects[i].checked) {
            return selects[i].id;
        }
    }
    return false;
}

var forms = document.querySelectorAll('.needs-validation')
Array.prototype.slice.call(forms)
.forEach(function (form) {
    form.addEventListener('submit', function(event) {
        var select = checkRadio()
        if (select !== false) {
            if (select == "open-with-no-breaks") {
                checkClosing1();
            } else if (select == "open-with-one-break") {
                checkClosing2();
            }
        }
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    })
});
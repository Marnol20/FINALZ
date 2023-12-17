function submitForm(event) {
    event.preventDefault();

    var formData = new FormData(document.getElementById('signupForm'));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('result').innerHTML = this.responseText;
        }
    };

    xhr.open("POST", "signup.php", true);
    xhr.send(formData);
}
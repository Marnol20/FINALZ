function submitLoginForm() {
    var formData = new FormData(document.getElementById('loginForm'));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                var response = JSON.parse(this.responseText);
                document.getElementById('result').innerHTML = response.message;
                if (response.success) {
                    
                    window.location.href = "dashboard.html";
                }
            } else {
                console.error("Error: " + this.status);
            }
        }
    };

    xhr.open("POST", "login.php", true);
    xhr.send(formData);
    
}


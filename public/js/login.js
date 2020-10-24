var http = new XMLHttpRequest()
http.onreadystatechange = function() {
    if (this.readyState === 4) {
        if (this.responseText === "ok") {
            document.getElementById("login-form").submit()
        } else {
            document.getElementById("fail-upload").innerText = "Wrong username / password."
        }
    }
}
document.getElementById("login-button").addEventListener("click", () => {    
    var username = document.getElementById("username").value
    var password = document.getElementById("password").value
    if (username && password) {
        document.getElementById("fail-upload").innerText = ""
        http.open("GET", `login-api.php?username=${username}&password=${password}`)
        http.send()
    } else {
        document.getElementById("fail-upload").innerText = "Please fill all your form."
    }
})
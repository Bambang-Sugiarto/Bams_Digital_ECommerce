document.querySelector("#showPw").addEventListener("click", () => {
    let pw = document.querySelector("#PW");
    if (pw.type == "text") {
        pw.type = "password"
    } else {
        pw.type = "text"
    }
});

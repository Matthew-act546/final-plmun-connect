const backToTopButton = document.getElementById("backToTop");

window.onscroll = function () {
if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 300) {
    backToTopButton.style.display = "block"; // Show button when scrolled 300px
} else {
    backToTopButton.style.display = "none"; // Hide button when near top
}
};

backToTopButton.onclick = function () {
    window.scrollTo({ top: 0, behavior: "smooth" }); // Smooth scroll to top
};

// EMAIL AJAX

document.getElementById("exampleInputEmail1").addEventListener("keyup", function () {
    const email = this.value;
    const message = document.getElementById("email-msg");

if (email.length > 5) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "check_email.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.responseText === "exists") {
        message.innerText = "This email is already registered.";
        } else {
        message.innerText = "";
        }
};
    xhr.send("email=" + encodeURIComponent(email));
} else {
    message.innerText = "";
}
});

// for email only :)
// document.getElementById("exampleInputEmail1").addEventListener("submit", function(event) {
//     const emailInput = document.getElementById("exampleInputEmail1").value;
//     const domainPattern = /^[a-zA-Z0-9._%+-]+@plmun\.edu\.ph$/;

//     if (!domainPattern.test(emailInput)) {
//         alert("Only @plmun.edu.ph emails are allowed!");
//         event.preventDefault(); // Prevent form submission
//     }
// });
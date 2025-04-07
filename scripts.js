document.getElementById("signupForm").addEventListener("submit", function (e) {
  e.preventDefault(); // stop default form submission

  const emailField = document.getElementById("exampleInputEmail1");
  const email = emailField.value.trim();
  const message = document.getElementById("email-msg");

  // Check if email is a @plmun.edu.ph email
  const plmunPattern = /^[a-zA-Z0-9._%+-]+@plmun\.edu\.ph$/;
  if (!plmunPattern.test(email)) {
    message.innerText = "Only @plmun.edu.ph email addresses are allowed.";
    return;
  }

});

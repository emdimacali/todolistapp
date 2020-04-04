const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/; //at least 8 characters with at least one lowercase, at least one uppercase and at least one digit

let registrationMessageDiv = document.getElementById("registration-message");
let registerButton = document.getElementById("register");

/*Execute these on load of js in html*/
checkIfUserAlreadyExists();
/*End of execution on load of js in html*/

function checkPasswordStrength(passwordInput) {
  //if password now passes the regex test.
  if (passwordRegex.test(passwordInput)) {
    clearRegistrationMessage();
    registerButton.disabled = false;
  } else {
    registerButton.disabled = true;
    clearRegistrationMessage();
    let msg = document.createTextNode(
      "Password should be at least 8 characters long and contain at least one lowercase letter, one uppercase letter and one digit."
    );
    registrationMessageDiv.appendChild(msg);
  }
}

function checkIfUserAlreadyExists() {
  if (fetchedRows > 0) {
    //a user is found matching the email
    let msg = document.createTextNode("Email already exists.");
    registrationMessageDiv.appendChild(msg);

    let loginTag = document.createElement("p");
    loginTag.innerHTML =
      'Would you like to <a href="login.php">login</a> instead?';
    registrationMessageDiv.appendChild(loginTag);
  }
}

function clearRegistrationMessage() {
  registrationMessageDiv.innerHTML = "";
}

let loginMessageDiv = document.getElementById("login-message");

checkIfUserExistsInDb();

function checkIfUserExistsInDb() {
  if (fetchedRows == 0) {
    let msg = document.createTextNode("User does not exist.");
    loginMessageDiv.appendChild(msg);

    let registerTag = document.createElement("p");
    registerTag.innerHTML =
      'Would you like to <a href="register.php">register</a> instead?';
    loginMessageDiv.appendChild(registerTag);
  }
}

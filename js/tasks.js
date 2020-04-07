let tasksMessageDiv = document.getElementById("tasks-message");

if (isEmpty) {
  let msg = document.createTextNode("Task cannot be left blank.");
  tasksMessageDiv.appendChild(msg);
}

function clearTasksMessageDiv() {
  tasksMessageDiv.innerHTML = "";
}

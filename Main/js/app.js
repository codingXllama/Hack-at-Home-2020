//Selecting the Required Elements

const resetBtn = document.querySelector(".reset");
const curDate = document.getElementById("currentDate");
const curTime = document.getElementById("currentTime");
const myList = document.getElementById("list");
const userInput = document.getElementById("userInput");

// Selecting All the required class names
const check_Icon = "fa-check-circle";
const uncheck_Icon = "fa-circle";
const lineThrough_Icon = "lineThrough";

// storing the function return values
let LIST, id;

// get item from local storage
let data = localStorage.getItem("TODO");

// Checking if there is some data in the local storage
if (data) {
  LIST = JSON.parse(data);
  id = LIST.length; //set the id to the last one in the list
  loadList(LIST); //loading the list to the UI
} else {
  // if data isn't empty
  LIST = [];
  id = 0;
}

// load items to the user's interface

function loadList(array) {
  array.forEach(function (item) {
    addTask(item.name, item.id, item.done, item.trash);
  });
}

// clearing the local storage
resetBtn.addEventListener("click", function () {
  localStorage.clear();
  location.reload();
});

// Showing todays date
const todaysDate = new Date();

const dateSettings = {
  weekday: "short",
  month: "short",
  day: "numeric",
  year: "numeric",
  hour: "numeric",
};

// Displaying the current date
curDate.innerHTML = todaysDate.toLocaleDateString("en-US", dateSettings);

// Creating the add task function
function addTask(someTask, id, done, trash) {
  //   preventing the item code to work
  if (trash) {
    return;
  }

  const taskProgress = done ? check_Icon : uncheck_Icon;
  const lineThrough = done ? lineThrough_Icon : "";

  const item = `
    <li class="item">
        <i class="far ${taskProgress} co" job="complete" id="${id}"></i>
        <p class="text ${lineThrough}">${someTask}</p>
        <i class="fas fa-trash de" job="delete" id="${id}"></i>
         
    </li>
    
    `;
  const position = "beforeend";
  myList.insertAdjacentHTML(position, item);
}

// addTask("dRINK COSS");

//adding an item from user input when they press the enter key

document.addEventListener("keyup", function (evt) {
  if (evt.keyCode == 13) {
    // getting the new task from the userinput bar, by accessing it's value
    const newTask = userInput.value;
    if (newTask) {
      addTask(newTask, id, false, false);

      // adding an item to our LIST object
      LIST.push({
        name: newTask,
        id: id,
        done: false,
        trash: false,
      });

      // adding the item to the localstorage ( this code must be added where the LIST array is updated )
      localStorage.setItem("TODO", JSON.stringify(LIST));

      // changing the storage posn for the next item
      id += 1;
    }
    //Clearing the input section
    userInput.value = "";
  }
});

// function for adding task completion icon
function completeTask(elem) {
  elem.classList.toggle(check_Icon);
  elem.classList.toggle(uncheck_Icon);
  elem.parentNode.querySelector(".text").classList.toggle(lineThrough_Icon);

  // updating the list array
  LIST[elem.id].done = LIST[elem.id].done ? false : true;
}

// function for removing a task upon completion
function removeTask(elem) {
  elem.parentNode.parentNode.removeChild(elem.parentNode);
  LIST[elem.id].trash = true;
}

// creating an event listener that listens the event of the task being selected directly
myList.addEventListener("click", function (evt) {
  const selectedElement = evt.target; // returning the clicked element inside the list
  const selectedElement_Job = selectedElement.attributes.job.value; // to check for complete or delete

  if (selectedElement_Job == "complete") {
    completeTask(selectedElement);
  } else if (selectedElement_Job == "delete") {
    removeTask(selectedElement);
  }

  // adding the item to the localstorage ( this code must be added where the LIST array is updated )
  localStorage.setItem("TODO", JSON.stringify(LIST));
});

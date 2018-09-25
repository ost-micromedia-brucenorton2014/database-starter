// database.js
console.log('js/dabase.js loaded');
//display info from starter db users table

function displayUsers(){
  let xhr = new XMLHttpRequest();
  xhr.open('GET', 'app/display.php');
  xhr.send(null);

  //console.log(galleryNode);
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
      console.log(xhr.responseText); // 'This is the returned text.'
      displayJSON(xhr.responseText);
      usersList(JSON.parse(xhr.responseText));
    } else {
      console.log('Error: ' + xhr.status); // An error occurred during the request.
    }
  };
}

//add the raw JSON to the page
const displayNode = document.querySelector('#display-json');
function displayJSON(json){
  displayNode.innerHTML = json;

}

displayUsers();

//make the raw JSON pretty
const usersListNode = document.querySelector('#users-list');
function usersList(json){
  usersListNode.innerHTML = '';
  let ul = document.createElement('ul');
  //loop through each user in the database
  json.forEach(function(user){
    console.log(user);
    let li = document.createElement('li');
    li.innerHTML = user.name + ' likes the colour ' + user.colour;
    ul.appendChild(li);
  });
  //append the list to the ul element
  usersListNode.appendChild(ul);
}

//form submit function
const formSection = document.querySelector('#form-section');
const starterForm = document.querySelector('#starter-form');

starterForm.addEventListener("submit", function(event) {
  event.preventDefault();
  let formData = new FormData(starterForm);

  //you can delete this loop... used for testing
  for (var input of formData.entries()) {
    console.log(input[0]+ ': ' + input[1]); 
  }
  formSection.innerHTML = 'updating database...';
  //comment out submitForm() function for testing
  submitForm(formData);
});

function submitForm(formData){
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'app/insert.php');
  xhr.send(formData);

  //console.log(galleryNode);
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
      console.log(xhr.responseText); // 'This is the returned text.'
      formSection.innerHTML = "Thank you. Your info has been added.";
      displayUsers();
    } else {
      console.log('Error: ' + xhr.status); // An error occurred during the request.
    }
  };

}


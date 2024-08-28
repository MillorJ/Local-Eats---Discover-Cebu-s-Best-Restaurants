function deleteRestaurant(id) {
    // Prompt the user to confirm the deletion
    if (confirm("Are you sure you want to delete this restaurant?")) {
      // Send an AJAX request to the delete_restaurant.php script
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Reload the page to reflect the changes
          location.reload();
        }
      };
      xhr.open("POST", "../php/delete_restaurant.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("id=" + id);
    }
  }
  /*
  function editRestaurant(id) {
    // Get the form elements for editing the restaurant
    console.log("Passed ID is: " + id);
    console.log("THis function is called properly");
    var name = prompt("Enter the new name:");
    var address = prompt("Enter the new address:");
    var city = prompt("Enter the new city:");
    var state = prompt("Enter the new state:");
    var zip_code = prompt("Enter the new zip code:");
    var phone_number = prompt("Enter the new phone number:");
    var website = prompt("Enter the new website:");
    var description = prompt("Enter the new description:");
    var image_url = prompt("Enter the new image URL:");
    
    // Send an AJAX request to the edit_restaurant.php script
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Reload the page to reflect the changes
        location.reload();
      }
    };
    xhr.open("POST", "../php/edit_restaurant.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id + "&name=" + name + "&address=" + address + "&city=" + city + "&state=" + state + "&zip_code=" + zip_code + "&phone_number=" + phone_number + "&website=" + website + "&description=" + description + "&image_url=" + image_url);
  }*/

  // Define a function to edit a restaurant by its id 
// Define a function to edit a restaurant by its id
function editRestaurant(id) {
  // Get the row element that corresponds to the id
  var row = document.querySelector("tr[data-id='" + id + "']");
  // Get the table cells that contain the restaurant data
  var cells = row.querySelectorAll("td");
  // Create an object to store the current values of the restaurant data
  var restaurant = {
    name: cells[0].textContent,
    address: cells[1].textContent,
    city: cells[2].textContent,
    state: cells[3].textContent,
    zip_code: cells[4].textContent,
    phone_number: cells[5].textContent,
    website: cells[6].textContent,
    description: cells[7].textContent,
    image_url: cells[8].textContent
  };
  // Create a modal element using Bootstrap v5.3
  var modal = document.createElement("div");
  modal.className = "modal fade";
  modal.id = "edit-modal";
  modal.tabIndex = "-1";
  modal.setAttribute("aria-labelledby", "edit-modal-label");
  modal.setAttribute("aria-hidden", "true");
  // Create a modal dialog element
  var modalDialog = document.createElement("div");
  modalDialog.className = "modal-dialog";
  // Create a modal content element
  var modalContent = document.createElement("div");
  modalContent.className = "modal-content";
  // Create a modal header element
  var modalHeader = document.createElement("div");
  modalHeader.className = "modal-header";
  // Create a modal title element
  var modalTitle = document.createElement("h5");
  modalTitle.className = "modal-title";
  modalTitle.id = "edit-modal-label";
  modalTitle.textContent = "Edit Restaurant";
  // Create a modal close button element
  var modalCloseButton = document.createElement("button");
  modalCloseButton.type = "button";
  modalCloseButton.className = "btn-close";
  modalCloseButton.setAttribute("data-bs-dismiss", "modal");
  modalCloseButton.setAttribute("aria-label", "Close");
  // Append the title and the close button to the header
  modalHeader.appendChild(modalTitle);
  modalHeader.appendChild(modalCloseButton);
  // Create a modal body element
  var modalBody = document.createElement("div");
  modalBody.className = "modal-body";
  // Create a form element
  var form = document.createElement("form");
  form.id = "edit-form";
  // Loop through the restaurant object keys and create a form group for each one
  for (var key in restaurant) {
    // Create a form group element
    var formGroup = document.createElement("div");
    formGroup.className = "mb-3";
    // Create a label element
    var label = document.createElement("label");
    label.htmlFor = key;
    label.className = "form-label";
    label.textContent = key.charAt(0).toUpperCase() + key.slice(1);
    // Create an input element
    var input = document.createElement("input");
    input.type = "text";
    input.id = key;
    input.name = key;
    input.className = "form-control";
    input.value = restaurant[key];
    // Append the label and the input to the form group
    formGroup.appendChild(label);
    formGroup.appendChild(input);
    // Append the form group to the form
    form.appendChild(formGroup);
  }
  // Append the form to the modal body
  modalBody.appendChild(form);
  // Create a modal footer element
  var modalFooter = document.createElement("div");
  modalFooter.className = "modal-footer";
  
}

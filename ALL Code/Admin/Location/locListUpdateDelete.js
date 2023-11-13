// JavaScript for showing and hiding the pop-up window
var addLocButton = document.getElementById('addLocButton');
var addLocModal = document.getElementById('addLocModal');
var closeModal = document.getElementById('closeModal');

addLocButton.addEventListener('click', function () {
    addLocModal.style.display = 'block';
});

closeModal.addEventListener('click', function () {
    addLocModal.style.display = 'none';
});

// Close the modal if the user clicks outside of it
window.addEventListener('click', function (event) {
    if (event.target == addLocModal) {
        addLocModal.style.display = 'none';
    }
});





// Update popup cancel button

var editLocModal = document.getElementById('editLocModal');
var closeEditModal = document.getElementById('closeEditModal');
closeEditModal.addEventListener('click', function () {
    editLocModal.style.display = 'none';
});



// document.getElementById("editBusForm").addEventListener("submit", function (event) {
//     event.preventDefault(); // Prevent the default form submission
//     // Add any client-side validation or processing here if needed
//     this.submit(); // Submit the form
// });


// Function to open the edit modal with existing data
function editLoc(locId) {
    // Fetch bus data using AJAX and populate the edit modal fields
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_loc_data.php?loc_id=" + locId, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var locData = JSON.parse(xhr.responseText);
            document.getElementById("editLocId").value = locData.loc_id;
            document.getElementById("editLocName").value = locData.loc_name;
            document.getElementById("editdistrict").value = locData.district;
            document.getElementById("editdivision").value = locData.division;
            document.getElementById("editcountry").value = locData.country;
            document.getElementById("editlocImage").value = locData.loc_image;

            // Show the edit modal
            editLocModal.style.display = 'block';
        }
    };
    xhr.send();
}


// old delete operation......................

/*
// Function to confirm and delete a bus entry
function confirmDelete(busId) {
    if (confirm("Are you sure you want to delete this bus entry?")) {
        // Send an AJAX request to delete the bus entry from the database
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_bus.php?bus_id=" + busId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page or update the bus list without the deleted entry
                location.reload(); // Reload the page for simplicity
            }
        };
        xhr.send();
    }
}*/




//For delete confirm box..........

   function confirmDelete(locId) {
    showConfirm("Are you sure you want to Delete?", function (result) {
        if (result) {
           var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_loc.php?loc_id=" + locId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page or update the loc list without the deleted entry
                location.reload(); // Reload the page for simplicity
            }
        };
        xhr.send();
        } else {
            // Handle "No" button click 
        }
    });
};

function showConfirm(message, callback) {
    const confirmDialog = document.getElementById("confirmDialog");
    const confirmMessage = document.getElementById("confirmMessage");
    const confirmYes = document.getElementById("confirmYes");
    const confirmNo = document.getElementById("confirmNo");

    confirmMessage.textContent = message;
    confirmDialog.style.display = "block";

    confirmYes.addEventListener("click", () => {
        callback(true);
        confirmDialog.style.display = "none";
    });

    confirmNo.addEventListener("click", () => {
        callback(false);
        confirmDialog.style.display = "none";
    });
}
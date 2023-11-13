// JavaScript for showing and hiding the pop-up window
var addBusButton = document.getElementById('addBusButton');
var addBusModal = document.getElementById('addBusModal');
var closeModal = document.getElementById('closeModal');

addBusButton.addEventListener('click', function () {
    addBusModal.style.display = 'block';
});

closeModal.addEventListener('click', function () {
    addBusModal.style.display = 'none';
});

// Close the modal if the user clicks outside of it
window.addEventListener('click', function (event) {
    if (event.target == addBusModal) {
        addBusModal.style.display = 'none';
    }
});





// Update popup cancel button

var editBusModal = document.getElementById('editBusModal');
var closeEditModal = document.getElementById('closeEditModal');
closeEditModal.addEventListener('click', function () {
    editBusModal.style.display = 'none';
});



// document.getElementById("editBusForm").addEventListener("submit", function (event) {
//     event.preventDefault(); // Prevent the default form submission
//     // Add any client-side validation or processing here if needed
//     this.submit(); // Submit the form
// });


// Function to open the edit modal with existing data
function editBus(busId) {
    // Fetch bus data using AJAX and populate the edit modal fields
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_bus_data.php?bus_id=" + busId, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var busData = JSON.parse(xhr.responseText);
            document.getElementById("editBusId").value = busData.bus_id;
            document.getElementById("editBusName").value = busData.bus_name;
            document.getElementById("editstartingPoint").value = busData.starting_point;
            document.getElementById("editendingPoint").value = busData.ending_point;
            document.getElementById("editdepartureTime").value = busData.departure_time
            document.getElementById("editreachedTime").value = busData.reached_time;
            document.getElementById("editbusFare").value = busData.bus_fare;
            document.getElementById("editbusImage").value = busData.bus_image;

            // Show the edit modal
            editBusModal.style.display = 'block';
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

   function confirmDelete(busId) {
    showConfirm("Are you sure you want to Delete?", function (result) {
        if (result) {
           var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_bus.php?bus_id=" + busId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page or update the bus list without the deleted entry
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
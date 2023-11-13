
// Update popup cancel button

var editBookingModal = document.getElementById('editBookingModal');
var closeEditModal = document.getElementById('closeEditModal');
closeEditModal.addEventListener('click', function () {
    editBookingModal.style.display = 'none';
});



function editBus(bookingId) {
    // Populate the edit modal field with the bookingId
    document.getElementById("booking_id").value = bookingId;

    // Show the edit modal
    editBookingModal.style.display = 'block';
}






//For delete confirm box..........

function confirmDelete(bookingId) {
    showConfirm("Are you sure you want to Delete?", function (result) {
        if (result) {
           var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_booking.php?booking_id=" + bookingId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page or update the booking list without the deleted entry
                location.reload(); 
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





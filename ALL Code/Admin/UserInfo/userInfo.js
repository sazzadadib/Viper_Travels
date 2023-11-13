
// Update popup cancel button

var edituserModal = document.getElementById('edituserModal');
var closeEditModal = document.getElementById('closeEditModal');
closeEditModal.addEventListener('click', function () {
    edituserModal.style.display = 'none';
});



function editUser(username) {

    document.getElementById("username").value = username;


    edituserModal.style.display = 'block';
}






//For delete confirm box..........

function confirmDelete(username) {
    showConfirm("Are you sure you want to Delete?", function (result) {
        if (result) {
           var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_user.php?username=" + username, true);
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





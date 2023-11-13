// Update popup cancel button

var addRoomButton = document.getElementById('addRoomButton');
var addRoomModal = document.getElementById('addRoomModal');
var closeModal = document.getElementById('closeModal');

addRoomButton.addEventListener('click', function () {
    addRoomModal.style.display = 'block';
});

closeModal.addEventListener('click', function () {
    addRoomModal.style.display = 'none';
});

// Close the modal if the user clicks outside of it
window.addEventListener('click', function (event) {
    if (event.target == addRoomModal) {
        addRoomModal.style.display = 'none';
    }
});



var editRoomModal = document.getElementById('editRoomModal');
var closeEditModal = document.getElementById('closeEditModal');
closeEditModal.addEventListener('click', function () {
    editRoomModal.style.display = 'none';
});




function editRoom(type_name) {
    // Fetch Room data using AJAX and populate the edit modal fields
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_room_data.php?type_name=" + type_name, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var roomData = JSON.parse(xhr.responseText);
            document.getElementById("editRoomtype").value = roomData.type_name;
            document.getElementById("editMaxPers").value = roomData.max_pers;
            document.getElementById("editprice").value = roomData.price;
            document.getElementById("editroomImage").value = roomData.room_image;

            // Show the edit modal

            editRoomModal.style.display = 'block';

        }
    };
    xhr.send();
}









//For delete confirm box..........

function confirmDelete(roomtype) {
    showConfirm("Are you sure you want to Delete?", function (result) {
        if (result) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "delete_room.php?type_name=" + roomtype, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
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



// JavaScript for showing and hiding the pop-up window
var addHotelButton = document.getElementById('addHotelButton');
var addHotelModal = document.getElementById('addHotelModal');
var closeModal = document.getElementById('closeModal');

addHotelButton.addEventListener('click', function () {
    addHotelModal.style.display = 'block';
});

closeModal.addEventListener('click', function () {
    addHotelModal.style.display = 'none';
});

// Close the modal if the user clicks outside of it
window.addEventListener('click', function (event) {
    if (event.target == addHotelModal) {
        addHotelModal.style.display = 'none';
    }
});





// Update popup cancel button

var editHotelModal = document.getElementById('editHotelModal');
var closeEditModal = document.getElementById('closeEditModal');
closeEditModal.addEventListener('click', function () {
    editHotelModal.style.display = 'none';
});



function editHotel(hotelId) {
    // Fetch hotel data using AJAX and populate the edit modal fields
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_hotel_data.php?hotel_id=" + hotelId, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var hotelData = JSON.parse(xhr.responseText);
            document.getElementById("editHotelId").value = hotelData.hotel_id;
            document.getElementById("editHotelName").value = hotelData.hotel_name;
            document.getElementById("edithotelLoc").value = hotelData.hotel_loc;
            document.getElementById("editlocDistrict").value = hotelData.loc_district;
            document.getElementById("editstandard").value = hotelData.Standard;
            document.getElementById("edithotelImage").value = hotelData.hotel_image;

            // Show the edit modal
            editHotelModal.style.display = 'block';
        }
    };
    xhr.send();
}





//For delete confirm box..........

function confirmDelete(hotelId) {
    showConfirm("Are you sure you want to Delete?", function (result) {
        if (result) {
           var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_hotel.php?hotel_id=" + hotelId, true);
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





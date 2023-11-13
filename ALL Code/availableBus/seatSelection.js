document.addEventListener('DOMContentLoaded', function () {
    const seats = document.querySelectorAll('.seat');
    const selectedSeats = [];

    seats.forEach((seat) => {
        seat.addEventListener('click', function () {
            if (!seat.classList.contains('selected')) {
                if (selectedSeats.length < 5) { 
                    seat.classList.add('selected');
                    selectedSeats.push(seat.dataset.seatNumber);
                } else {
                    alert('You can select up to 5 seats.');
                }
            } else {
                seat.classList.remove('selected');
                const index = selectedSeats.indexOf(seat.dataset.seatNumber);
                if (index !== -1) {
                    selectedSeats.splice(index, 1);
                }
            }
        });
    });

    const bookButton = document.getElementById('bookButton');
    bookButton.addEventListener('click', function () {
        if (selectedSeats.length === 0) {
            alert('Please select at least one seat.');
        } else {
            
            console.log('Selected Seats:', selectedSeats);

            
            console.log("Sending data:", JSON.stringify({ selectedSeats: selectedSeats }));

            fetch('book_seat.php', { 
                method: 'POST',
                body: JSON.stringify({
                    selectedSeats: selectedSeats,
                }),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log("Response received:", data); 

                    if (data.success) {
                        alert('Seats booked successfully!');
                        window.location.href = '../index.php';
                    } else {
                        if (data.message === 'Seat already Booked!') {
                            alert('Seat already booked!');
                        } else {
                            alert('Booking failed. Please try again.');
                        }
                    }
                })
                .catch((error) => {
                    console.error("Error:", error); 
                });

        }
    });
});
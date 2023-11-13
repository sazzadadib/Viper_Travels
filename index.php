<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Viper Travels</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/616/616487.png">

</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="content">
        <div class="contentitem">

            <h1>Welcome to Viper Travels </h1>
            <h3>Travel with Snake🐍</h3>
            <form class="search-form" action="searchResult/searchRList.php" method="POST">
                <div class="allbox">
                    <div class="inputall">

                        <div class="input-group">
                            <label for="from">From:</label>

                            <input type="text" name="from" placeholder="City or Location" autocomplete="off" required>
                        </div>
                        <div class="input-group">
                            <label for="to">To:</label>
                            <input type="text" name="to" placeholder="City or Location" autocomplete="off" required>
                        </div>
                        <div class="input-group">
                            <label for="date">Date:</label>
                            <input type="date" name="date" required>
                        </div>
                        <div class="input-group">
                            <label for="transport-type">Transport Type:</label>
                            <select id="transport-type" name="transport_type">
                                <option value="bus">Bus</option>
                                <option value="plane">Plane</option>
                                <option value="train">Train</option>
                            </select>
                        </div>
                    </div>
                    <div class="center-button">
                        <button type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="displaysome">
        <section id="featured" class="py-4">
            <div class="title-wrap">
                <h1 class="popular">Popular Places</h1>
            </div>

            <div class="featured-row">
                <div class="featured-item">
                    <img src="https://www.travelandexplorebd.com/storage/app/public/tours/February2020/91TqVbqtoaBjvJC6Du5p.jpg" alt="featured place">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Jaflong, Sylhet
                        </span>
                    </div>
                </div>

                <div class="featured-item">
                    <img src="https://media-cdn.tripadvisor.com/media/photo-s/18/19/4e/ad/sajek-was-unexplored.jpg" alt="featured place">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Sajek, Rangamati
                        </span>
                    </div>
                </div>

                <div class="featured-item">
                    <img src="https://www.deshghuri.com/wp-content/uploads/2014/05/first-view-of-st-martin-island.jpg" alt="featured place">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Saint Martin, Cox's Bazar
                        </span>
                    </div>
                </div>

                <div class="featured-item">
                    <img src="https://www.touristplaces.com.bd/images/pp/5/p114819.jpg" alt="featured place">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Nilachal, Bandarban
                        </span>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="displaysome2">
        <section id="featured" class="py-3">
            <div class="title-wrap">
                <h1 class="popular">Our Sevices</h1>
            </div>

            <div class="featured-row2">
                <div class="featured-item2">
                    <img src="https://i.ibb.co/23qH6sB/bus-service.png" alt="featured place">
                    <div class="featured-item-content2">
                        <span>
                            <div class="service">
                                <p> Bus Booking </P>
                            </div>
                        </span>
                    </div>
                </div>

                <div class="featured-item2">
                    <img src="https://i.ibb.co/9qdYpKK/hotel-service.png" alt="featured place">
                    <div class="featured-item-content2">
                        <span>
                            <div class="service">
                                <p> Hotel Booking </P>
                            </div>
                        </span>

                    </div>
                </div>

                <div class="featured-item2">
                    <img src="https://i.ibb.co/GvBG24p/train-service.jpg" alt="featured place">
                    <div class="featured-item-content2">
                        <span>
                            <div class="service">
                                <p> Train Booking </P>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3><img src="https://i.ibb.co/kcRZtn5/logo.png" alt="">Viper<span>Travels</span></h3>

            <p class="footer-links">
                <a href="#" class="link-1">Home</a>

                <a href="availableBus/busList.php">Bus</a>

                <a href="#">Train</a>

                <a href="#">Plane</a>

                <a href="availableHotel/hotelList.php">Hotel</a>

                <a href="loginPage/login.php">Login</a>
            </p>

            <p class="footer-company-name">Viper Travels © 2023</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa-solid fa-location-dot"></i>
                <p><span>Uttara</span> Dhaka, Bangladesh</p>
            </div>

            <div>
                <i class="fa-solid fa-phone"></i>
                <p>+8801878009399</p>
            </div>

            <div>
                <i class="fa-solid fa-envelope"></i>
                <p><a href="mailto:sazzad.adib1@gmail.com">support@vipertravels.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About ME</span>

                I'm Sazzad Hossain, a Computer Science and Engineering student at North South University.
                Passionate about tech, I love exploring new ideas.
                With an adventurous spirit, I embrace challenges and aim to make a positive impact in the ever-evolving world of technology.
            </p>

            <div class="footer-icons">

                <a href="https://facebook.com/sazzad.adib" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://github.com/sazzadadib" target="_blank"><i class="fa-brands fa-github"></i></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>
                <a href="http://sazzad.free.nf" target="_blank"><i class="fa-solid fa-briefcase"></i></a>

            </div>

        </div>

    </footer>

</body>

</html>
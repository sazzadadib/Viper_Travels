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
    <!-- <div class="displaysome">
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
        
    </div> -->
    <div class="displaysome">
        <!-- <div class="title-wrap"> -->
            <h1 class="places">Popular Places</h1>
        <!-- </div> -->
    <div class="container">
        <div id="slide">
            <div class="item" style="background-image: url(https://bdembassymexico.org/wp-content/uploads/2019/07/maxresdefault-1.jpg);">
                <div class="imgcontent">
                    <div class="name">Sylhet</div>
                    <div class="des">Sylhet's tea gardens unfold like a patchwork quilt of vibrant greenery, where undulating hills host lush expanses of meticulously cultivated tea estates, creating a scenic and tranquil retreat in the heart of Bangladesh's Sylhet region.</div>
                    <!-- <button>See more</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://images.unsplash.com/photo-1629739868151-d29aab8b4dd1?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                <div class="imgcontent">
                    <div class="name">Sajek Valley</div>
                    <div class="des">Sajek Valley, nestled in the Chittagong Hill Tracts, entices with its breathtaking landscapes, rolling hills, and vibrant indigenous culture, offering a serene escape and panoramic views that make it a hidden gem in southeastern Bangladesh.</div>
                    <!-- <button>See more</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://images.unsplash.com/photo-1585123388867-3bfe6dd4bdbf?q=80&w=2001&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                <div class="imgcontent">
                    <div class="name">Bandarban</div>
                    <div class="des">Bandarban, nestled in the Chittagong Hill Tracts of Bangladesh, enchants with its lush green landscapes, indigenous culture, and the majestic beauty of the Naf River, providing a captivating retreat for nature enthusiasts.</div>
                    <!-- <button>See more</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://c4.wallpaperflare.com/wallpaper/213/786/396/8k-uhd-palm-tree-sandy-beach-shore-wallpaper-preview.jpg);">
                <div class="imgcontent">
                    <div class="name">Saint Martin</div>
                    <div class="des">Saint Martin captivates with its tranquil beaches, coconut groves, and vibrant coral reefs, offering a serene tropical getaway.</div>
                    <!-- <button>See more</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://images.unsplash.com/photo-1643001607577-0a0332e79aab?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                <div class="imgcontent">
                    <div class="name">Jaflong</div>
                    <div class="des">Jaflong, located in the Sylhet division of Bangladesh, mesmerizes with its picturesque tea gardens, the tranquil Dawki River, and the iconic Shah Jalal Bridge, making it a scenic destination that seamlessly blends natural beauty and cultural heritage.</div>
                    <!-- <button>See more</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://images.unsplash.com/photo-1608958435020-e8a7109ba809?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                <div class="imgcontent">
                    <div class="name">Cox's Bazar</div>
                    <div class="des">Cox's Bazar, home to the world's longest natural sea beach, invites visitors with its expansive golden sands, azure waters, and vibrant local markets, offering a perfect blend of coastal charm and cultural richness in Bangladesh.</div>
                    <!-- <button>See more</button> -->
                </div>
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>

    
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
            
            <div class="call_number">
                <i class="fa-solid fa-phone"></i>
                <a href="tel:+8801878009399">+8801878009399</a>
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
    
    <script src="script.js"></script>
</body>

</html>
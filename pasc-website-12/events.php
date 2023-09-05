<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    
    <script defer src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/bc961035cb.js" crossorigin="anonymous"></script>
</head>
<body class="bg-img" id="events-bg">

    <header>
        <div class="max-width slight-padding display-flex-row-only flex-space-between">

            <a href="index.html">
                <img class="header-logo" src="images/logo-orange.png" alt="PASC logo">
            </a>

            <nav>

                <!-- desktop nav start -->
                <div class="desktop-nav">
                    <ul class="display-flex">
                        <li>
                            <a href="about.html">About</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-btn">Initiatives &nbsp;<i class="fa-solid fa-chevron-down"></i></a>
                            <div class="dropdown-content">
                                <ul>
                                    <li>
                                        <a href="short-cuts.html">Short Cuts</a>
                                    </li>
                                    <li>
                                        <a href="episode-one.html">Episode One</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-active">
                            <a href="events.php">Events</a>
                        </li>
                        <li>
                            <a href="news.php">News</a>
                        </li>
                        <li>
                            <a href="resources.html">Resources</a>
                        </li>
                        <li>
                            <a href="membership.html">Membership</a>
                        </li>
                    </ul>
                    
                </div>
                <!-- desktop nav finish -->

                <!-- search bar start -->
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!-- search bar finish -->

                <!-- hamburger start -->
                <div class="menu-container">

                    <!-- menu button start -->
                    <a id="menu-toggle" class="menu-toggle">
                    <span class="menu-toggle-bar menu-toggle-bar--top"></span>
                    <span class="menu-toggle-bar menu-toggle-bar--bottom"></span>
                    </a>
                    <!-- menu button finish -->

                </div>
                <!-- hamburger finish -->

            </nav>

            <!-- mobile nav start -->
            <div id="mobMenu" class="mob-menu">
                <ul>
                    <li><a href="about.html">About</a></li>
                    <li class="dropdown">
                        <a id="dropdown-btn-mob" class="dropdown-btn" href="">Initiatives &nbsp;<i class="fa-solid fa-chevron-down"></i></a>
                        <div class="dropdown-content-mob">
                            <ul>
                                <li>
                                    <a href="short-cuts.html">Short Cuts</a>
                                </li>
                                <li>
                                    <a href="episode-one.html">Episode One</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a style="color:var(--orange);" href="events.php">Events</a>
                    </li>
                    <li>
                        <a href="news.php">News</a>
                    </li>
                    <li>
                        <a href="resources.html">Resources</a>
                    </li>
                    <li>
                        <a href="membership.html">Membership</a>
                    </li>

                </ul>
            </div>
            <!-- mobile nav finish -->

        </div>
    </header>

    <main id="top">

        <!-- banner content start -->
        <div class="smaller-max-width banner-content white-text">
            <div class="two-thirds-width">
                <h1>Events</h1>
                <p>Make the most of opportunities near you to learn from those within the industry as they share their experiences and insights.</p>
            </div>
        </div>
        <!-- banner content finish -->

        <!-- main content start -->
        <div class="white-bg main-content">
            <div class="smaller-max-width">

                <h2 class="orange-text slight-padding-heading">Browse upcoming events</h2>

                <!-- newsletters start -->
                <div class="display-flex">

                    <?php

                        include 'connection.php';

                        $sql = "SELECT title, guest_host, event_date, start_time, end_time, event_location, registration_link, event_image FROM pasc_events ORDER BY event_date DESC";
                        $result = $mysqli->query($sql);

                        // checking stuff was grabbed
                        // var_dump($result);

                        if($result->num_rows > 0){

                            // going through each row of the database
                            while($row = $result->fetch_assoc()){

                                echo "<div class='third-width slight-padding'>";
                                echo "<div class='normal-shadow-box'>";

                                echo "<img class='full-width' src='" . $row["event_image"] . "'>";
                                
                                echo "<div class='thicker-padding'>";
                                echo "<h3 style='margin:0;'>" . $row["title"] . "</h3>";
                                echo "<p><b>" . $row["guest_host"] . "</b></p>";
                                echo "<p><b>When:</b> " . $row["event_date"] . "</p>";
                                echo "<p><b>Time:</b> " . $row["start_time"] . "-" . $row["end_time"] . "</p>";
                                echo "<p><b>Where:</b> " . $row["event_location"] . "</p>";
                                echo "<button class='btn-orange-to-navy' style='margin:0;'><a target='_blank' class='orange-text' href='" . $row["registration_link"] . "'>Register <i class='fa-solid fa-arrow-right-long'></i></a></button>";
                                echo "</div>";

                                echo "</div></div>";
                            }

                        }else {
                            echo "<p>Sorry, there are no upcoming events!</p>";
                        }

                        $mysqli->close();

                    ?>

                </div>
                <!-- newsletters finish -->

                <div class="slight-padding">
                    <button class="underlined-btn orange-text" style="width:unset;">
                        View past events <i class="fa-solid fa-arrow-right-long"></i>
                    </button>
                </div>
            
            </div>
        </div>
        <!-- main content finish -->

    </main>

    <footer class="navy-bg">

        <!-- navy part start -->
        <div class="footer-navy">

            <!-- contact row start -->
            <div class="footer-row max-width white-text display-flex flex-space-between" style="margin-bottom:15px;">
                <img class="footer-logo" src="images/logo-orange.png" alt="PASC logo">

                <!-- email start -->
                <p class="footer-contact">
                    <i class="fa-regular fa-envelope"></i>&nbsp;&nbsp;<b>Email:</b> info@pasc.co.nz
                </p>
                <!-- email finish -->

                <!-- hours start -->
                <p class="footer-contact">
                    <i class="fa-regular fa-clock"></i>&nbsp;&nbsp;<b>Office Hours:</b> 9AM - 4PM
                </p>
                <!-- hours finish -->

                <!-- socials start -->
                <div class="socials display-flex-row-only">
                    <a target="_blank" class="white-text" href="https://www.instagram.com/panasianscreencollective/"><i class="fa-brands fa-instagram"></i></a>
                    <a target="_blank" class="white-text" href="https://www.facebook.com/pasc.nz/"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <!-- socials finish -->

            </div>
            <!-- contact row finish -->

            <!-- partner row start -->
            <div class="footer-row max-width white-text display-flex flex-space-between">

                <div style="width:100%;">
                    <h3>Special thanks to our partners</h3>
                </div>

                <!-- partner text start -->
                <div class="half-width">
                    <p>PASC operates with the assistance of many generous sponsors and supporters, and we gratefully acknowledge their ongoing support.</p>
                    <button class="orange-text btn-orange-to-white">become a partner <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
                <!-- partner text finish -->

                <!-- partner logos start -->
                <div class="half-width partner-logos">
                    <img class="partner-logos" src="https://i.imgur.com/vc1i9zL.png" alt="">
                </div>

                <!-- partner logos finish -->
                
            </div>
            <!-- partner row finish -->

        </div>
        <!-- navy part finish -->

        <!-- final row start -->
        <div class="orange-bg white-text">
            <div class="max-width footer-bottom-content display-flex flex-space-between slight-padding">
                <p>&copy; 2018-2023 Pan-Asian Screen Collective Inc. All rights reserved.</p>
                <p class="footer-small-links">
                    <a href="" class="white-text">
                        <u>Privacy Policy</u>
                    </a>&nbsp; | &nbsp;
                    <a href="" class="white-text">
                        <u>Terms & Conditions</u>
                    </a>
                </p>
                <p><a class="top-btn white-text" href="#top">Back to Top <i class="fa-solid fa-arrow-up-long"></i></a></p>
            </div>
        </div>
        <!-- final row finish -->

    </footer>
    
</body>
</html>
<?php
// Initialize $selectedYear to the default value (e.g., "2023")
$selectedYear = "2023";

// Check if the form was submitted and set $selectedYear accordingly
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['year'])) {
    $selectedYear = $_POST['year'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PASC Pānui</title>

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    
    <script defer src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/bc961035cb.js" crossorigin="anonymous"></script>
</head>
<body class="bg-img" id="news-bg">

    <header>
        <div class="max-width slight-padding display-flex-row-only flex-space-between">

        <!-- !!!!!!!! -->
        <!-- REMEMBER TO ADD ACTUAL LINKS -->
        <!-- !!!!!!!! -->

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
                            <a class="dropdown-btn" href="">Initiatives &nbsp;<i class="fa-solid fa-chevron-down"></i></a>
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
                        <li>
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
            <!-- mobile nav finish -->

        </div>
    </header>

    <main id="top">

        <!-- banner content start -->
        <div class="max-width banner-content white-text">
            <div class="half-width">
                <h1>PASC News</h1>
                <p>Our monthly Pānui is a newsletter sent to PASC members which covers industry events, projects, jobs, opportunities, news, and more!</p>
            </div>
        </div>
        <!-- banner content finish -->

        <!-- main content start -->
        <div class="white-bg main-content">
            <div class="max-width slight-padding">

                <h2 class="orange-text">Browse past Pānui</h2>

                <!-- filter start -->
                <div>
                    <form method="post" action="">
                        <label for="year">Showing newsletters from the year:</label>
                        <select name="year" id="year">
                            <option value="2023" <?php if ($selectedYear == "2023") echo "selected"; ?>>2023</option>
                            <option value="2022" <?php if ($selectedYear == "2022") echo "selected"; ?>>2022</option>
                            <option value="2021" <?php if ($selectedYear == "2021") echo "selected"; ?>>2021</option>
                            <option value="2020" <?php if ($selectedYear == "2020") echo "selected"; ?>>2020</option>
                            <option value="2019" <?php if ($selectedYear == "2019") echo "selected"; ?>>2019</option>
                            <option value="2018" <?php if ($selectedYear == "2018") echo "selected"; ?>>2018</option>
                        </select>
                        <input type="submit" value="Filter">
                    </form>
                </div>
                <!-- filter finish -->

                <!-- newsletters start -->
                <div class="border-top">

                    <?php

                        include 'connection.php';

                        // Check if the form was submitted or a default year is used
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['year'])) {
                            $selectedYear = $_POST['year'];

                            $sql = "SELECT id, publication_date, title, newsletter_link FROM pasc_newsletters WHERE YEAR(publication_date) = ?";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param("s", $selectedYear);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $stmt->close();
                        } else {
                            // If no year is selected (i.e., page is initially loaded), set a default year (e.g., 2023)
                            $defaultYear = "2023";
                            $sql = "SELECT id, publication_date, title, newsletter_link FROM pasc_newsletters WHERE YEAR(publication_date) = ?";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param("s", $defaultYear);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $stmt->close();
                        }

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Format the date
                                $formattedDate = date("F j, Y", strtotime($row["publication_date"]));

                                echo "<div class='news-row display-flex-row-only'>";
                                echo "<div class='orange-text fifth-width'>" . $formattedDate . "</div>";
                                echo "<div class='four-fifths-width'><u><a class='navy-text' target='_blank' href='" . $row["newsletter_link"] ."'>" . $row["title"] . "</a></u></div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>Sorry, there are no newsletters for the selected year!</p>";
                        }

                        $mysqli->close();

                    ?>

                </div>
                <!-- newsletters finish -->
            
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
                    <h2>Special thanks to our partners</h2>
                </div>

                <!-- partner text start -->
                <div class="half-width">
                    <p>PASC operates with the assistance of many generous sponsors and supporters, and we gratefully acknowledge their ongoing support.</p>
                    <button class="white-text">become a partner <i class="fa-solid fa-arrow-right-long"></i></button>
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
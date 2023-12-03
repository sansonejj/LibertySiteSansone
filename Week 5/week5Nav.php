<?php
$navLinks = array("Home","About Us", "PHP Configuration Info", "Contact Us", "Our Staff",
    "Products", "Cart", "Newsletter Signup", "Customer Testimonials", "Product Surveys", "Facts", "Our Goals", "Connect With Us",
        "Public Safety Technology in The News", "Our Mission", "Resources");


$urls = array("../index.php","../w1_AboutUs.php", "../w1_phpInfo.php", "../w1_contactUs.php", "../w1_orgchart.php",
    "product_purchase.php", "cart.php", "newsletter_signup.php", "testimonials.php", "../week2/w2_webpoll_post.php", "facts.php", "our_goals.php",
     "more_info.php", "news.php", "our_mission.php", "resources.php");

echo '<div class="navigation">';
// Loops through the array to generate navigation links.
for ($i = 0; $i < count($navLinks); $i++) {
    echo '<a href="' . $urls[$i] . '">' . $navLinks[$i] . '</a>';
}
echo '</div>';


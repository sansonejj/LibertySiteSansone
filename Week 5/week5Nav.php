<?php
$navLinks = array("Home","About Us", "PHP Configuration Info", "Contact Us", "Our Staff",
    "Products", "Cart", "Newsletter Signup", "Customer Testimonials", "Product Surveys", "Facts", "Our Goals", "Connect With Us",
        "Public Safety Technology in The News", "Our Mission", "Resources", "Leave A Comment or Prayer Request", "View Comments", "Site Administration");


$urls = array("/index.php","/w1_AboutUs.php", "/w1_phpInfo.php", "/w1_contactUs.php", "/w1_orgchart.php",
    "/Week 5/product_purchase.php", "/Week 5/cart.php", "/Week 5/newsletter_signup.php", "/Week 5/testimonials.php", "/week2/w2_webpoll_post.php", "/Week 5/facts.php", "/Week 5/our_goals.php",
     "/Week 5/more_info.php", "/Week 5/news.php", "/Week 5/our_mission.php", "/Week 5/resources.php", "/Week 6/leave_comment.php", "/Week 6/view_comments.php", "/Week 8/site_administration.php");

echo '<div class="navigation">';
// Loops through the array to generate navigation links.
for ($i = 0; $i < count($navLinks); $i++) {
    echo '<a href="' . $urls[$i] . '">' . $navLinks[$i] . '</a>';
}
echo '</div>';


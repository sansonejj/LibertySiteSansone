
<?php
$navLinks = array("Module 1: Week 1 Foundations", "Module 1: Week 1 Variables", "Module 2: Week 2 Forms",
    "Module 3: Week 3 Arrays", "Module 4: Week 4 Sessions", "Module 5: Week 5 CMS Sessions", "Module 6: Week 6 Database",
    "Module 8: Week 8 CMS Database");
$urls = array("w1_Foundations.php", "w1_orgchart.php", "week2/w2_webpoll_get.php", "Week 3/org_update.php", "Week 3/org_update.php", "Week 5/product_purchase.php", "Week 6/view_comments.php",
    "Week 8/site_administration.php");

echo '<div class="navbar">';
// Loops through the array to generate navigation links.
for ($i = 0; $i < count($navLinks); $i++) {
    echo '<a href="' . $urls[$i] . '">' . $navLinks[$i] . '</a>';
}
echo '</div>';

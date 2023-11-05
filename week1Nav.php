<?php
$navLinks = array("Home","About Us", "PHP Configuration Info", "Contact Us", "Our Staff");
$urls = array("index.php","w1_AboutUs.php", "w1_phpInfo.php", "w1_contactUs.php", "w1_orgchart.php");

echo '<div class="navigation">';
// Loops through the array to generate navigation links.
for ($i = 0; $i < count($navLinks); $i++) {
    echo '<a href="' . $urls[$i] . '">' . $navLinks[$i] . '</a>';
}
echo '</div>';
?>

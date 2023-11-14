<?php
$navLinks = array("Home","Survey Using GET", "Survey Using POST");
$urls = array("/index.php","w2_webpoll_get.php", "w2_webpoll_post.php");

echo '<div class="navigation">';
// Loops through the array to generate navigation links.
for ($i = 0; $i < count($navLinks); $i++) {
    echo '<a href="' . $urls[$i] . '">' . $navLinks[$i] . '</a>';
}
echo '</div>';
?>

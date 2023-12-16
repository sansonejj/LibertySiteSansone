<?php
$navLinks = array("Exit Admin Menu" , "User Management", "Employee Management", "Customer Management", "Comment Management", "Product Management",
                    "News Link Management");


$urls = array("../w1_AboutUs.php", "../Week 8/user_management.php" , "../Week 8/employee_management.php", "../Week 8/customer_management.php",
    "../Week 6/comment_management.php", "../Week 8/product_management.php", "../Week 8/news_management.php");


echo '<div class="navigation">';
// Loops through the array to generate navigation links.
for ($i = 0; $i < count($navLinks); $i++) {
    echo '<a href="' . $urls[$i] . '">' . $navLinks[$i] . '</a>';
}
echo '</div>';

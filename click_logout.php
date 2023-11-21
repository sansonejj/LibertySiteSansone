<?php
// Include this part in the footer of your pages where you want the logout link

echo '<div class="footer">';

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Display the logout link
    echo '<a href="#" onclick="confirm_Logout()">Logout</a>';
}

echo '</div>';

// JavaScript function for confirmation
echo '<script>
//Reference:https://www.javatpoint.com/javascript-confirm
function confirm_Logout() {
    var confirmation = confirm("Confirm Logout?");
    if (confirmation) {
        // Redirect to logout.php on confirmation
        window.location.href = "../Week 4/logout.php";
        window.location.href = "../logout_confirmation.php"
    }
}
</script>';
?>

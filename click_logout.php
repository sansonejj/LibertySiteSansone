<?php

echo '<div class="footer">';

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Display the logout link
    echo '<br><a href="#" onclick="return confirm_Logout();">Logout</a>';
}

echo '</div>';

echo '<script>
function confirm_Logout() {
    const confirmation = confirm("Confirm Logout?");
    if (confirmation) {
        window.location.href = "../Week 4/logout.php";
    }
    return false; 
}
</script>';


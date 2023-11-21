<?php
session_start();
//Reference: https://libertyonline.vitalsource.com/reader/books/9781492054085/epubcfi/6/30%5B%3Bvnd.vst.idref%3Dchapter-idm45922770165944%5D!/4/2/2%5Bweb_techniques%5D/12/2%5Bprocessing_forms%5D/8/2%5Bparameters%5D/4/11:201%5BP%20v%2Cari%5D

$username = $_POST['username'];
$password = $_POST['password'];


if ($username === 'customer' && $password === 'customer') {
    $_SESSION['authenticated'] = true;
    header('location: ../w1_orgchart.php');

} else {
    // redirect back to the login page if auth fails
    header('Location: ../Week 4/loginForm.php');
    exit();
}
?>

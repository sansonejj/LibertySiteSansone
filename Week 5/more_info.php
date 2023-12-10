<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Reach Out</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'week5Nav.php'
    ?>
</div>

<style>
    .navigation {
        position: relative;
    }

    #shoppingCart {
        position: absolute;
        top: 0;
        right: 0;
        color: white;
    }
</style>

<div id="shoppingCart">
    <!-- Pulls session data from the user session and the items and total in their cart -->
    <?php include 'shopping_cart.php'; ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Reach Out to Us</h1>";
    ?>
</div>

<div class="body">
    <?php

    echo "<h3>Interested in more information?</h3>";
    echo "<p>Fill out the form below and someone from our team will reach out to discuss if a relationship between our firm and
                your agency makes sense. ";
    ?>
    <form action="user_contact_confirmation.php">
        <table class="centered-form">
            <tr>
                <td class="label-cell"><label for="first_name">First Name:</label></td>
                <td class="input-cell"><input type="text" id="text_fn" name="first_name" required></td>
            </tr>

            <tr>
                <td class="label-cell"><label for="last_name">Last Name:</label></td>
                <td class="input-cell"><input type="text" id="text_ln" name="last_name" required></td>
            </tr>

            <tr>
                <td class="label-cell"><label for="email">Email:</label></td>
                <td class="input-cell"><input type="email" id="agency_email" name="agency_email" required></td>
            </tr>

            <tr>
                <td class="label-cell"><label for="phone">Phone Number:</label></td>
                <td class="input-cell">
                    <!-- Reference for Phone Pattern: https://www.html5pattern.com/Phones Reference for Placeholder: https://www.w3schools.com/tags/att_input_placeholder.asp-->
                    <input type="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}" id="phone_number" name="phone_number" placeholder="111-111-1111" required>
                </td>
            </tr>

            <tr>
                <td class="label-cell"><label for="agency_name">Agency Name:</label></td>
                <td class="input-cell"><input type="text" maxlength="100" id="agency_name" name="agency_name" required </td>
            </tr>

            <tr>
                <td class="label-cell"><label for="agency_street_addr">Street Address:</label></td>
                <td class="input-cell"><input type="text" maxlength="200" id="agency_street_addr" name="agency_street_addr" </td>
            </tr>

            <tr>
                <td class="label-cell"><label for="agency_city">City:</label></td>
                <td class="input-cell"><input type="text" maxlength="200" id="agency_city" name="agency_city" </td>
            </tr>

            <tr>
                <td class="label-cell"><label for="agency_state">State:</label></td>
                <td class="input-cell"><input type="text" maxlength="200" id="agency_state" name="agency_state" </td>
            </tr>

            <tr>
                <td class="label-cell"><label for="agency_zip">Zipcode:</label></td>
                <td class="input-cell"><input type="text" maxlength="200" id="agency_zip" name="agency_zip" </td>
            </tr>


            <tr>
                <div><input type="submit" value="Submit"</div>
            </tr>

        </table>
    </form>

</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>

</body>
</html>

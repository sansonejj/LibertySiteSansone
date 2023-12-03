<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<!-- Reference: Tatroe, K., & MacIntyre, P. (2020). Programming PHP (4th ed.). O'Reilly Media, Inc.
https://libertyonline.vitalsource.com/books/9781492054085 Chapter 8-->
<head>
    <title>Product Survey (GET)</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <!-- Reference: https://developer.mozilla.org/en-US/docs/Web/CSS/justify-content -->
    <style>
        .columns {
            display: flex;
            justify-content: space-between;
        }
        .column {
            width: 30%;
            padding: 15px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            text-align: center;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="navigation">
    <?php
    include 'week2Nav.php'
    ?>
</div>

<div class="page-header">
    <?php
    echo "<h1>Product Survey (GET)</h1>";
    ?>
</div>

<!-- Reference: https://www.w3schools.com/html/tryit.asp?filename=tryhtml_form_radio
        Used for reference in creating the radio buttons and storing values -->
<form action="w2_results_get.php" method="GET">
    <div class="columns">
        <div class="column">
            <h3>GoldElite Radio Dispatch</h3>
            <!-- Reference: https://www.php.net/manual/en/function.include.php used for locating file in another directory -->
            <img src="..\images\products\mcc7500.png" alt="GoldElite Radio Console">
            <p>This customizable user interface allows 911 dispatchers to effectivity manage radio traffic. </p>

            <label>How would you rate this product?:</label><br>
            <input type="radio" name="item1rating" value="Excellent"> Excellent
            <input type="radio" name="item1rating" value="Good"> Good
            <input type="radio" name="item1rating" value="Average"> Average
            <input type="radio" name="item1rating" value="Poor"> Poor
            <input type="radio" name="item1rating" value="Very Poor"> Very Poor

            <br><label for="item1comments">Comments:</label><br>
            <textarea id="item1comments" name="item1comments" rows="4" cols="50"></textarea>
        </div>

        <div class="column">

            <h3>L3 Harris Radio Console</h3>
            <img src="\images\products\l3harris.jpg" alt="L3 Harris Radio Console" width="400" height="300">
            <p>The L3 Harris system offers the most capability for interoperability between any number of jurisdictions.</p>

            <label>How would you rate this product?:</label><br>
            <input type="radio" name="item2rating" value="Excellent"> Excellent
            <input type="radio" name="item2rating" value="Good"> Good
            <input type="radio" name="item2rating" value="Average"> Average
            <input type="radio" name="item2rating" value="Poor"> Poor
            <input type="radio" name="item2rating" value="Very Poor"> Very Poor

            <br><label for="item2comments">Comments:</label><br>
            <textarea id="item2comments" name="item2comments" rows="4" cols="50"></textarea>
        </div>


        <div class="column">
            <h3>Motorola APX6000</h3>
            <img src="\images\products\apx6000.jpg" alt="Motorola APX6000" width="300" height="300">
            <p>The APX6000 is able to keep up with the demanding workload placed on public safety professionals.</p>

            <label>How would you rate this product?:</label><br>
            <input type="radio" name="item3rating" value="Excellent"> Excellent
            <input type="radio" name="item3rating" value="Good"> Good
            <input type="radio" name="item3rating" value="Average"> Average
            <input type="radio" name="item3rating" value="Poor"> Poor
            <input type="radio" name="item3rating" value="Very Poor"> Very Poor

            <br><label for="item3comments">Comments:</label><br>
            <textarea id="item3comments" name="item3comments" rows="4" cols="50"></textarea>
        </div>
    </div>

    <!-- Reference: https://www.w3schools.com/tags/tag_label.asp
         Reference: https://www.w3schools.com/tags/att_input_required.asp -->
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <input type="submit" value="Submit">
</form>

<div class="custom-class1">
    <!-- Reference: https://www.php.net/manual/en/function.include.php used for locating file in another directory -->
    <?php
    include '../siteValidation.php';
    ?>
</div>

</body>
</html>

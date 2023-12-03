<?php include 'sessions.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Sansone Liberty</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="navigation">
    <?php
    include 'week1Nav.php'
    ?>
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
        <?php include 'Week 5/shopping_cart.php'; ?>
    </div>
</div>

<div class="page-header">
    <?php
    echo "<h1>About Us</h1>";
    ?>
</div>

<div class="paragraph">
    <?php
    echo "<p>Here at Sansone Liberty, we offer expertise and decades of experience to public safety agencies throughout the country. 
            Our staff has over 200 years of combined experience serving operational and support roles in the public safety sector. 
            Our journey began with a vision to elevate public safety to new heights. We understand the unique challenges and demands faced 
            by public safety professionals. Whether you are a municipal agency or federal, we are here to support you.</p>";
    echo "<p>At Sansone Liberty, our driving force is strongly committed to promoting the safety and well-being of the public. 
            We hold ourselves to the highest ethical principles, utilizing cutting-edge technology and employing tried and true methodologies. 
            This is what sets us apart from everyone else. Regardless of your projects or challenges, you don't need to do it alone. 
            All of us at Sansone Liberty have been in your shoes, in your chair, under the headset, and behind the badge. 
            Reach out to us for a free phone consultation.</p>";
    ?>
</div>
<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>


</div>



</body>
<?php include 'click_logout.php'; ?>
</html>


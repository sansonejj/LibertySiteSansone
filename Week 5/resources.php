<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Resources</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="../styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'week5Nav.php'
    ?>
</div>



<div class="page-header">
    <?php
    echo "<h1>Resources For Public Safety</h1>";
    ?>
</div>

<div class="body" align="left">
    <?php
    echo "<a href=\"https://www.apcointl.org/\">APCO International</a>";
    ?>

    <?php
    echo "<br><a href=\"https://www.nena.org/\">National Emergency Number Association</a>";
    ?>

    <?php
    echo "<br><a href=\"https://fop.net/\">Fraternal Order Of Police</a>";
    ?>

    <?php
    echo "<br><a href=\"https://www.iaff.org/\">International Association of Fire Fighters</a>";
    ?>

    <?php
    echo "<br><a href=\"https://naemt.org/\">National Association of Emergency Medical Technicians</a>";
    ?>

</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>


</body>
</html>

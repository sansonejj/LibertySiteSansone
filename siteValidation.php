<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Sansone Liberty</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<footer>
     <p> <!--Reference: https://stackoverflow.com/questions/2294354/add-xhtml-and-css-verification-buttons -->
        <a href="https://validator.w3.org/check?uri=referer">
            <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" />
        </a>
        <a href="https://jigsaw.w3.org/css-validator/check/referer">
            <img src="https://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" />

        </a>
         <br><img src="../images/social_media/facebook.png" alt="Facebook">
         <img src="../images/social_media/linkedin.png" alt="LinkedIn">
    <!--Reference: https://stackoverflow.com/questions/26183595/how-to-get-date-page-was-last-modified-using-php -->
    <br><p>Last modified: <?php echo date("F d, Y H:i:s.", getlastmod()); ?></p>

</footer>

</body>

</html>



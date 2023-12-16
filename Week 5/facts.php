<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Facts</title>
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
    echo "<h1>Facts</h1>";
    ?>
</div>

<div class="body" align="left">
    <?php
    echo "<ul>";
    echo "<li>Public safety projects can range from local community policing initiatives to large-scale disaster 
                response systems. They often include emergency services, law enforcement, fire services, and disaster preparedness.</li>";

    echo "<li>Effective public safety projects significantly reduce crime rates, improve emergency response times, and 
                enhance the overall sense of security in communities.</li>";

    echo "<li>Modern public safety projects often incorporate advanced technologies like drones for surveillance, AI for
                predictive policing, and data analytics for resource allocation.</li>";

    echo "<li>One of the biggest challenges in public safety projects is the variability in funding and budget 
                constraints, which can significantly affect the scope and effectiveness of these projects.</li>";

    echo "<li>Increasingly, public safety projects are focusing on community involvement and outreach, recognizing that
                public cooperation and trust are essential for effective safety measures.</li>";

    echo "<li>Rapid response to emergencies is a critical aspect of public safety, yet it remains a challenge in many 
                areas due to factors like geographical barriers, resource limitations, and communication breakdowns.</li>";
    echo "</ul>";
    ?>

</div>

<div class="custom-class1">
    <?php
    include '../siteValidation.php';
    ?>
</div>

</body>
</html>

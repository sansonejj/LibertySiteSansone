<!-- xhtml headings reference by https://www.w3docs.com/learn-html/xhtml-extensible-hypertext-markup-language.html-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="styles.css" />

    <title>Our Staff</title>
    <!-- The link below points to the CSS styles sheet where my 3 custom CSS classes are located -->
    <link rel="stylesheet" type="text/css" href="styles.css" />

</head>
<body>
<div class="navigation">
    <?php
    include 'week1Nav.php'
    ?>

</div>

<div class="page-header">
    <?php
    echo "<h1>Sansone Liberty Staff</h1>";
    ?>
</div>

<div class="body">
    <?php
    include 'variables.php';
    // Decided to utilize a multi-dimensional array here
    $employees = array(
        'employee1' => array(
            'image' => 'emp_JS.webp',
            'name' => $employee1_name,
            'link' => 'w1_emp1_JS.php',
            'job_title' => $employee1_job_title

        ),
        'employee2' => array(
            'name' => $employee2_name,
            'link' => 'w1_emp1_TL.php',
            'image' => 'emp_TL.jpeg',
            'job_title' => $employee2_job_title
        ),
        'employee3' => array(
            'name' => $employee3_name,
            'link' => 'w1_emp1_AL.php',
            'image' => 'emp_AL.jpg' ,
            'job_title' => $employee3_job_title

        ),
    );
    echo '<ul style="list-style: none;">';
    //Reference: https://www.computerhope.com/issues/ch001704.htm - Used to figure out how to hide the bullet points Line: 57
    foreach ($employees as $employee) {
        //Reference: https://www.shecodes.io/athena/22112-how-to-display-a-list-horizontally-in-html-and-css#:~:text=To%20present%20a%20list%20horizontally%20instead%20of%20vertically%20in%20HTML,property%20on%20the%20list%20items.&text=This%20will%20display%20the%20bulleted,the%20value%20of%20margin-right%20
        //used on line 59
        echo '<li style="display: inline-block; margin-right: 40px">';
        echo '<img src="' . $employee['image'] . '" alt="' . $employee['name'] . '" width="200" height="200" />';
        echo '<br>';
        echo '<a href="' . $employee['link'] . '">' . $employee['name'] . '</a>';
        echo '<br>';
        echo $employee['job_title'];
        echo '</li>';
    }
    echo '</ul>';
    ?>

</div>

<div class="custom-class1">
    <?php
    include 'siteValidation.php';
    ?>
</div>

<!--  -->
</body>
</html>

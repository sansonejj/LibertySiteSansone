<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include($_SERVER['DOCUMENT_ROOT'] . '/variables.php');

    // Get the selected employee and data from the form
    // Reference: https://stackoverflow.com/questions/6199744/dynamically-create-variables-in-php
    $selectedEmployee = $_POST['employee'];
    $job = $_POST['job'];
    $department = $_POST['department'];
    $interests = $_POST['interests'];
    $hobby =$_POST['hobby'];
    $favbook =$_POST['favbook'];


    // Update the variables.php using switch statement depending on which employee is selected
    switch ($selectedEmployee) {
        case 'employee1':
            $employee1_job_title = $job;
            $employee1_department = $department;
            $employee1_interests = $interests;
            $employee1_hobby = $hobby;
            $employee1_favorite_book = $favbook;
            break;

        case 'employee2':
            $employee2_job_title = $job;
            $employee2_department = $department;
            $employee2_interests = $interests;
            $employee2_hobby = $hobby;
            $employee2_favorite_book = $favbook;
            break;

        case 'employee3':
            $employee3_job_title = $job;
            $employee3_department = $department;
            $employee3_interests = $interests;
            $employee3_hobby = $hobby;
            $employee3_favorite_book = $favbook;
            break;

        default:
            // if the employee is not found, end
            break;
    }

    // updating variables.php with new data
    $variableUpdate = "<?php\n";
    $variableUpdate .= "\$employee1_name = '$employee1_name';\n";
    $variableUpdate .= "\$employee1_job_title = '$employee1_job_title';\n";
    $variableUpdate .= "\$employee1_department = '$employee1_department';\n";
    $variableUpdate .= "\$employee1_interests = '$employee1_interests';\n";
    $variableUpdate .= "\$employee1_hobby = '$employee1_hobby';\n";
    $variableUpdate .= "\$employee1_favorite_book = '$employee1_favorite_book';\n";

    $variableUpdate .= "\$employee2_name = '$employee2_name';\n";
    $variableUpdate .= "\$employee2_job_title = '$employee2_job_title';\n";
    $variableUpdate .= "\$employee2_department = '$employee2_department';\n";
    $variableUpdate .= "\$employee2_interests = '$employee2_interests';\n";
    $variableUpdate .= "\$employee2_hobby = '$employee2_hobby';\n";
    $variableUpdate .= "\$employee2_favorite_book = '$employee2_favorite_book';\n";

    $variableUpdate .= "\$employee3_name = '$employee3_name';\n";
    $variableUpdate .= "\$employee3_job_title = '$employee3_job_title';\n";
    $variableUpdate .= "\$employee3_department = '$employee3_department';\n";
    $variableUpdate .= "\$employee3_interests = '$employee3_interests';\n";
    $variableUpdate .= "\$employee3_hobby = '$employee3_hobby';\n";
    $variableUpdate .= "\$employee3_favorite_book = '$employee3_favorite_book';\n";

    $variableUpdate .= "?>";
 /* Reference: https://www.w3schools.com/php/func_filesystem_file_put_contents.asp */
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/variables.php', $variableUpdate);

    // Redirect to the updated employee's page
    switch ($selectedEmployee) {
        case 'employee1':
            header("Location: ../w1_emp1_JS.php");
            break;

        case 'employee2':
            header("Location: ../w1_emp1_TL.php");
            break;

        case 'employee3':
            header("Location: ../w1_emp1_AL.php");
            break;

        default:
            // Handle if the employee is not found
            break;
    }

    exit();

}
?>




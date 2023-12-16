    <?php
    include '../database/database_connection.php';
    include '../sessions.php';
    checkUserGroup(['1']); //1= Administrator, 2= Publisher, 3= Customer
    function fetchCustomers($conn) {
        $sql = "SELECT * FROM customer_info";
        $result = mysqli_query($conn, $sql);

        //Reference Fetching: https://www.php.net/manual/en/function.mysql-fetch-field.php
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $customers = fetchCustomers($conn);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Manage Customers</title>
        <link rel="stylesheet" type="text/css" href="../styles.css" />

        <!-- JS toggling form function Reference: https://www.w3schools.com/jsref/met_document_getelementbyid.asp -->
        <script>

            function toggleAddCustomerForm() {
                /*Getting Element Reference: https://www.w3schools.com/jsref/met_document_getelementbyid.asp */
                var form = document.getElementById("addCustomerForm");
                form.style.display = form.style.display === "none" ? "block" : "none";
            }
        </script>
    </head>
    <body>
    <div class="navigation">
        <?php include 'admin_nav.php'; ?>
    </div>

    <div class="page-header">
        <h1>Customer Management</h1>
    </div>

    <div class="body_centered">
        <?php
        if (count($customers) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Agency Name</th><th>City</th><th>State</th><th>Zipcode</th><th>Actions</th></tr>";
            foreach($customers as $customer) {
                echo "<tr>";
                echo "<td>".$customer["id"]."</td>";
                echo "<td>".$customer["first_name"]."</td>";
                echo "<td>".$customer["last_name"]."</td>";
                echo "<td>".$customer["agency_email"]."</td>";
                echo "<td>".$customer["phone_number"]."</td>";
                echo "<td>".$customer["agency_name"]."</td>";
                echo "<td>".$customer["agency_city"]."</td>";
                echo "<td>".$customer["agency_state"]."</td>";
                echo "<td>".$customer["agency_zipcode"]."</td>";
                // Display the Edit and Delete separated by a |, and where to go when clicked.
                echo "<td><a href='edit_customer.php?id=".$customer['id']."'>Edit</a> | <a href='delete_customer.php?id=".$customer['id']."'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No customers found.";
        }
        ?>
    </div>
        <div style="margin-bottom: 20px;">
            <button onclick="toggleAddCustomerForm()">Add Customer</button>
            <div id="addCustomerForm" style="display:none;">
                <form method="post" action="add_customer.php" class="form-row">
                    <label>First Name:<input type="text" name="firstName"></label>
                    <label>Last Name:<input type="text" name="lastName"></label>
                    <label>Email:<input type="email" name="email"></label>
                    <label>Phone Number:<input type="tel" name="phone"></label>
                    <label>Agency Name:<input type="text" name="agencyName"></label>
                    <label>City:<input type="text" name="city"></label>
                    <label>State:<input type="text" name="state"></label>
                    <label>Zipcode:<input type="text" name="zipcode"></label>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>


    <div class="custom-class1">
        <?php include '../siteValidation.php'; ?>
    </div>

    <?php include '../click_logout.php'; ?>

    </body>
    </html>

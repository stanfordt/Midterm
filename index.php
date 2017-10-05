<?php
    require_once('database.php');

    // Prepared variable to select customers in California
    $customerID = '1004';

    $query = "SELECT registrations.productCode, products.name, customers.firstName, customers.lastName
                FROM registrations, products, customers
                WHERE registrations.productCode = products.productCode
                AND registrations.customerID = ?
                AND registrations.customerID = customers.customerID";

    
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $stmt->store_result();
    // Three variables we will bind the results to
    $stmt->bind_result($productCode, $name, $firstName, $lastName);
?> 
<!-- header information comes from include file -->
    <p><?php include 'header.php'; ?></p>

    <div id="header">
        <h1>Registrations</h1>
    </div>

    <div id="main">

        <h1>Customer/Product List</h1>

        <div id="content">
            <!-- display a list of customers -->
         
            <table>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                <?php while ($stmt->fetch()) { ?>
                <tr>
                    <!-- echo all results to table rows -->
                    <td><?php echo $productCode; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $lastName; ?></td>
                </tr>
                <!-- result set is available -->

                <?php }
    $stmt->free_result();
    $db->close();?>
                    
            </table>
            </br>
        </div>
    </div>

 <!-- shared footer information comes from include file -->
        <p><?php include 'footer.php'; ?></p>
   

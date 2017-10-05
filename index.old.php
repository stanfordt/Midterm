<?php
    require_once('database.php');

    // Get orders
    $customerID = 1;

    $query = "SELECT orderID, orderDate FROM orders WHERE customerID = ?";

    
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($orderID, $orderDate);
?> 
<!-- header information comes from include file -->
    <p><?php include 'header.php'; ?></p>

    <div id="header">
        <h1>Orders</h1>
    </div>

    <div id="main">

        <h1>Order List</h1>

        <div id="content">
            <!-- display a list of customers -->
         
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                </tr>
                <?php while ($stmt->fetch()) { ?>
                <tr>
                    <td><?php echo $orderID; ?></td>
                    <td><?php echo $orderDate; ?></td>
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
   

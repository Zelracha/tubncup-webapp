<?php
include 'bkconnection.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN BOOKING PAGE</title>
    <link rel="stylesheet" href="AdminBooking.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <img src="icons/tnclogo.PNG" class="logo" alt="">
    <nav>
        <ul>
        <li><a href="../Admin-Booking/customerbooking.php"><b>BOOKINGS</b></a></li>
        <li><a href="../Admin-Cafe/customerorders.php">ORDERS</a></li>
        </ul>
    </nav>
</header>

<main><br><br>
 <h2>BOOKINGS</h2>
 <table>
    <thead>
        <tr>
            <th>RESERVE DATE</th>
            <th>RESERVE TIME</th>
            <th>NAME OF OWNER</th>
            <th>PET NAME</th>
            <th>BREEED</th>
            <th>MOBILE NO.</th>
            <th>GROOMER</th>
            <th>NOTE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $query = "SELECT ownerName, petName, breed, mobileNum, reserveDate, reserveTime, groomer, note 
                  FROM petgrooming_data 
                  ORDER BY reserveDate ASC";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
         
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['reserveDate']) . "</td>
                        <td>" . htmlspecialchars($row['reserveTime']) . "</td>
                        <td>" . htmlspecialchars($row['ownerName']) . "</td>
                        <td>" . htmlspecialchars($row['petName']) . "</td>
                        <td>" . htmlspecialchars($row['breed']) . "</td>
                        <td>" . htmlspecialchars($row['mobileNum']) . "</td>  
                        <td>" . htmlspecialchars($row['groomer']) . "</td>
                        <td>" . htmlspecialchars($row['note']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No bookings found</td></tr>";
        }

      
        $conn->close();
        ?>
    </tbody>
 </table>
</main>
</body>
</html>
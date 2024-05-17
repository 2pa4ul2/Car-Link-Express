<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Carlink</title>
</head>
<body>
    <header>
            <nav>
                <img class="logo" src="../assets/images/logo3.png" alt="">
                <ul>
                        <li><a class="nav-button" href="index.php">Home</a></li>
                        <li><a class="nav-button" href="create.php">Create</a></li>
                        <li><a class="nav-button" href="#">View</a></li>
                        <li><a class="nav-button" href="#">Update</a></li>
                        <li><a class="nav-button" href="#">Delete</a></li>
                </ul>
                <a class="login-btn" href="">Log in</a>
            </nav>
    </header>
    <main>
        <table>
            <tr>
                <th>Supplier ID</th>
                <th>Supplier Name</th>
                <th>Contact Person</th>
                <th>Contact Number</th>
            </tr>
            <?php
                require_once "../includes/db.php";
                $query = "SELECT * FROM supplier";
                $stmt = $pdo -> prepare($query);
                $stmt -> execute();
                while($row = $stmt -> fetch()){
                    echo "<tr>";
                    echo "<td>" . $row['supplier_id'] . "</td>";
                    echo "<td>" . $row['supplier_name'] . "</td>";
                    echo "<td>" . $row['contact_person'] . "</td>";
                    echo "<td>" . $row['contact_number'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
</body>
</html>
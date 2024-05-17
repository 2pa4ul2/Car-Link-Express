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
                        <li><a class="nav-button" href="../index.php">Home</a></li>
                        <li><a class="nav-button" href="#">Create</a></li>
                        <li><a class="nav-button" href="view.php">View</a></li>
                        <li><a class="nav-button" href="#">Update</a></li>
                        <li><a class="nav-button" href="#">Delete</a></li>
                </ul>
                <a class="login-btn" href="">Log in</a>
            </nav>
    </header>
    <main>
        <h3>Create</h3>
        <div>
            <form action="../includes/formhandler.php" method="post">
                <input type="text" name="supplier_name" placeholder="Supplier name">
                <input type="text" name="contact_person" placeholder="Contact person">
                <input type="text" name="contact_number" placeholder="Contact number">
                <button>Submit</button>
            </form>
        </div>
        <h3>Delete</h3>
        <div>
            <form action="../includes/delete.php" method="post">
                <input type="text" name="supplier_name" placeholder="Supplier name">
                <input type="text" name="contact_person" placeholder="Contact person">
                <button>Submit</button>
            </form>
        </div>
        <h3>Update</h3>
        <div>
            <form action="../includes/update.php" method="post">
                <input type="text" name="supplier_name" placeholder="Supplier name">
                <input type="text" name="contact_person" placeholder="Contact person">
                <input type="text" name="contact_number" placeholder="Contact number">
                <button>Submit</button>
            </form>
        </div>
    </main>
</body>
</html>
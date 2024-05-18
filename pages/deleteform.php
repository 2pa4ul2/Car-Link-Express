<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/create.css">
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
                        <li><a class="nav-button" href="create.php">Create</a></li>
                        <li><a class="nav-button" href="updateform.php">Update</a></li>
                        <li><a class="nav-button" href="deleteform.php">Delete</a></li>
                        <li><a class="nav-button" href="view.php">Display</a></li>
                        <li><a class="nav-button" href="#">Query</a></li>
                </ul>
                <a class="login-btn" href="">Log in</a>
            </nav>
    </header>
    <main>
        <div class="container">
            <div class="content-btn">
                    <button class="tab-btn-secondary">Supplier</button>
                    <button class="tab-btn-secondary">Category</button>
                    <button class="tab-btn-secondary">Product</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                        <div>
                            <form action="../includes/delete.php" name="form_type" method="post">
                                <label for="supplier_name">Supplier Name</label>
                                <input class="form-input type="text" name="supplier_name" placeholder="Enter Supplier Name"><br>
                                <label for="contact_person">Contact Person</label>
                                <input class="form-input type="text" name="contact_person" placeholder="Enter Contact Person Name"><br>
                                <label for="contact_number">Contact Number</label>
                                <input class="form-input type="number" name="contact_number" placeholder="Enter Contact Number"><br>
                                <button class="submit-btn">Submit</button>
                            </form>
                        </div>
                </div>


                <div class="content">
                    <div>
                        <form action="../includes/delete.php" method="post">
                            <label for="category_name">Category Name</label>
                            <select class="select" name="category_name" id="">
                                <option value="None">None</option>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT * FROM category";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                                    }
                                ?>
                            </select>
                            <button class="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>


                <div class="content">
                    <div>
                        <form action="../includes/formhandler.php" method="post">
                            <label for="product_name">Product Name</label>
                            <input class="form-input type="text" name="product_name" placeholder="Enter Product Name">
                            <label for="supplier_id">Supplier Id</label>
                            <select class="select" name="supplier_id" id="">
                                <option value="None">None</option>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT * FROM supplier";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "<option value='" . $row['supplier_id'] . "'>" . $row['supplier_id'] . "</option>";
                                    }
                                ?>
                                <option value="none"></option>
                            </select>
                            <label for="category_id">Category Id</label>
                            <select class="select" name="category_id" id="">
                                <option value="None">None</option>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT * FROM category";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_id'] . "</option>";
                                    }
                                ?>
                                <option value="none"></option>
                            </select>
                            <label for="price">price</label>
                            <input class="form-input type="number" name="price" placeholder="Enter Price Name">
                            <button class="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="../assets/js/script.js"></script>
</body>
</html>
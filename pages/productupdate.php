<?php
// Include necessary files and initialize database connection
require_once "../includes/db.php";

// Check if product_id is set
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product data corresponding to the product ID
    $query = "SELECT * FROM product WHERE product_id = :product_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['product_id' => $product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch supplier data
    $query = "SELECT * FROM supplier";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch category data
    $query = "SELECT * FROM category";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if form is submitted for updating product
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
        $product_name = $_POST['product_name'];
        $supplier_id = $_POST['supplier_id'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];

        // Update product details in the database
        $update_query = "UPDATE product SET product_name = :product_name, supplier_id = :supplier_id, category_id = :category_id, price = :price WHERE product_id = :product_id";
        $update_stmt = $pdo->prepare($update_query);
        $update_stmt->execute([
            'product_name' => $product_name,
            'supplier_id' => $supplier_id,
            'category_id' => $category_id,
            'price' => $price,
            'product_id' => $product_id
        ]);

        // Redirect to view page after updating
        header("Location: view.php");
        exit();
    }
} else {
    // Redirect if product_id is not set
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/update.css">
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
                        <li><a class="nav-button" href="deleteform.php">Modify</a></li>
                        <li><a class="nav-button" href="view.php">Display</a></li>
                        <li><a class="nav-button" href="#">Query</a></li>
                </ul>
                <a class="login-btn" href="">Log in</a>
            </nav>
    </header>
    <main>
        <div class="container">
            <div class="content-btn">
                    <button class="tab-btn-secondary">Modify Product</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                        <div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?product_id=' . $product_id; ?>" method="post">
                                <label for="product_name">Product Name</label>
                                <input class="form-input" type="text" name="product_name" value="<?php echo isset($product['product_name']) ? $product['product_name'] : ''; ?>">

                                <label for="supplier_id">Supplier</label>
                                <select class="select" name="supplier_id">
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option value="<?php echo $supplier['supplier_id']; ?>" <?php echo ($product['supplier_id'] == $supplier['supplier_id']) ? 'selected' : ''; ?>>
                                            <?php echo $supplier['supplier_id']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <label for="category_id">Category</label>
                                <select class="select" name="category_id">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['category_id']; ?>" <?php echo ($product['category_id'] == $category['category_id']) ? 'selected' : ''; ?>>
                                            <?php echo $category['category_id']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <label for="price">Price</label>
                                <input class="form-input" type="number" name="price" value="<?php echo isset($product['price']) ? $product['price'] : ''; ?>">

                                <button class="submit-btn" type="submit" name="update_product">Submit</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

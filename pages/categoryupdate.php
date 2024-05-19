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
                    <button class="tab-btn-secondary">Update Category</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                        <div>
                            <?php include "../includes/update.php"?>
                            <form action="../pages/updateform.php?new_category_id=<?php echo $category_id;?>" name="form_type" method="post">
                                <label for="category_name">Category Name</label>
                                <input class="form-input" type="text" name="category_name" value="<?php echo $row['category_name'] ?>"><br>
                                <button class="submit-btn" name="update_category" value="Update">Submit</button> 
                            </form>

                            </form>
                        </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>

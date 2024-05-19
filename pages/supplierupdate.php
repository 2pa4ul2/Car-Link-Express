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
                        <li><a class="nav-button" href="querycategory.php">Query 1</a></li>
                        <li><a class="nav-button" href="querydistributed.php">Query 2</a></li>
                </ul>
                <a class="login-btn" href="">Log in</a>
            </nav>
    </header>
    <main>
        <div class="container">
            <div class="content-btn">
                    <button class="tab-btn-secondary">Update Supplier</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                        <div>
                            <?php include "../includes/update.php"?>
                            <form action="../pages/supplierupdate.php?new_supplier_id=<?php echo $supplier_id;?>" name="form_type" method="post">
                                <label for="supplier_name">Supplier Name</label>
                                <input class="form-input" type="text" name="supplier_name" value="<?php echo $row['supplier_name'] ?>"><br>
                                <label for="contact_person">Contact Person</label>
                                <input class="form-input" type="text" name="contact_person" value="<?php echo $row['contact_person'] ?>"><br>
                                <label for="contact_number">Contact Number</label>
                                <input class="form-input" type="number" name="contact_number" value="<?php echo $row['contact_number'] ?>"><br>
                                <button class="submit-btn" name="update_supplier" value="Update">Submit</button> 
                            </form>

                            </form>
                        </div>
                </div>
            </div>
        </div>
    </main>


</body>
</html>
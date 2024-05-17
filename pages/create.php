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
                        <li><a class="nav-button" href="#">Create</a></li>
                        <li><a class="nav-button" href="view.php">View</a></li>
                        <li><a class="nav-button" href="#">Update</a></li>
                        <li><a class="nav-button" href="#">Delete</a></li>
                </ul>
                <a class="login-btn" href="">Log in</a>
            </nav>
    </header>
    <main>
            <div class="tab-box">
                <button class="tab-btn">Create</button>
                <button class="tab-btn">Update</button>
                <button class="tab-btn">Delete</button>
            </div>

        <div class="container">
            <div class="content-btn">
                    <button class="tab-btn-secondary">Supplier</button>
                    <button class="tab-btn-secondary">Category</button>
                    <button class="tab-btn-secondary">Product</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                        <h3>Create</h3>
                        <div>
                            <form action="../includes/formhandler.php" method="post">
                                <input type="text" name="supplier_name" placeholder="Supplier name">
                                <input type="text" name="contact_person" placeholder="Contact person">
                                <input type="text" name="contact_number" placeholder="Contact number">
                                <button>Submit</button>
                            </form>
                        </div>
                </div>


                <div class="content">
                    <h3>Update</h3>
                    <div>
                        <form action="../includes/update.php" method="post">
                            <input type="text" name="supplier_name" placeholder="Supplier name">
                            <input type="text" name="contact_person" placeholder="Contact person">
                            <input type="text" name="contact_number" placeholder="Contact number">
                            <button>Submit</button>
                        </form>
                    </div>
                </div>


                <div class="content">
                    <h3>Delete</h3>
                    <div>
                        <form action="../includes/delete.php" method="post">
                            <input type="text" name="supplier_name" placeholder="Supplier name">
                            <input type="text" name="contact_person" placeholder="Contact person">
                            <button>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

    <script>
        const tabs = document.querySelectorAll('.tab-btn');
        const containers = document.querySelectorAll('.container');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach(tab => tab.classList.remove('active'));
                tab.classList.add('active');

                
            });
        });

        const secondaryTabs = document.querySelectorAll('.tab-btn-secondary');
        const secondaryContents = document.querySelectorAll('.content'); // Adjust if these have different content containers

        secondaryTabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                secondaryTabs.forEach(tab => tab.classList.remove('active'));
                tab.classList.add('active');

                var line = document.querySelector('.line');
                line.style.width = tab.offsetWidth + 'px';
                line.style.left = tab.offsetLeft + 'px';

                // Hide all secondary contents
                secondaryContents.forEach(content => content.style.display = 'none');
                // Show the corresponding secondary content
                secondaryContents[index].style.display = 'block';
            });
        });
    </script>
</body>
</html>
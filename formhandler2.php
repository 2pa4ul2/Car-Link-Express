<?php

if ($_SERVER["REQUEST_METHOD"]== "POST"){ #check if the form has been submitted
    require 'db.php';

    $supplier_name = $_POST['supplier_name'];
    $contact_person = $_POST['contact_person'];
    $contact_number = $_POST['contact_number'];

    try{
        require_once "db.php";#call the file the connects to database
        
        $query = "INSERT INTO supplier(supplier_name, contact_person, contact_number) VALUES(:supplier_name, :contact_person, :contact_number);";#the query to be executed

        $stmt = $pdo -> prepare($query);#prepare the query

        $stmt -> bindParam(':supplier_name', $supplier_name);#bind the parameters
        $stmt -> bindParam(':contact_person', $contact_person);#bind the parameters
        $stmt -> bindParam(':contact_number', $contact_number);#bind the parameters

        $stmt ->execute();#execute the query

        $pdo = null;
        $stmt = null;

        header("Location: ../pages/create.php?message=success");#redirect the same page after submitting

        die("Supplier added successfully");#end the script

    } catch(PDOException $e){
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }

} else {
    header("Location: ../pages/create.php");
}




// <?php
// require_once 'db.php';

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Determine which form was submitted based on the presence of specific form fields
//     if (isset($_POST['supplier_name']) && isset($_POST['contact_person']) && isset($_POST['contact_number'])) {
//         // Handle Supplier form submission
//         $supplierName = $_POST['supplier_name'];
//         $contactPerson = $_POST['contact_person'];
//         $contactNumber = $_POST['contact_number'];

//         // Validate inputs
//         if (!empty($supplierName) && !empty($contactPerson) && !empty($contactNumber)) {
//             $query = "INSERT INTO supplier (supplier_name, contact_person, contact_number) VALUES (?, ?, ?)";
//             $stmt = $pdo->prepare($query);
//             if ($stmt->execute([$supplierName, $contactPerson, $contactNumber])) {
//                 header("Location: ../pages/create.php");
//             } else {
//                 echo "Failed to add supplier.";
//             }
//         } else {
//             echo "All fields are required.";
//         }


//     } elseif (isset($_POST['category_name'])) {
//         // Handle Category form submission
//         $categoryName = $_POST['category_name'];

//         // Validate inputs
//         if (!empty($categoryName)) {
//             $query = "INSERT INTO category (category_name) VALUES (?)";
//             $stmt = $pdo->prepare($query);
//             if ($stmt->execute([$categoryName])) {
//                 header("Location: ../pages/create.php");
//             } else {
//                 echo "Failed to add category.";
//             }
//         } else {
//             header("Location: ../pages/create.php");
//         }  echo "All fields are required.";

        
//     } elseif (isset($_POST['product_name']) && isset($_POST['supplier_id']) && isset($_POST['category_id']) && isset($_POST['price'])) {
//         // Handle Product form submission
//         $productName = $_POST['product_name'];
//         $supplierId = $_POST['supplier_id'];
//         $categoryId = $_POST['category_id'];
//         $price = $_POST['price'];

//         // Validate inputs
//         if (!empty($productName) && !empty($supplierId) && !empty($categoryId) && !empty($price)) {
//             $query = "INSERT INTO product (product_name, supplier_id, category_id, price) VALUES (?, ?, ?, ?)";
//             $stmt = $pdo->prepare($query);
//             if ($stmt->execute([$productName, $supplierId, $categoryId, $price])) {
//                 header("Location: ../pages/create.php");
//             } else {
//                 echo "Failed to add product.";
//             }
//         } else {
//             echo "All fields are required.";
//         }
//     } else {
//         echo "Invalid form submission.";
//     }
// } else {
//     echo "Invalid request method.";
// }
// ?>

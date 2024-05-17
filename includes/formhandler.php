<?php

if ($_SERVER["REQUEST_METHOD"]== "POST"){ #check if the form has been submitted
    require 'db.php';

    if(isset($_POST['supplier_name']) && isset($_POST['supplier_name']) && isset($_POST['supplier_name'])){
        
        $supplier_name = $_POST['supplier_name']; 
        $contact_person = $_POST['contact_person']; 
        $contact_number = $_POST['contact_number'];
        
        if (empty($_POST['supplier_name']) || empty($_POST['contact_person']) || empty($_POST['contact_number'])) {
            die("Please fill in all fields");
        }        

        try{
            
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
    }
    elseif(isset($_POST['category_name'])){
        
        $category_name = $_POST['category_name']; 

        if (empty($_POST['category_name'])) {
            die("Please fill in all fields");
        }      
        
        try{
            
            $query = "INSERT INTO category(category_name) VALUES(:category_name);";#the query to be executed
    
            $stmt = $pdo -> prepare($query);#prepare the query
    
            $stmt -> bindParam(':category_name', $category_name);#bind the parameters
    
            $stmt ->execute();#execute the query
    
            $pdo = null;
            $stmt = null;
    
            header("Location: ../pages/create.php?message=success");#redirect the same page after submitting
    
            die("Supplier added successfully");#end the script
    
        } catch(PDOException $e){
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    }
    elseif(isset($_POST['product_name']) && isset($_POST['supplier_id']) && isset($_POST['category_id']) && isset($_POST['price'])){
        
        $product_name = $_POST['product_name']; 
        $supplier_id = $_POST['supplier_id']; 
        $category_id = $_POST['category_id'];  
        $price = $_POST['price']; 
        
        if (empty($_POST['product_name']) || empty($_POST['supplier_id']) || empty($_POST['category_id']) || empty($_POST['price'])) {
            die("Please fill in all fields");
        }      

        try{
            
            $query = "INSERT INTO product(product_name, supplier_id, category_id, price) VALUES(:product_name, :supplier_id, :category_id, :price);";#the query to be executed
    
            $stmt = $pdo -> prepare($query);#prepare the query
    
            $stmt -> bindParam(':product_name', $product_name);#bind the parameters
            $stmt -> bindParam(':supplier_id', $supplier_id);#bind the parameters
            $stmt -> bindParam(':category_id', $category_id);#bind the parameters
            $stmt -> bindParam(':price', $price);#bind the parameters
    
            $stmt ->execute();#execute the query
    
            $pdo = null;
            $stmt = null;
    
            header("Location: ../pages/create.php?message=success");#redirect the same page after submitting
    
            die("Supplier added successfully");#end the script
    
        } catch(PDOException $e){
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    }

    header("Location: ..pages/create.php");
    exit();

} else {
    header("Location: ../pages/create.php");
}

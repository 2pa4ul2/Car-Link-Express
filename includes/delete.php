<?php

if ($_SERVER["REQUEST_METHOD"]== "POST"){ #check if the form has been submitted
    require 'db.php';

    if(isset($_POST['category_name'])){
        $category_name = $_POST['category_name'];

        if (empty($_POST['category_name'])) {
            die("Please fill in all fields");
        }
        try{
            require_once "db.php";#call the file the connects to database

            $query = "DELETE FROM category WHERE category_name = :category_name;";#the query to be executed

            $stmt = $pdo -> prepare($query);#prepare the query

            $stmt -> bindParam(':category_name', $category_name);#bind the parameters

            $stmt ->execute();#execute the query

            $pdo = null;
            $stmt = null;

            header("Location: ../pages/deleteform.php?message=success");#redirect the same page after submitting

            die("Category deleted successfully");#end the script

        } catch(PDOException $e){
            die("Could not connect to the database $dbname :" . $e->getMessage());
        }
    }
    else{
        header("Location: ../pages/deleteform.php");
    }

} else {
    header("Location: ../pages/deleteform.php");
}
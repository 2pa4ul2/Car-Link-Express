<?php

if ($_SERVER["REQUEST_METHOD"]== "POST"){ #check if the form has been submitted
    require 'db.php';

    $supplier_name = $_POST['supplier_name'];
    $contact_person = $_POST['contact_person'];
    $contact_number = $_POST['contact_number'];

    try{
        require_once "db.php";#call the file the connects to database

        $query = "DELETE FROM  supplier WHERE supplier_name = :supplier_name AND contact_person = :contact_person;";#the query to be executed

        $stmt = $pdo -> prepare($query);#prepare the query

        $stmt -> bindParam(':supplier_name', $supplier_name);#bind the parameters
        $stmt -> bindParam(':contact_person', $contact_person);#bind the parameters

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
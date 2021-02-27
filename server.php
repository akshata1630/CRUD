<?php
    session_start();

    //initialize variable
    $name = "";
    $address = "";
    $id = 0;
    $edit_state = false;
    //connect to the database
    $db = mysqli_connect('localhost','root','','Crud');

    //if saved button is clicked
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
       
    


        $query = "INSERT INTO info (name, address) VALUES ('$name','$address')";
        mysqli_query($db, $query);
        $_SESSION['msg']= "Save Successfully";
        header('location: index.php');// redirect to index page after inserting
    }

    //update record
    if (isset($_POST['update'])) {
       
       $name = $_POST['name'];
       $address = $_POST['address'];
       
       $id = $_POST['id'];

        mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id ");
        $_SESSION['msg'] = "Update Successfully";
        header('location: index.php');
    }

    //delete record
    if (isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['msg'] = "Delete Successfully";
        header('location: index.php');
    }

    //retrive record
    $results = mysqli_query($db, "SELECT * FROM info");
?>

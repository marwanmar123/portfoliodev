<?php
    session_start();
    $nonavbar = '';
    include '../init.php';
    if(isset($_SESSION['username'])){
        
    }else{
        header('location : index.php');
        exit();
    }


    if(isset($_POST['btn-add'])) {
        $name = $_POST['user_name'];
        $descr = $_POST['descr'];
        $link = $_POST['link'];
        $image = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $imageSize = $_FILES['profile']['size'];

        $upload_dir = 'uploads/';
        $imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION));
        $valid_extention = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        $stmt = $conn->prepare("INSERT INTO works(username, picProfile,`description`, link) VALUE (:uname, :upic, :descr, :link)");
        $stmt->bindParam(':uname', $name);
        $stmt->bindParam(':upic', $picProfile);
        $stmt->bindParam(':descr', $descr);
        $stmt->bindParam(':link', $link);

        if($stmt->execute()){
            ?>
<script>
alert('new record success')
// window.location.href=('index.php')
</script>

<?php

        }else{
            ?>
<script>
alert('error')
// window.location.href=('index.php')
</script>

<?php
        }
    }
    


?>

<div>
    <h1>insert image</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>username</label>
        <input type="text" name="user_name" class="" required placeholder="name">
        <label>description</label>
        <input type="text" name="descr" class="" required placeholder="description">
        <label>link</label>
        <input type="text" name="link" class="" required placeholder="link of projects">
        <label>image</label>
        <input type="file" name="profile" accept="*/image" required>
        <button type="submit" name="btn-add">add new</button>
    </form>
    <a href="logout.php">logout</a>
</div>





















<!-- <a href="../init.html"></a>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styling/public/build/tailwind.css">
</head>

<body>

</body>

</html> -->
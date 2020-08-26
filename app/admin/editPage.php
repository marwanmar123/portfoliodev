<?php
include '../includes/header.php';
include '../init.php';

    if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $stmt_eidt = $conn->prepare("SELECT * FROM works WHERE id=:uid");
        $stmt_eidt->execute(array(':uid'=>$id));
        $edit_row= $stmt_eidt->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }else{
        header('location : dashbord.php');
    }

    if(isset($_POST['btn-edit'])) {
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
        unlink($upload_dir.$edit_row['picProfile']);
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        $stmt = $conn->prepare("UPDATE works SET username=:uname, picProfile=:upic, description=:descr, link=:link WHERE id=:uid");
        $stmt->bindParam(':uname', $name);
        $stmt->bindParam(':upic', $picProfile);
        $stmt->bindParam(':descr', $descr);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':uid', $id);

        if($stmt->execute()){
            ?>
<script>
alert('new update success')
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

<nav class="flex fixed h-full flex-col p-4 bg-gray-800 w-24">
    <img src="../../styling/img/logo.png" class="w-2/3">
    <div class="flex flex-col items-center">
        <a id="home" href="dashbord.php"><i
                class="text-gray-200 hover:text-teal-400 p-4 m-3 text-sm md:text-lg fas fa-tachometer-alt icon"
                data-hover="Dashbord"></i>
        </a>
        <a href="logout.php"><i
                class="text-gray-200 hover:text-teal-400 p-4 m-3 text-sm md:text-lg fas fa-sign-out-alt icon"
                data-hover="logout"></i>
        </a>
    </div>
</nav>


<div class="md:ml-32 text-white flex justify-center">
    <form class=" mt-4" method="POST" enctype="multipart/form-data">
        <label class="block text-gray-700 text-lg font-bold mb-2">username</label>
        <input type="text" name="user_name"
            class="w-full bg-white text-black border border-gray-400 rounded-md py-3 px-4"
            value="<?php echo $username; ?>" placeholder="name">
        <label class="block text-gray-700 text-lg font-bold mb-2">link</label>
        <input type="text" name="link" class="w-full bg-white text-black border border-gray-400 rounded-md py-3 px-4"
            value="<?php echo $link; ?>" placeholder="link of projects">
        <div class="img">
            <img class="" src="uploads/<?php echo $picProfile?>">
            <label class="block text-gray-700 text-lg font-bold mb-2">image</label>
            <input type="file" name="profile" accept="*/image"
                class="w-full bg-white text-black border border-gray-400 rounded-md py-3 px-4" required>
        </div>
        <label class="block text-gray-700 text-lg font-bold mb-2">description</label>
        <textarea name="descr"
            class="bg-gray-100 rounded-md border w-full h-20 py-2 px-3 border-gray-400 font-medium text-black"
            placeholder="<?php echo $description; ?>"></textarea>
        <button type="submit" name="btn-edit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">edit</button>
    </form>
</div>
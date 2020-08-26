<?php
    
    include '../includes/header.php';

    session_start();
    $nonavbar = '';
    include '../init.php';
    if(isset($_SESSION['username'])){
        
    }else{
        header('location : index.php');
        exit();
    }

    // <!-- /////////////////////////// delete /////////////////// -->



if(isset($_GET['delete_id'])){
    $stmt_select = $conn->prepare("SELECT * FROM works WHERE id =:uid");
    $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
    $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("uploads/".$imgRow['picProfile']);
    $stmt_delete=$conn->prepare("DELETE FROM works WHERE id =:uid");
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    if($stmt_delete->execute()){
        header('location: dashbord.php');
    }
}
//////////////::end delete ////////:::


//////////////////////////////////insertion //////////////////
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
$stmt = $conn->prepare("INSERT INTO works(username, picProfile,`description`, link) VALUE (:uname, :upic, :descr,
:link)");
$stmt->bindParam(':uname', $name);
$stmt->bindParam(':upic', $picProfile);
$stmt->bindParam(':descr', $descr);
$stmt->bindParam(':link', $link);

if($stmt->execute()){

?>
<script>
alert('new record success')
window.location.href = ('dashbord.php');
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
            class="w-full bg-white text-black border border-gray-400 rounded-md py-3 px-4" required placeholder="name">
        <label class="block text-gray-700 text-lg font-bold mb-2">link</label>
        <input type="text" name="link" class="w-full bg-white text-black border border-gray-400 rounded-md py-3 px-4"
            required placeholder="link of projects">
        <label class="block text-gray-700 text-lg font-bold mb-2">image</label>
        <input type="file" name="profile" accept="*/image"
            class="w-full bg-white text-black border border-gray-400 rounded-md py-3 px-4" required>
        <label class="block text-gray-700 text-lg font-bold mb-2">description</label>
        <textarea name="descr"
            class="bg-gray-100 rounded-md border w-full h-20 py-2 px-3 border-gray-400 font-medium text-black"
            placeholder="description"></textarea>
        <button type="submit" name="btn-add"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">add new</button>
    </form>
</div>

<!-- ////////////////////end insertion /////////////////////// -->

<!-- //////////////////////affichage//////////// -->

<div class="p-6 w-3/4 md:m-auto">
    <div class="md:ml-24 flex flex-col md:flex-row flex-wrap justify-around p-12">
        <?php 
      $stmt=$conn->prepare('SELECT * FROM works ORDER BY id DESC');
      $stmt->execute();
      if($stmt->rowCount()>0)
      {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          ?>
        <div class="card">
            <div class="box">
                <div class="fontprnc img">
                    <img class="" src="uploads/<?php echo $row['picProfile']?>">
                </div>
                <div class="contenu">
                    <div>
                        <h1 class="">
                            <a href="<?php echo $link ?>" target="_blanck"
                                class="bg-transparent hover:bg-blue-400 text-blue-400 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded flex justify-center"><?php echo $username ?>
                            </a>
                        </h1>
                        <p class=""><?php echo $description ?></p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <a class="m-6 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    href="?delete_id=<?php echo $row['id'] ?>">delete</a>
                <a class="m-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    href="editPage.php?edit_id=<?php echo $row['id'] ?>">edit</a>
            </div>
        </div>

        <?php
        }
      }
      ?>
    </div>

</div>
<!-- //////////////////////end affichage//////////// -->





















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
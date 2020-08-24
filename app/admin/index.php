<?php
    include '../includes/header.php'; 

    session_start();
    $nonavbar = '';
    
    // if(isset($_SESSION['username'])){
    //     header('location : admin/dashbord.php');
    // }
    
    include '../init.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['pass'];
        $hashedPass = sha1($password);

        $stmt = $conn->prepare("SELECT username,`password` FROM admin WHERE username = ? AND `password` = ?");
        $stmt->execute(array($username,$hashedPass));
        $count = $stmt->rowCount();
        if($count > 0){
            
            $_SESSION['username'] = $username;
            header('location: dashbord.php');
            exit();
        }
        
        
        
    }

?>



<div class="w-1/2 md:w-1/4 m-auto">
    <h1 class="text-center font-bold p-6 text-5xl">Login form</h1>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="<?php echo $_SERVER['PHP_SELF'] ?>"
        method="POST">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
            </label>
            <input class="shadow border rounded w-full py-2 px-3 text-gray-700" name="username" type="text"
                placeholder="Username">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow border rounded w-full py-2 px-3 text-gray-700 mb-3" name="pass" type="password"
                placeholder="password">
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit"
                value="login">
                Sign In
            </button>
        </div>
    </form>

</div>


<?php include '../includes/footer.php' ?>

















<!-- <a href="../includes/header.html"></a> -->

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
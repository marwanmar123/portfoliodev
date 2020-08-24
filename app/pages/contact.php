<?php
    include '../init.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);


        $formErrors = array();
        if (strlen($user) < 3){
            $formErrors[] = 'username must be large than 3 caracters';
        }
        if (strlen($msg) < 10){
            $formErrors[] = 'the message can\'t be less than 10 caracters';
        }
        $headers = 'from:' . $email . '\r\n';
        $myemail = 'php.mail111@gmail.com';
        $subject = 'contact form';
         if(empty($formErrors)){
             if(mail($myemail, $subject, $msg, $headers)){
                 echo 'msg env';
             }
         }
    }


?>


<div class="md:ml-12 md:p-12 flex justify-center">
    <div class="w-2/3 md:w-1/3">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="<?php echo $_SERVER['PHP_SELF'] ?>"
            method="POST">
            <div class="mb-2">
                <?php if(!empty($formErrors)){ ?>
                <div>
                    <?php
                    foreach($formErrors as $errors){
                        echo $errors . '<br />';
                         }?>
                </div>
                <?php } 
                ?>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" placeholder="username" name="username">
            </div>
            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="email" placeholder="exemple@exemple.com" name="email">
            </div>
            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    phone
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="phone" type="number" placeholder="your phone" name="phone">
            </div>
            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    message
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="message" type="message" placeholder="your message!" name="message"></textarea>
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    send
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>
    </div>

</div>

<?php include '../includes/footer.php'; ?>


<!-- <a href="../includes/sidebar.html"></a>


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
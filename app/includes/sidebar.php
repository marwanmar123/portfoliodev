<?php
    include 'header.php';
    

    
?>


<div class="flex flex-row justify-around block md:hidden">
    <h1 class="nom p-4 text-white text-xl w-1/3 font-bold">maryo</h1>
    <a href="#"><i id="togl" class="text-gray-200 hover:text-teal-400 p-6 text-xl fas fa-bars"></i></a>
</div>
<nav id="navOver" class="block flex flex-row hidden md:hidden m-auto mx-12">
    <a id="home" href="index.php"><i class="text-gray-200 hover:text-teal-400 p-4 text-2xl fas fa-home icon"
            data-hover="Home"></i></a>
    <a id="about" href="about.php"><i class="text-gray-200 hover:text-teal-400 p-4 text-2xl fas fa-user icon"
            data-hover="About"></i></a>
    <a id="skills" href="skills.php"><i class="text-gray-200 hover:text-teal-400 p-4 text-2xl fas fa-address-card icon"
            data-hover="Skills"></i></a>
    <a id="works" href="works.php"><i class="text-gray-200 hover:text-teal-400 p-4 text-2xl fas fa-project-diagram icon"
            data-hover="Works"></i></a>
    <a id="contact" href="contact.php"><i class="text-gray-200 hover:text-teal-400 p-4 text-2xl fas fa-envelope icon"
            data-hover="Contact"></i></a>
    <a href="#"><i id="close" class="text-red-500 hover:text-teal-400 p-4 text-md far fa-window-close"></i></i></a>
</nav>
<div class="hidden md:block">
    <nav class="flex fixed h-full flex-col p-4 bg-gray-800 w-24">
        <a class="mb-40" href="index.php">
            <img src="../../styling/img/logo.png" class="w-2/3">
        </a>
        <div class="flex flex-col items-center">
            <a id="home" href="index.php"><i
                    class="text-gray-200 hover:text-teal-400 p-4 m-3 text-sm md:text-lg fas fa-home icon"
                    data-hover="Acceuil"></i></a>
            <a id="about" href="about.php"><i
                    class="text-gray-200 hover:text-teal-400 p-4 m-2 text-sm md:text-lg fas fa-user icon"
                    data-hover="À propos"></i></a>
            <a id="skills" href="skills.php"><i
                    class="text-gray-200 hover:text-teal-400 p-4 m-2 text-sm md:text-lg fas fa-address-card icon"
                    data-hover="Compétence"></i></a>
            <a id="works" href="works.php"><i
                    class="text-gray-200 hover:text-teal-400 p-4 m-2 text-sm md:text-lg fas fa-project-diagram icon"
                    data-hover="Portfolio"></i></a>
            <a id="contact" href="contact.php"><i
                    class="text-gray-200 hover:text-teal-400 p-4 m-2 text-sm md:text-lg fas fa-envelope icon"
                    data-hover="Contact"></i></a>
        </div>
        <div class="social flex flex-col mt-56">
            <a href="https://github.com/marwanmar123" target="_blanck"><i
                    class="text-gray-200 hover:text-teal-400 p-4 text-sm md:text-lg fab fa-github"></i></a>
            <a href="https://www.linkedin.com/in/marouan-khadiri-ba53411a3/" target="_blanck"><i
                    class="text-gray-200 hover:text-teal-400 p-4 text-sm md:text-lg fab fa-linkedin-in"></i></a>
            <a href="#"><i class="text-gray-200 hover:text-teal-400 p-4 text-sm md:text-lg fab fa-facebook-f"></i></a>
        </div>
    </nav>
</div>
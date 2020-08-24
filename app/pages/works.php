<?php

    include '../init.php';

  //   function limite_caractere(string $chaine, $max = 70)
  // {
  //   $chaine = strip_tags($chaine);
  //   if (strlen($chaine) >= $max) {
  //     $chaine = substr($chaine, 0, $max);
  //     $espace = strrpos($chaine, " ");
  //     $chaine = substr($chaine, 0, $espace) . " ...";
  //   }
  //   echo $chaine;
  // }

?>


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
                    <img class="" src="../admin/uploads/<?php echo $row['picProfile']?>">
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
        </div>

        <?php
        }
      }
      ?>
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Side</title>

    <!-- Style -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }
</style>

<body>
    <div class="flex" id="index">
        <?php include('./sidebar.php') ?>
        <div class="w-full">
            <div class="flex w-full p-5 gap-5">
                <div class="flex bg-white text-black w-full justify-between items-center p-6 shadow-lg rounded">
                    <div class="flex items-center gap-5">
                        <img src="./photo/My Profile.jpg" alt="" class="w-10 h-10 rounded-full">
                        <h1 class="font-bold text-xl">WELCOME TO ADMIN: <?php echo $_SESSION['username'];?>
                            
                        </h1>
                    </div>
                    <div>
                        <?php
                        $date = date('Y-m-d');
                        $time = date('h:m');
                        echo 'Date: ' . $date . '<br>';
                        echo 'Time: ' . $time;

                        ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>
</html>

<?php
    if(empty($_SESSION['email'])){
        if(empty($_SESSION['password'])){
            echo'
            <script>window.location.href = "./login.php"</script>
            ';
        }
    }
?>

<style>
    #index {
        background: linear-gradient(to top, #dfe9f3 0%, white 100%);
    }   
</style>


    


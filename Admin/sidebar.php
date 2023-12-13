<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStore</title>
    <!-- Style -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- FlowBite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }
</style>

<body>
    <div class="sidebar w-80 bg-white h-screen flex flex-col align-middle p-2.5 shadow-lg rounded">
        <div class="flex justify-evenly text-black py-8">
        <a href="./index.php" class="flex items-center">
                <img src="../Admin/photo/razer--logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
        </a>
        </div>
        <hr class="border border-gray-200">
        <div>
            <ul class="flex flex-col gap-5 py-5">
                <li class="bg-gray-200 rounded p-2.5 text-lg flex justify-evenly text-black hover:bg-gray-300 duration-500 font-bold">
                    <a href="./index.php">Dashboard</a>
                </li>
                <li class="bg-gray-200 rounded p-2.5 text-lg flex justify-evenly text-black hover:bg-gray-300 duration-500 font-bold">
                    <a href="./add.php">Add Product</a>
                </li>
                <li class="bg-gray-200 rounded p-2.5 text-lg flex justify-center text-black hover:bg-gray-300 duration-500 font-bold">
                    <a href="./view.php">View Product</a>
                </li>
                <li class="bg-gray-200 rounded p-2.5 text-lg flex justify-center text-black hover:bg-gray-300 duration-500 font-bold">
                    <a href="./feedback.php">View Feedback</a>
                </li>
            </ul>

        </div>
        <form action="" method="post" class="h-full flex flex-col justify-end text-center">
                <button type="submit" class="bg-gray-200 rounded p-2.5 text-lg w-full text-black hover:bg-red-500 ease-in-out duration-500 font-bold hover:text-white" name="logout">Sign Out</button>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['logout'])) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    echo"
    <script>window.location.href = './login.php'</script>
    ";
}
?>
<?php
    if(empty($_SESSION['email'])){
        if(empty($_SESSION['password'])){
            echo'
            <script>window.location.href = "./login.php"</script>
            ';
        }
    }
?>
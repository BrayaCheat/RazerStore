<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<!-- Style -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }

    .wrap--login {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        width: 1200px;
        height: 900px;
        border-radius: 10px;
        overflow: hidden;
    }

    #banner {
        rotate: 90deg;
        object-fit: cover;
    }
    input[type=checkbox] {
        width: 20px;
        height: 20px;
        border: 1px solid black;
        background-color: white;
    }

    #register{
        background: linear-gradient(to top, #dfe9f3 0%, white 100%);
    }


</style>

<body>
    <div id="register" class="w-full h-screen grid md:grid-cols-1 grid-cols-1">
        <div class="wrap--login flex flex-col items-center p-5 shadow-lg md:mx-0 mx-28">
                <div class="p-5">
                    <i class="fa-solid fa-user-secret text-zinc-900 bg-gray-500 p-5 rounded-full text-5xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-black">Sign <span class="text-black">Up</span></h1>
                </div>
                <hr class="w-6/12 border border-gray-700 my-10">
                <div class="w-full">
                    <form action="" method="post" enctype="multipart/form-data" class="text-white">
                        <div class="w-full flex gap-5 p-5">
                            <input type="text" placeholder="FirstName" required class="w-full border border-0 rounded bg-gray-200 p-5 text-black" name="fname" require>
                            <input type="text" placeholder="LastName" required class="w-full border border-0 rounded bg-gray-200 p-5 text-black" name="lname" require>
                        </div>
                        <div class="w-full p-5 flex gap-5">
                            <input type="text" placeholder="Email" required class="w-full border border-0 rounded bg-gray-200 p-5 text-black" name="email" require>
                            <input type="password" placeholder="Password" required class="w-full border border-0 rounded bg-gray-200 p-5 text-black" name="password" require>
                        </div>
                        <div class="w-full p-5">
                            
                        </div>
                        <div class="w-full p-5 flex justify-center">
                            <button class="border border-zinc-900 bg-inherit hover:bg-zinc-900 hover:text-white duration-500 text-black font-medium px-5 py-2 rounded shadow-lg w-6/12" name="register">Sign Up</button>
                        </div>  
                        <div class="w-full p-5 flex justify-center items-center gap-5">
                            <hr class="border border-gray-700 w-3/12">
                            <div>
                                <h1 class="text-black font-medium">Or Sign Up with</h1>
                            </div>                
                            <hr class="border border-gray-700 w-3/12">
                        </div>
                        <div class="w-full p-5 flex text-black text-2xl justify-center items-center gap-10">
                            <a href=""><i class="fa-brands fa-google"></i></a>
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-github"></i></a>
                        </div>
                        <div class="w-full p-5 flex justify-center">
                                <a href="./login.php" class="bg-inherit rounded px-5 py-2 text-black hover:bg-zinc-900 hover:text-white border border-zinc-900 font-medium shadow-lg duration-500">Already have an account / Sign In</a>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</body>

</html>
<?php
    if(isset($_POST['register'])){
        if(!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['email']) || !empty($_POST['password'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $connect = new mysqli('localhost','root','','my--store');
            $result = $connect->query("INSERT INTO `account`(`id`, `firstname`, `lastname`, `email`, `password`) VALUES (null,'$fname','$lname','$email','$password')");
            if($result == true){
                echo"
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'REGISTER SUCCESSFUL!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
                ";
            }
        }else{
            echo"
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'FILL THE BLANK :3',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
            ";
        }
    }
?>


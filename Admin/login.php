<?php
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<!-- Style -->
<script src="https://cdn.tailwindcss.com"></script>

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
        background-color: #ffffff;
        width: 600px;
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
    #login{
        background: linear-gradient(to top, #dfe9f3 0%, white 100%);
    }


</style>

<body>
    <div class="w-full h-screen" id="login">
        <div class="wrap--login flex flex-col items-center p-5 shadow-lg">
                <div class="p-5">
                    <i class="fa-solid fa-user-secret text-black bg-gray-200 p-5 rounded-full text-5xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-black">Sign <span class="text-black">In</span></h1>
                </div>
                <hr class="w-6/12 border border-zinc-900 my-10">
                <div class="w-full">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="w-full p-5">
                            <input type="text" placeholder="Email" required class="w-full border border-0 rounded bg-gray-200 p-5 text-black" name="email" require>
                        </div>
                        <div class="w-full p-5">
                            <input type="password" placeholder="Password" required class="w-full border border-0 rounded bg-gray-200 p-5 text-black" name="password" require>
                        </div>
                        <div class="w-full p-5 flex justify-between">
                            <div class="flex gap-3">
                                <input type="checkbox" class="">
                                <h1 class="text-black font-medium">Stay signed in</h1>
                            </div>
                            <div>
                                <a href="" class="text-black font-medium hover:underline duration-500">Forgot password?</a>
                            </div>
                        </div>
                        <div class="w-full p-5 flex justify-center">
                            <button class="border border-zinc-900 bg-inherit hover:bg-zinc-900 duration-500 text-black hover:text-white px-5 py-2 rounded shadow-lg font-medium w-6/12" name="login">Sign In</button>
                        </div>  
                        <div class="w-full p-5 flex justify-center items-center gap-5">
                            <hr class="border border-gray-700 w-3/12">
                            <div>
                                <h1 class="text-black font-medium">Or Sign In with</h1>
                            </div>                
                            <hr class="border border-gray-700 w-3/12">
                        </div>
                        <div class="w-full p-5 flex text-black text-2xl justify-center items-center gap-10">
                            <a href=""><i class="fa-brands fa-google"></i></a>
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-github"></i></a>
                        </div>
                        <div class="w-full p-5 flex justify-center">
                            <div class="w-6/12 flex bg-inherit rounded px-5 py-2 gap-2 text-black font-medium hover:bg-zinc-900 hover:text-white duration-500 shadow-lg border border-zinc-900">
                                <h1>Not a member?</h1>
                                <a href="./register.php">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</body>

</html>

<?php
    if(isset($_POST['login'])){
        if(!empty($_POST['email']) || !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $connect = new mysqli('localhost','root','','my--store');
            $result = $connect->query("SELECT * FROM `account` WHERE 1");

            while($row = mysqli_fetch_assoc($result)){
                
                if($email == $row['email']){
                    if($password == $row['password']){
                        $_SESSION['username'] = $row['firstname'].' '.$row['lastname']; 
                        echo'
                        <script> window.location.href = "./index.php"</script>
                        ';
                        die();
                    }
                }
            }
        }
    }
?>


   

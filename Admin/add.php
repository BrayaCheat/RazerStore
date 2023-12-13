<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Side</title>
</head>

<body>
    <section class="container-fluid">
        <div class="flex" id="add">
            <?php include('./sidebar.php') ?>
            <div class="w-full">
                <div class="flex w-full p-5 gap-5">    
                     
                    <div class="flex bg-white w-full justify-center items-center p-6 shadow-lg rounded">
                        <h1 class="font-bold text-xl text-black">ADDING NEW PRODUCT</h1>
                    </div>                 
                </div>
                <div class="bottom flex justify-end p-5 gap-5">
                    <form method="post" enctype="multipart/form-data" class="w-full h-full flex flex-col bg-white text-black p-5 rounded shadow-lg">
                        <div class="w-full p-5">
                            <label class="font-bold text-lg py-3">Product Name<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <input type="text" placeholder="Enter Product's Name" class="w-full p-3 rounded border border-zinc-900 bg-gray-200" name="name">
                        </div>
                        <div class="w-full p-5">
                            <label class="font-bold text-lg py-3">Price<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <input type="text" placeholder="Enter Product's Price" class="w-full p-3 rounded border border-zinc-900 bg-gray-200" name="price">
                        </div>
                        <div class="w-full p-5">
                            <label class="font-bold text-lg py-3">Quantity<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <input type="text" placeholder="Enter Product's QTY" class="w-full p-3 rounded border border-zinc-900 bg-gray-200" name="qty">
                        </div>
                        <div class="w-full p-5 flex gap-5 justify-between">
                            <div class="w-6/12">
                            <label class="font-bold text-lg py-3">Color<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <select class="w-full p-3 rounded border border-zinc-900 text-black bg-gray-200" name="color">
                                <option value="">Select a color</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                            </select>
                            </div>
                            <div class="w-6/12">
                                <label class="font-bold text-lg py-3">Category<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                                <select class="w-full p-3 rounded border border-zinc-900 text-black bg-gray-200" name="category">
                                    <option value="">Select a category</option>
                                    <option value="Mouse">Mouse</option>
                                    <option value="Headset">Headset</option>
                                    <option value="Keyboard">Keyboard</option>
                                    <option value="Speaker">Speaker</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Console">Console</option>
                                </select>
                            </div>
                           
                        </div>
                        <div class="flex justify-between gap-5 p-5">
                            <div class="w-full">
                                <label class="font-bold text-lg">Upload File<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                                <input type="file" class="hidden" id="file" name="file">
                                <div class="w-full h-48 rounded border border-zinc-900 flex justify-center items-center">
                                <img src="" alt="" id="img_file" class="w-full h-full" style="cursor: pointer; object-fit: cover">
                                </div>
                               
                            </div>
                            <div class="w-full">
                                <label class="font-bold text-lg">Description<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                                <textarea id="" cols="30" rows="7" class="w-full p-3 rounded border border-zinc-900 h-48 bg-gray-200" placeholder="Description..." name="des"></textarea>
                            </div>
                        </div>
                        <div class="px-5 mb-1">
                            <hr>
                        </div>
                        <div class="flex justify-start py-3 px-5">
                            <button type="submit" class="border border-0 bg-red-600 py-2.5 px-3 rounded text-white hover:bg-red-800 ease-in-out duration-500 shadow font-bold">Reset</button>
                            <button type="submit" class="border border-zinc-900 bg-inherit py-2 px-4 rounded text-black hover:bg-zinc-900 hover:text-white ease-in-out duration-500 ms-5 shadow-lg font-bold" name="add">Add Product</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<script>
    $(document).ready(function() {
        $('#img_file').on('click', () => {
            $('#file').click();
        })
        // $('#btn_file').on('click',()=>{
        //     $('#file').click();
        // })
    })
    $('#file').on('change', () => {
        let file = $('#file')[0].files;
        let form_data = new FormData();
        form_data.append("photo", file[0]);

        $.ajax({
            url: './response.php',
            method: 'POST',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,

            success: function(response) {
                $('#img_file').attr('src', response);
            }
        })
    })
</script>

<?php
    if(isset($_POST['add'])){
        if(!empty($_POST['name']) || !empty($_POST['price']) || !empty($_POST['qty']) || !empty($_POST['file']) || !empty($_POST['des'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $color = $_POST['color'];
            $category = $_POST['category'];
            $file_name = $_FILES['file']['name'];
            $file_path = $_FILES['file']['tmp_name'];
            $path = './photo/'.$file_name;
            move_uploaded_file($file_path,$path);
            $des = $_POST['des'];
            $date = date('y-m-d');

            $connect = new mysqli('localhost','root','','my--store');
            $result = $connect->query("INSERT INTO `product`(`id`, `name`, `price`, `qty`, `color`, `category`, `photo`, `description`, `date`) VALUES (null,'$name','$price','$qty','$color','$category','$path','$des','$date')");
            if($result == true){
                echo"
                    <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ADDING SUCCESSFUL!',
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
                    title: 'ADDING FAIL!',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>
            ";
        }
    }
?>

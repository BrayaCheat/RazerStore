<?php
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $connect = new mysqli('localhost','root','','my--store');
        $result = $connect->query("SELECT * FROM `product` WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $price = $row['price'];
        $qty = $row['qty'];
        $color = $row['color'];
        $category = $row['category'];
        $file = $row['photo'];
        $des = $row['description'];
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="container-fluid">
        <div class="flex bg-gray-100">
            <?php include('./sidebar.php') ?>
            <div class="w-full">
                <div class="flex w-full p-5 gap-5">    
                     
                    <div class="flex bg-white w-full justify-center items-center p-6 shadow-lg text-black">
                        <h1 class="font-bold text-xl">UPDATE THE PRODUCT</h1>
                    </div>                 
                </div>
                <div class="bottom flex justify-end p-5 gap-5">
                    <form method="post" enctype="multipart/form-data" class="w-full h-full flex flex-col bg-white text-black p-5 rounded shadow-lg">
                        <div class="w-full p-5">
                            <label class="font-bold text-lg py-3">New Product Name<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <input type="text" placeholder="Enter Product's Name" class="w-full p-3 rounded border border-zinc-900 bg-gray-200" name="new_name" value="<?php echo $name?>">
                        </div>
                        <div class="w-full p-5">
                            <label class="font-bold text-lg py-3">New Price<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <input type="text" placeholder="Enter Product's Price" class="w-full p-3 rounded border border-zinc-900 bg-gray-200" name="new_price" value="<?php echo $price?>">
                        </div>
                        <div class="w-full p-5">
                            <label class="font-bold text-lg py-3">New Quantity<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <input type="text" placeholder="Enter Product's QTY" class="w-full p-3 rounded border border-zinc-900 bg-gray-200" name="new_qty" value="<?php echo $qty?>">
                        </div>
                        <div class="w-full p-5 flex gap-5 justify-between">
                            <div class="w-6/12">
                            <label class="font-bold text-lg py-3">New Color<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                            <select class="w-full p-3 rounded border border-zinc-900 text-black bg-gray-200" name="new_color" id="color--id">
                                <?php echo"<option value=".$row['color'].">".$row['color']."</option>";?>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                            </select>
                            </div>
                            <div class="w-6/12">
                                <label class="font-bold text-lg py-3">New Category<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                                <select class="w-full p-3 rounded border border-zinc-900 text-black bg-gray-200" name="new_category" id="category--id">
                                <?php echo"<option value=".$row['category'].">".$row['category']."</option>";?>
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
                                <label class="font-bold text-lg">New Upload File<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                                <input type="file" class="hidden" id="file" name="new_file">
                                <img src="<?php echo $file?>" alt="" id="img_file" class="w-full h-48 rounded border border-zinc-900" style="cursor: pointer; object-fit: cover">
                            </div>
                            <div class="w-full">
                                <label class="font-bold text-lg">New Description<i class="fa-regular fa-circle-down ms-1 text-md"></i></label>
                                <textarea id="" cols="30" rows="7" class="w-full p-3 rounded border border-zinc-900 h-48 bg-gray-200" placeholder="Description..." name="new_des"><?php echo $des?></textarea>
                            </div>
                        </div>
                        <div class="px-5 mb-1">
                            <hr>
                        </div>
                        <div class="flex justify-start py-1 px-5">
                            <a href="./view.php" type="submit" class="border border-0 bg-red-600 py-2.5 px-4 rounded text-white hover:bg-red-800 ease-in-out duration-500 shadow font-bold">Back</a>
                            <button type="submit" class="border border-zinc-900 bg-inherit py-2.5 px-4 rounded text-black hover:bg-yellow-400 hover:text-zinc-900 ease-in-out duration-500 ms-5 shadow font-bold" name="update">Update Product</button>
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
    if(isset($_POST['update'])){
        if(!empty($_POST['new_name']) || !empty($_POST['new_price']) || !empty($_POST['new_qty']) || !empty($_POST['new_file']) || !empty($_POST['new_des'])){
            $id = $_GET['id'];
            $name = $_POST['new_name'];
            $price = $_POST['new_price'];
            $qty = $_POST['new_qty'];
            $color = $_POST['new_color'];
            $category = $_POST['new_category'];
            $file_name = $_FILES['new_file']['name'];
            $file_path = $_FILES['new_file']['tmp_name'];
            $path = './photo/'.$file_name;
            move_uploaded_file($file_path,$path);
            $des = $_POST['new_des'];
            $date = date('y-m-d');

            $connect = new mysqli('localhost','root','','my--store');
            $result = $connect->query("UPDATE `product` SET `name`='$name',`price`='$price',`qty`='$qty',`color`='$color',`photo`='$path',`description`='$des',`date`='$date',`category`='$category' WHERE id = '$id'");
            if($result == true){
                echo"
                    <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'UPDATING SUCCESSFUL!',
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
                    title: 'UPDATING FAIL!',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>
            ";
        }
    }
?>
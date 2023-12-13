<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Side</title>
</head>
<style>
    th,
    td {
        width: 200px;
    }
</style>

<body>
    <section class="container-fluid">
        <div class="flex" id="view">
            <?php include('./sidebar.php') ?>
            <div class="w-full">
                <div class="flex w-full p-5 gap-5">

                    <div class="flex bg-white text-black w-full justify-center items-center p-6 shadow-lg rounded">
                        <h1 class="font-bold text-xl">DISPLAY ALL PRODUCT</h1>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex justify-between items-center px-6">
                        <div class="flex">

                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-gray-700 hover:bg-gray-800 duration-500 focus:ring-4 shadow focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Filter <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <form action="" method="post">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                        <li class="flex items-center justify-center">
                                            <button href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-black w-full" name="sort-name">Sort By Name</button>
                                        </li>
                                        <li class="flex items-center justify-center">
                                            <button href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-black w-full" name="sort-price">Sort By Price</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>

                        </div>
                        <div class="flex gap-1">
                            <form method="post" class="w-full">
                                <input type="text" placeholder="Search By Name" name="search" class="text-black rounded px-3 py-2">
                                <button type="submit" class="bg-gray-700 text-white hover:bg-gray-800 px-3 py-2 rounded duration-500" name="btn--search" id="btn--search">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full p-5">
                    <table class="w-full text-md text-center text-black shadow-lg border border-zinc-900">
                        <thead class="text-white uppercase bg-zinc-900">
                            <tr>
                                <th scope="col" class="p-3">Name</th>
                                <th scope="col" class="p-3">Price</th>
                                <th scope="col" class="p-3">Qty</th>
                                <th scope="col" class="p-3">Color</th>
                                <th scope="col" class="p-3">Photo</th>
                                <th scope="col" class="p-3">Description</th>
                                <th scope="col" class="p-3">Category</th>
                                <th scope="col" class="p-3">Operation</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_POST['btn--search'])) {
                            if (!empty($_POST['search'])) {
                                $search = $_POST['search'];
                                $connect = new mysqli('localhost', 'root', '', 'my--store');
                                $result = $connect->query("SELECT * FROM `product` WHERE name LIKE '%$search%'");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                                                <tbody class="text-black bg-white">
                                                                    <tr class="border border-gray-700 bg-gray-200 hover:bg-gray-300 shadow-lg rounded text-black ease-in-out duration-500 font-medium">
                                                                        <td scope="col" class="p-3">' . $row['name'] . '</td>
                                                                        <td scope="col" class="p-3">' . $row['price'] . '$</td>
                                                                        <td scope="col" class="p-3">' . $row['qty'] . '</td>
                                                                        <td scope="col" class="p-3">' . $row['color'] . '</td>
                                                                        <td scope="col" class="p-3">
                                                                            <img src="' . $row['photo'] . '">
                                                                        </td>
                                                                        <td scope="col" class="p-3">' . $row['description'] . '</td>
                                                                        <td scope="col" class="p-3">' . $row['category'] . '</td>
                                                                        <td scope="col" class="p-3">
                                                                            <div class="flex gap-3">
                                                                            <a href="./update.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-yellow-400 hover:text-zinc-950 duration-500">UPDATE</a>
                                                                            <a href="./delete.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-red-600 hover:text-white  duration-500">DELETE</a>
                                                                            </div>                                  
                                                                        </td>                                      
                                                                    </tr>
                                                                </tbody>
                                                                ';
                                }
                            } else {
                                echo "
                                <script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'ADDING FAIL!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                ";
                            }
                        }

                        if (isset($_POST['sort-name'])) {
                            $connect = new mysqli('localhost', 'root', '', 'my--store');
                            $result = $connect->query("SELECT * FROM `product` ORDER BY name ASC");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                                            <tbody class="text-black bg-white">
                                                                <tr class="border border-gray-700 bg-gray-200 hover:bg-gray-300 shadow-lg rounded text-black ease-in-out duration-500 font-medium">
                                                                    <td scope="col" class="p-3">' . $row['name'] . '</td>
                                                                    <td scope="col" class="p-3">' . $row['price'] . '$</td>
                                                                    <td scope="col" class="p-3">' . $row['qty'] . '</td>
                                                                    <td scope="col" class="p-3">' . $row['color'] . '</td>
                                                                    <td scope="col" class="p-3">
                                                                        <img src="' . $row['photo'] . '">
                                                                    </td>
                                                                    <td scope="col" class="p-3">' . $row['description'] . '</td>
                                                                    <td scope="col" class="p-3">' . $row['category'] . '</td>
                                                                    <td scope="col" class="p-3">
                                                                        <div class="flex gap-3">
                                                                        <a href="./update.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-yellow-400 hover:text-zinc-950 duration-500">UPDATE</a>
                                                                        <a href="./delete.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-red-600 hover:text-white  duration-500">DELETE</a>
                                                                        </div>                                  
                                                                    </td>                                      
                                                                </tr>
                                                            </tbody>
                                                            ';
                            }
                        }

                        if (isset($_POST['sort-price'])) {
                            $connect = new mysqli('localhost', 'root', '', 'my--store');
                            $result = $connect->query("SELECT * FROM `product` ORDER BY price ASC");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                                            <tbody class="text-black bg-white">
                                                                <tr class="border border-gray-700 bg-gray-200 hover:bg-gray-300 shadow-lg rounded text-black ease-in-out duration-500 font-medium">
                                                                    <td scope="col" class="p-3">' . $row['name'] . '</td>
                                                                    <td scope="col" class="p-3">' . $row['price'] . '$</td>
                                                                    <td scope="col" class="p-3">' . $row['qty'] . '</td>
                                                                    <td scope="col" class="p-3">' . $row['color'] . '</td>
                                                                    <td scope="col" class="p-3">
                                                                        <img src="' . $row['photo'] . '">
                                                                    </td>
                                                                    <td scope="col" class="p-3">' . $row['description'] . '</td>
                                                                    <td scope="col" class="p-3">' . $row['category'] . '</td>
                                                                    <td scope="col" class="p-3">
                                                                        <div class="flex gap-3">
                                                                        <a href="./update.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-yellow-400 hover:text-zinc-950 duration-500">UPDATE</a>
                                                                        <a href="./delete.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-red-600 hover:text-white  duration-500">DELETE</a>
                                                                        </div>                                  
                                                                    </td>                                      
                                                                </tr>
                                                            </tbody>
                                                            ';
                            }
                        }

                        $connect = new mysqli('localhost', 'root', '', 'my--store');
                        $result = $connect->query("SELECT * FROM `product` WHERE 1");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <tbody class="text-black bg-white border border-gray-700">
                                    <tr class="border border-gray-700 bg-white shadow-lg rounded hover:bg-gray-300 text-black ease-in-out duration-500 font-medium">
                                        <td scope="col" class="p-3">' . $row['name'] . '</td>
                                        <td scope="col" class="p-3">' . $row['price'] . '$</td>
                                        <td scope="col" class="p-3">' . $row['qty'] . '</td>
                                        <td scope="col" class="p-3">' . $row['color'] . '</td>
                                        <td scope="col" class="p-3">
                                            <img src="' . $row['photo'] . '">
                                        </td>
                                        <td scope="col" class="p-3">' . $row['description'] . '</td>
                                        <td scope="col" class="p-3">' . $row['category'] . '</td>
                                        <td scope="col" class="p-3">
                                            <div class="flex gap-3">
                                                <a href="./update.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-yellow-400 hover:text-zinc-950 duration-500">UPDATE</a>
                                                <a href="./delete.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-red-600 hover:text-white  duration-500">DELETE</a>
                                            </div>                                  
                                        </td>                                      
                                    </tr>
                                </tbody>
                                ';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<style>
    #view {
        background: linear-gradient(to top, #dfe9f3 0%, white 100%);
    }
</style>
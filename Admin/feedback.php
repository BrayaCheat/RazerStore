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
    #feedback {
        background: linear-gradient(to top, #dfe9f3 0%, white 100%);
    }
</style>

<body>
    <section class="container-fluid">
        <div class="flex" id="feedback">
            <?php include('./sidebar.php') ?>
            <div class="w-full">
                <div class="flex w-full p-5 gap-5">

                    <div class="flex bg-white text-black w-full justify-center items-center p-6 shadow-lg rounded">
                        <h1 class="font-bold text-xl">DISPLAY ALL FEEDBACK</h1>
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
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-black">Sort By A-Z</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-black">Sort By Z-A</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="flex gap-1">
                            <form method="post" class="w-full">
                                <input type="text" placeholder="Search By Username" name="search" class="text-black rounded px-3 py-2">
                                <button type="submit" class="bg-gray-700 text-white hover:bg-gray-800 px-3 py-2 rounded duration-500" name="btn--search" id="btn--search">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full p-5">
                    <table class="w-full text-md text-center text-black shadow-lg border border-zinc-900">
                        <thead class="text-white uppercase bg-zinc-900">
                            <tr>
                                <th scope="col" class="p-3">Username</th>
                                <th scope="col" class="p-3">Email</th>
                                <th scope="col" class="p-3">Feedback</th>
                                <th scope="col" class="p-3">Operation</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_POST['btn--search'])) {
                            if (!empty($_POST['search'])) {
                                $search = $_POST['search'];
                                $connect = new mysqli('localhost', 'root', '', 'my--store');
                                $result = $connect->query("SELECT * FROM `feedback` WHERE username LIKE '%$search%'");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <tbody class="text-black bg-white border border-gray-700">
                                    <tr class="border border-zinc-900 bg-gray-200 hover:bg-gray-300 text-black font-medium ease-in-out duration-500">
                                        <td scope="col" class="p-3">' . $row['username'] . '</td>
                                        <td scope="col" class="p-3">' . $row['email'] . '</td>
                                        <td scope="col" class="p-3">' . $row['feedback'] . '</td>
                                        <td scope="col" class="p-3">
                                            <div class="flex gap-3 justify-center items-center">
                                            <a href="./delete--feedback.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-red-600 hover:text-white  duration-500">DELETE</a>
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
                        $connect = new mysqli('localhost', 'root', '', 'my--store');
                        $result = $connect->query("SELECT * FROM `feedback` WHERE 1");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <tbody class="text-black bg-white border border-gray-700">
                                    <tr class="border border-zinc-900 bg-white hover:bg-gray-300 text-black font-medium ease-in-out duration-500">
                                        <td scope="col" class="p-3">' . $row['username'] . '</td>
                                        <td scope="col" class="p-3">' . $row['email'] . '</td>
                                        <td scope="col" class="p-3">' . $row['feedback'] . '</td>
                                        <td scope="col" class="p-3">
                                            <div class="flex gap-3 justify-center items-center">
                                            <a href="./delete--feedback.php?id=' . $row['id'] . '" class="rounded border border-zinc-900 shadow-lg px-3 py-3 bg-inherit text-black hover:bg-red-600 hover:text-white  duration-500">DELETE</a>
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
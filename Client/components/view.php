<section class="p-0 m-0 flex flex-col justify-center items-center">
    <div class="container mx-auto grid md:grid-cols-2 grid-cols-1 md:py-48 py-20 md:px-0 px-12 gap-20">
        <?php
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $connect = new mysqli('localhost', 'root', '', 'my--store');
            $result = $connect->query("SELECT * FROM `product` WHERE id = $id");
            $row = mysqli_fetch_assoc($result);
            echo '
                    <div class="flex flex-wrap justify-center items-center" data-aos="fade-right" data-aos-duration="1000">
                        <img src="../Admin' . $row['photo'] . '" alt="">
                    </div>

        <div class="grid gap-10" data-aos="fade-left" data-aos-duration="1000">
            <div class="top flex flex-col gap-5">
                <div>
                    <h1 class="text-5xl font-bold text-black">' . $row['name'] . '</h1>
                    <h1 class="text-1xl text-black">@Razer Edition</h1>
                </div>
                <div class="star flex text-black text-xl">
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h1 class="text-black text-2xl font-bold">$' . $row['price'] . '</h1>
                <h1 class="text-black text-1xl">
                    ' . $row['description'] . '
                </h1>
                <br>
                <div>
                    <div class="flex items-center gap-5">
                        <h1 class="text-black font-bold text-xl">CATEGORY:</h1>
                        <span class="text-black text-xl">' . $row['category'] . '</span>
                    </div>

                    <div class="flex items-center gap-5">
                        <h1 class="text-black font-bold text-xl">TAGS:</h1>
                        <span class="text-black text-xl">Gaming Accessories</span>
                    </div>
                </div>
            </div>
            <hr class="border border-gray-700 w-full">
            <div class="grid gap-10">
                <div class="flex items-center gap-5">
                    <h1 class="text-black text-xl font-bold">Color: </h1>
                    <select class="w-60 p-3 rounded border border-zinc-900 text-black bg-white">
                        <option value=".$row["color"].">' . $row["color"] . '</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Green">Green</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue</option>
                    </select>
                </div>
                <div class="flex items-center gap-9">
                    <h1 class="text-black text-xl font-bold">QTY: </h1>
                    <input type="text" placeholder="1" class="w-60 p-3 rounded border border-black text-black bg-white">
                </div>
            </div>
            <hr class="border border-gray-700 w-full">
            <div class="flex justify-between items-center">
                <h1 class="text-black text-2xl font-bold">$' . $row['price'] . '</h1>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="inline-flex items-center rounded border border-zinc-900 hover:bg-zinc-900 hover:text-white duration-500 px-4 py-2 text-black font-bold text-2xl">BUY NOW
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                </button>
            </div>
        </div>
                    ';
            $count = $row['count'];
            $count++;
            $result = $connect->query("UPDATE `product` SET count = $count WHERE id = $id");
        }
        ?>
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-lg">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-black">
                            Pay Invoice
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="" method="post">
                            <div class="w-full flex justify-center items-center font-medium text-3xl py-4 gap-10">
                                <img src="./Assets/Payments/visa.png" alt="" class="w-12">
                                <img src="./Assets/Payments/master.png" alt="" class="w-12">
                                <img src="./Assets/Payments/paypal.png" alt="" class="w-12">
                                <img src="./Assets/Payments/western.png" alt="" class="w-12">
                            </div>
                            <div class="w-full flex flex-col py-4">
                                <label for="">Name on card</label>
                                <input type="text" class="border border-zinc-900 bg-inherit text-black px-4 py-2 font-medium rounded" require>
                            </div>
                            <div class="w-full flex flex-col py-4">
                                <label for="">Card number</label>
                                <input type="text" class="border border-zinc-900 bg-inherit text-black px-4 py-2 font-medium rounded" require>
                            </div>
                            <div class="w-full flex flex-col py-4">
                                <div class="flex w-full gap-5">
                                    <div class="flex w-full justify-start">
                                        <label for="">Expiry Date</label>
                                    </div>
                                    <div class="flex w-full justify-start">
                                        <label for="">Security Code</label>
                                    </div>
                                </div>
                                <div class="flex w-full gap-5">
                                    <div class="flex w-full justify-start">
                                        <input type="text" class="border border-zinc-900 bg-inherit text-black px-4 py-2 font-medium rounded w-full" require>
                                    </div>
                                    <div class="flex w-full justify-start">
                                        <input type="text" class="border border-zinc-900 bg-inherit text-black px-4 py-2 font-medium rounded w-full" require>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-0 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button id="buy-btn" data-modal-hide="default-modal" type="button" class="border border-zinc-900 w-full text-black rounded shadow-lg bg-inherit hover:bg-zinc-900 hover:text-white font-medium duration-500 py-4 w-full my-4">Pay $<?php echo $row['price'] ?></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
            <?php
            include('Related.php');
            ?>
        </div>

</section>
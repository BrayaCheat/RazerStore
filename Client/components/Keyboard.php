<!-- keyboard -->
<section id="keyboard" class="p-0 m-0 flex justify-center items-center py-10">
    <div class="container mx-auto">
        <div class="py-10 flex flex-col items-center gap-5">
            <div class="grid grid-cols-1 text-center md:px-0 px-4" data-aos="fade-in" data-aos-duration="1000">
                <h1 class="text-5xl text-black font-bold py-5">GAMING KEYBOARD</h1>
                <h1 class="text-lg text-black">From multi-award winning Razer™ Mechanical Switches designed specifically for gaming to a mecha-membrane hybrid, discover the gaming keyboard for you—equipped with speed, precision and your preferred typing experience.</h1>                 
            </div>
            <br>
            <div class="w-full grid md:grid-cols-3 col-1 place-items-center xl:gap-52 gap-10">
                <?php
                $connect = new mysqli('localhost', 'root', '', 'my--store');
                $result = $connect->query("SELECT * FROM `product` WHERE category = 'Keyboard'");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="max-w-sm h-full bg-white rounded-lg shadow-lg border border-white hover:border-zinc-800 hover:scale-105 duration-500 ease-in-out">
                                <a href="View--product.php?id=' . $row['id'] . '">
                                    <img class="rounded-t-lg h-86 bg-white w-full shadow" src="../Admin' . $row['photo'] . '"
                                        alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="View--product.php?id=' . $row['id'] . '">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">
                                            ' . $row['name'] . '</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-black">
                                        ' . $row['description'] . '
                                    </p>
                                        <div class="flex flex-wrap justify-between items-center">
                                            
                                        <a href="View--product.php?id=' . $row['id'] . '"
                                        class="w-full inline-flex items-center justify-center px-4 py-2 font-bold text-center text-black border border-black rounded duration-500 shadow-lg hover:bg-zinc-900 hover:text-white">
                                        ADD TO CART 
                                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                        </div>
                            </div>
                        </div>
                            ';
                }
                ?>
            </div>
        </div>
    </div>
</section>

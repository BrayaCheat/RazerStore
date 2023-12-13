<!-- Home -->
<section class="p-0 m-0 flex justify-center items-center" id="home">
    <div class="container mx-auto grid md:grid-cols-2 grid-cols-1 md:py-60 py-20 md:px-0 px-12">
        <?php
        $connect = new mysqli('localhost', 'root', '', 'my--store');
        $result = $connect->query("SELECT * FROM `product` ORDER BY count DESC LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        echo '
            <div class="left" data-aos="fade-right" data-aos-duration="2000">
            <h1 class="md:text-6xl text-4xl text-black font-bold md:text-start text-center">Best Sellers</h1>
            <div class="flex flex-col py-5 justify-center gap-5 md:text-start text-center md:px-0 px-4">
                <h1 class="md:text-4xl text-3xl text-black font-medium">' . $row['name'] . '</h1>
                <h1 class="md:text-4xl text-3xl text-black font-medium">$' . $row['price'] . '</h1>
            </div>
            <div class="flex flex-wrap md:justify-start justify-center">
                <a href="View--product.php?id=' . $row['id'] . '"class="inline-flex items-center rounded border border-black shadow-lg hover:bg-zinc-900 hover:text-white text-black text-xl hover:bg-gray-800 px-10 py-4 duration-500 font-bold mt-5">Buy now
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>     
            </div>           
        </div>
        <div class="right" data-aos="fade-left" data-aos-duration="2000">
            <div class="flex flex-col justify-center items-center">
            <img src="../Admin' . $row['photo'] . '" alt="" class="w-96 h-96 object-cover">
            </div>     
        </div>
            ';
        ?>
    </div>
</section>

<style>
    /* #home{
        background: linear-gradient(rgba(0,0,0,0),rgba(0,0,0,1)),url(../Admin/photo/Main--bg.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    } */
    #home {
        background: linear-gradient(to top, #dfe9f3 0%, white 100%);
    }
</style>
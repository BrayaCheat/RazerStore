<!-- navbar -->
<section class="w-full h-16 fixed top-0 z-50 bg-white shadow-lg">

    <nav class="container mx-auto md:px-0 px-4">
        <div class="w-full flex flex-wrap items-center justify-between py-3 md:py-4">
            <a href="App.php" class="flex items-center">
                <img src="../Admin/photo/razer--logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                <!-- <span class="self-center text-2xl font-bold whitespace-nowrap">Game Gear</span> -->
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-inherit bg-white">
                    <li>
                        <a href="App.php" class="block py-2 pl-3 pr-4 text-black hover:text-green-700 duration-500 rounded md:p-0" aria-current="page">Home</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-black hover:text-green-600 duration-500 md:p-0 md:w-auto">Products<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#mouse" class="block px-4 py-2 dark:hover:bg-gray-600 dark:hover:text-white">Mouse</a>
                                </li>
                                <li>
                                    <a href="#keyboard" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Keyboard</a>
                                </li>
                                <li>
                                    <a href="#headset" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Headset</a>
                                </li>
                                <li>
                                    <a href="#console" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Console</a>
                                </li>
                                <li>
                                    <a href="#laptop" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Laptop</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="../Admin/login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign In</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="View--contact.php" class="block py-2 pl-3 pr-4 text-black hover:text-green-600 duration-500 rounded md:p-0">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</section>
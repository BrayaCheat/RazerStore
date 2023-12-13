<!-- AOS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
        AOS.init();
</script>

<!-- FlowBite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

<!-- Style -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- AJAX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
        $(document).ready(function() {
                $('#buy-btn').on('click', () => {
                        Swal.fire({
                                title: "Purchased!",
                                text: "Thank For Buying Our Gaming Gears!",
                                icon: "success"
                        });
                })
        });
</script>

</html>
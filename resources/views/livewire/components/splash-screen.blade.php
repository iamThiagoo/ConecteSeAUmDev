<div
    x-data="splash()"
    x-init="initSplash"
>
    <div x-ref="slidecontainer" 
        class="flex flex-col justify-center items-center min-h-screen w-full bg-gradient-to-r from-[#2000ab] to-[#00b2d5]"
    >
        <div class="flex flex-col items-center" data-aos="fade-up" data-aos-offset="0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-20 h-16">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
            </svg>              
            <h2 class="text-white text-xl mt-2">
                Conecte-se com Um Dev
            </h2>
        </div>
    </div>

</div>

<script>

    function splash () {
        return {
            initSplash ()
            {

            }

            animate (element, classList, type) 
            {

            }
        }
    }

</script>
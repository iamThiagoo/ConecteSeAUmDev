<div
    x-data="splash()"
    x-init="initSplash"
>
    <div x-ref="slidecontainer" 
        class="absolute top-0 left-0 transform duration-1000 flex flex-col items-center justify-center min-h-screen w-full bg-gradient-to-r from-[#3338bb] to-[#00c7e7]"
    >
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-16 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
            </svg>
            <h2 class="mt-2 text-xl text-white">
                Conecte-se com Um Dev
            </h2>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen w-full">
        <svg x-ref="logo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-16 text-sky-600 scale-0 duration-1000">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
        </svg>
        <h2 x-ref="textLogo" class="mt-2 text-xl transform scale-0 duration-1000 bg-clip-text text-transparent bg-gradient-to-r from-[#3338bb] to-[#00c7e7]">
            Conecte-se com Um Dev
        </h2>
    </div>
</div>

<script>

    function splash () {
        return {
            initSplash ()
            {
                document.body.classList.add('overflow-hidden');

                this.animate(this.$refs.slidecontainer, ['left-full', 'skew-x-12'], 'add', 1000,
                    () => this.animate(this.$refs.slidecontainer, ['skew-x-12'], 'remove', 400,
                        () => this.animate(this.$refs.logo, ['scale-100'], 'add', 300,
                            () => this.animate(this.$refs.textLogo, ['scale-100'], 'add', 300,
                                () => setTimeout ( () => window.location.href = "/home" , 1000)
                            )
                        )
                    )
                )
            },
            animate (element, classList, type, time, callback) 
            {
                setTimeout(() => {
                    if (type === 'add') {
                        element.classList.add(...classList);
                    } else {
                        element.classList.remove(...classList);
                    }

                    if (callback) {
                        callback();
                    }
                }, time ? time : 1000);
            }
        }
    }

</script>
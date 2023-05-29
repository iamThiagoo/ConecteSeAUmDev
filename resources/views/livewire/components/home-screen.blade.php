<div>
    
    <div
        class="absolute top-0 left-0 transform duration-1000 flex flex-col items-center justify-center min-h-screen w-full bg-gradient-to-r from-[#3338bb] to-[#00c7e7]"
    >
        <div class="flex flex-col items-center justify-end flex-1 mt-24 md:w-2/3 lg:w-1/3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-16 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
            </svg>
            <h2 class="mt-2 text-xl text-white">
                Conecte-se com Um Dev
            </h2>
        </div>

        <div class="flex flex-col justify-center flex-1 px-8 md:w-2/3 lg:w-4/5 xl:w-4/5 2xl:w-5/12">
            <p class="text-xs text-center text-white lg:text-sm">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur placeat maxime rem quis accusantium eum minus.
                Dolores iure, vel molestiae, ullam, odio beatae sint rem iusto odit velit esse adipisci!
            </p>
            <div class="lg:flex lg:flex-row lg:gap-10 lg:mt-3">
                <button
                    wire:click="loginWithGoogle" 
                    class="flex items-center justify-center border-solid border-2 border-white bg-white w-full p-3.5 mt-8 lg:mt-4 lg:mb-8 text-slate-500 text-sm uppercase font-semibold rounded-full transform duration-150 active:scale-95 hover:opacity-90"
                    >
                    <img src="{{ asset('images/svg/google.svg') }}" class="absolute left-3 w-7 h-7" />
                    Entrar como Recrutador
                </button>

                <button 
                    wire:click="loginWithGithub"
                    class="flex items-center justify-center border-2 border-zinc-900 bg-zinc-900 w-full p-3.5 mt-4 mb-8 text-white text-sm uppercase font-semibold rounded-full transform duration-150 active:scale-95 hover:opacity-90"
                    >
                    <img src="{{ asset('images/svg/github.svg') }}" class="absolute left-3 w-7 h-7" />
                    Entrar como Dev
                </button>

            </div>
        </div>
    </div>
</div>

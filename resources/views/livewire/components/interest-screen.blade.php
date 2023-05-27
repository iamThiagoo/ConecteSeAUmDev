<form>

    <div class="container mx-auto mt-5">
        <div class="mx-auto">
            <div class="flex justify-end">
                <button role="button" aria-label="cancel form" class="focus:outline-none transition duration-150 ease-in-out hover:bg-gray-300 rounded text-indigo-600 px-3 py-2 text-base mr-2 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">Pular</button>
            </div>
            <div class="w-full mx-auto xl:mx-0">
                <div class="rounded flex items-center justify-center">
                    <div class="rounded-full h-24 w-24 bg-cover bg-center bg-no-repeat shadow flex items-center justify-center">
                        <img src="{{ $user['profile']['avatar'] }}" alt="Minha foto de perfil" class="z-0 h-full w-full object-cover rounded-full shadow top-0 left-0 bottom-0 right-0" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto bg-white mt-4 rounded px-4">
        <div class="text-center">
            <h2 class="font-bold">Olá {{  $user['name'] }}, </h2>
            <p>Complete seus interesses!</p>
        </div>
        <div class="mx-auto pt-4">
            <div class="container mx-auto">
                <form class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0">
                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">

                        @foreach ($categories as $category)
                            <label for="" class="pb-2 text-base font-semibold text-gray-800 ml-1">{{ $category['name'] }}</label>
                            <select class="w-full p-2.5 text-gray-500 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-sky-600">
                                <option>Selecione</option>
                                
                                @foreach($category['skills'] as $skill)
                                    <option value="{{ $skill['id'] }}">{{ $skill }}</option>
                                @endforeach

                            </select>
                        @endforeach

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mx-auto w-11/12">
        <div class="w-full py-4 sm:px-0 bg-white flex">
            <button role="submit" aria-label="Salvar" class="w-full font-medium focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 focus:outline-none transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-3 text-base">Salvar interesses</button>
        </div>
    </div>
</form>

@section('script')
    <script>
        

    </script>
@endsection

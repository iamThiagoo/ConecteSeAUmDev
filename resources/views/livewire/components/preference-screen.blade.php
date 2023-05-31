<div class="min-h-screen lg:min-h-full">
    <div class="pt-4 lg:mt-8">
        <div class="flex flex-col items-center justify-center mx-auto mt-2 lg:w-5/12 2xl:w-3/12">
            <div class="flex justify-end w-full">
                <button
                    wire:click="skipScreen"
                    role="button" 
                    aria-label="cancel form" 
                    class="px-3 py-2 mr-2 text-base text-blue-600 transition duration-150 ease-in-out rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 lg:px-0"
                >
                    Pular
                </button>
            </div>
            <div class="w-full mx-auto">
                <div class="flex items-center justify-center rounded">
                    <div class="flex items-center justify-center w-28 h-28 bg-center bg-no-repeat bg-cover rounded-full shadow">
                        <img src="{{ $user['profile']['avatar'] }}" alt="Minha foto de perfil" class="top-0 bottom-0 left-0 right-0 z-0 object-cover w-full h-full rounded-full shadow" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4 mx-auto mt-2 rounded sm:w-8/12 lg:w-5/12 2xl:w-3/12">
        <div class="text-center">
            <h2 class="font-bold">Continuando... </h2>
            <p>Complete suas preferências!</p>
        </div>
        <div class="pt-2 mx-auto">
            <div class="container mx-auto">
                <form x-data="form" class="w-11/12 mx-auto mt-4 mb-4 sm:w-full sm:mx-0 xl:w-full xl:mx-0">
                    <div class="flex flex-col mb-3 lg:w-full">
    
                        @foreach ($categories as $category)
                            <label for="cat-{{$category['id']}}" class="pb-2 ml-1 text-sm font-semibold text-gray-800">{{ $category['name'] }}</label>
                            <select
                                :disabled="{{ $category['skills'] ? 'false' : 'true' }}"
                                x-on:change="changeSkill('{{ $category['name'] }}', $event)" 
                                id="cat-{{$category['id']}}" 
                                class="w-full p-2.5 text-sm text-gray-500 mb-5 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-sky-600"
                            >
                                <option>Selecione</option>
                                
                                @foreach($category['skills'] as $skill)
                                    <option value="{{ $skill['id'] }}">{{ $skill['name'] }}</option>
                                @endforeach
    
                            </select>
        
                            <template x-for="(skill, index) in payload['{{ $category['name'] }}']">
                                <div class="relative flex gap-3 mb-4 -mt-1 bg-white border rounded-md border-slate-400 lg:py-3">
                                    <div class="flex flex-col justify-center py-3 pl-3">
                                        <p class="text-sm font-semibold text-gray-600">Qual o seu nível de conhecimento em <strong x-text="skill.name"><</strong>?</p>
                                        <div class="flex flex-row items-start gap-1 mt-2 mb-1 sm:flex-row sm:items-center">
        
                                            <template x-for="i in 5">
                                                <button type="button" x-on:click="skill.level = i" class="duration-150 transform active:scale-95">
                                                    <svg :class="skill.level < i ? 'text-gray-400' : 'text-orange-400'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </template>
    
                                        </div>
                                    </div>
                                    <div 
                                        x-on:click="removeSkill('{{ $category['name'] }}', index)"
                                        class="inset-0 w-5 m-auto mt-3 mr-3 text-black cursor-pointer lg:mt-0"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-600 6 trw-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                      
                                    </div>
                                </div>
                            </template>
                        @endforeach
    
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container w-11/12 px-4 mx-auto sm:w-8/12 lg:w-5/12 2xl:w-3/12">
        <div class="flex w-full sm:px-0">
            <button 
                wire:click="save"
                role="submit" 
                aria-label="Salvar" 
                class="relative flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white duration-150 ease-in-out transform bg-blue-600 border-0 rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none active:scale-95 hover:bg-blue-500"
            >
                Salvar preferências
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute w-5 h-5 right-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>              
            </button>
        </div>
    </div>
</div>

@section('script')
    <script>
        function form ()
        {
            return {
                categories: @entangle('categories'),
                payload: @entangle('payload'),
                changeSkill (selectedCategory, event)
                {
                    const category = this.categories.find((item) => item.name === selectedCategory)
                    const skill = category.skills.find(item => item.id === parseInt(event.target.value))

                    if(!this.payload) {
                        this.payload = {};
                    }

                    if (skill) {
                        if(this.payload.hasOwnProperty(selectedCategory)) {
                            this.payload[selectedCategory].push({
                                ...skill,
                                level: 0
                            })
                        } else {
                            this.payload[selectedCategory] = [{
                                ...skill,
                                level: 0
                            }]
                        }

                        const newSkills = category.skills.filter((item) => item.id !== skill.id)

                        this.categories = this.categories.map((item) => {
                            if (item.name === selectedCategory) {
                                item.skills = newSkills
                            }
                            
                            return item;
                        })

                        setTimeout(() => {
                            event.target.value = "Selecione";
                        }, 200);
                    }
                },
                removeSkill (payloadCategory, position)
                {
                    const skill = this.payload[payloadCategory].splice(position, 1);

                    this.categories = this.categories.map((item) => {    
                        if(item.name === payloadCategory) {
                            item.skills.push(skill[0]);
                        }

                        return item;
                    });
                }
            }
        }
    </script>
@endsection

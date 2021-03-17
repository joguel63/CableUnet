<x-app-layout>
    <div class="container bg-gray-200">
    
        <x-cartel color="indigo">
            <x-slot name="imagen">
                https://cdn.pixabay.com/photo/2017/06/20/22/14/men-2425121_960_720.jpg
            </x-slot>
            ¡Comunicate con el mundo de la manera mas comoda!
        </x-cartel>
        
        <h1 class="py-2 text-2xl text-center text-gray-600 font-bold border-b-2 border-gray-600 mb-6">Conoce los Planes de {{$servicio->nombre}} que tenemos para ti</h1>
           <div class="grid grid-cols-1 md:grid-cols-3 pt-4">
                @foreach ($servicio->plans as $plan)
                    
                    <x-card-plan icon="{{$servicio->nombre}}" plan="{{$plan->id}}">
                        <x-slot name="titulo">
                            {{$plan->nombre}}
                        </x-slot>
                        
                        ¡Disfuta de nuestro increible plan de {{$plan->nombre}} con solo presionar aqui!
                    </x-card-plan>
                   
                @endforeach
            </div>
       </div>
    
</x-app-layout>
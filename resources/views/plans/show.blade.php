<x-app-layout>

   
        <div class="container bg-gray-200">
            
            <x-cartel color="indigo">
                <x-slot name="imagen">
                    https://cdn.pixabay.com/photo/2017/06/20/22/14/men-2425121_960_720.jpg
                </x-slot>
                ¡Comunicate con el mundo de la manera mas comoda!
            </x-cartel>
            @if ($plan->servicio->nombre == "Television")
           
            <h1 class="py-2 text-2xl text-center text-gray-600 font-bold border-b-2 border-gray-600 mb-6">El plan {{$plan->nombre}} dispone de {{sizeof($plan->channels)}} grandiosos canales para tu entretenimiento</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 pt-4">
                @foreach ($plan->channels as $channel)
                    <div class="w-40 h-40 mb-10 md:w-40 md:h-40 shadow-lg bg-gray-300 rounded-md mr-auto ml-auto p-2 transition duration-500 hover:bg-yellow-400" >
                            <h1 class="pt-2 text-lg text-center text-gray-800 font-bold">{{$channel->nombre}}</h1> 
                            <div class="mr-auto ml-auto  w-max my-5 md:my-10">
                                <i class="fas fa-tv fa-3x"></i>
                            </div>
                    </div>
                @endforeach
            </div>
            @endif
            <h1 class="py-2 text-2xl text-center text-gray-600 font-bold border-b-2 border-gray-600 mb-6">Conoce los Paquetes de {{$plan->nombre}} que tenemos para ti</h1>
           <div class="grid grid-cols-1 md:grid-cols-3 pt-4">
                @foreach ($plan->paquetes as $paquete)
                    <x-card-paquete icon="{{$plan->servicio->nombre}}" paquete="{{$paquete->id}}">
                        <x-slot name="titulo">
                            {{$paquete->nombre}}
                        </x-slot>
                        
                        ¡Disfuta de nuestro increible paquete  {{$paquete->nombre}} por tan solo {{$paquete->costo}}$!
                    </x-card-paquete>
                   
                @endforeach
            </div>
       </div>
   
        
    
</x-app-layout>
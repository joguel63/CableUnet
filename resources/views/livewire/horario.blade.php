<div class="container pb-14">
    <x-cartel color="green">
        <x-slot name="imagen">
            https://cdn.pixabay.com/photo/2015/09/09/18/11/remote-control-932273_960_720.jpg
        </x-slot>
        ¡Informacion de todos tus programas con tan solo uin click!
    </x-cartel>
     <div class="rounded-lg mx-auto bg-gray-300 w-96 my-10 px-4 py-6 shadow-md ">
        <h1 class=" pt-2 text-2xl text-center text-gray-800 font-bold">Buscador de Horarios </h1> 

            <div class="grid grid-cols-2 mt-20">
                <select class="mx-auto rounded-md bg-gray-200" name="" id="" wire:model="date_search">
                    <option value="seleccionar" selected>Seleccionar</option>
                    @foreach ($fechas as $fecha)
                        <option value="{{$fecha}}">{{$fecha}}</option>
                    @endforeach
                </select>
                <select class="mx-auto rounded-md bg-gray-200" name="" id="" wire:model="channel_search">
                    <option value="todos" selected>Todos</option>
                    @foreach ($channels as $channel)
                        <option value="{{$channel->nombre}}">{{$channel->nombre}}</option>
                    @endforeach
                </select>
            </div>
        
        <button class="mx-32 mt-20 bg-gray-800 text-gray-100 rounded-sm px-4 py-2 transition duration-500 hover:bg-indigo-700 mb-10" wire:click="show_table()">Buscar</button>
     </div>
    
    @if ($show==true)
    
    <h1 class="py-2 text-2xl text-center text-gray-600 font-bold border-b-2 border-gray-600 mb-6">Encuentra tu programa favorito</h1> 

        <div class="overflow-auto mx-3  mb-10">
            <table class="table-fixed bg-white text-left rounded-lg shadow overflow-hidden">
                <thead class="bg-gray-800 border-b text-xs font-medium text-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-r border-gray-600">Canal</th>
                        <th class="px-6 py-3">12 AM</th>
                        <th class="px-6 py-3">01 AM</th>
                        <th class="px-6 py-3">02 AM</th>
                        <th class="px-6 py-3">03 AM</th>
                        <th class="px-6 py-3">04 AM</th>
                        <th class="px-6 py-3">05 AM</th>
                        <th class="px-6 py-3">06 AM</th>
                        <th class="px-6 py-3">07 AM</th>
                        <th class="px-6 py-3">08 AM</th>
                        <th class="px-6 py-3">09 AM</th>
                        <th class="px-6 py-3">10 AM</th>
                        <th class="px-6 py-3">11 AM</th>
                        <th class="px-6 py-3">12 PM</th>
                        <th class="px-6 py-3">01 PM</th>
                        <th class="px-6 py-3">02 PM</th>
                        <th class="px-6 py-3">03 PM</th>
                        <th class="px-6 py-3">04 PM</th>
                        <th class="px-6 py-3">05 PM</th>
                        <th class="px-6 py-3">06 PM</th>
                        <th class="px-6 py-3">07 PM</th>
                        <th class="px-6 py-3">08 PM</th>
                        <th class="px-6 py-3">09 PM</th>
                        <th class="px-6 py-3">10 PM</th>
                        <th class="px-6 py-3">11 PM</th>
                        
                    </tr>
                </thead>

                <tbody class="divide-y-2 ">
                    @if ($channel_search=='todos')
                        @foreach ($channels as $channel)
                            <tr class="divide-x-2 text-sm text-gray-800" >
                                <td class="bg-gray-800 text-gray-100 px-6">{{$channel->nombre}}</td>
                    
                                @for ($i = 0; $i < 24; $i++)
                                @if ($i<10)
                                    
                                    @if ($channel->horarios->where('fecha',$date_search." 0".$i.":00:00")!="[]")
                                            <td class="transition duration-300 hover:bg-indigo-500">{{$channel->horarios->where('fecha',$date_search." 0".$i.":00:00")->first()->programa->nombre}}</td>
                                    @else
                                        <td class="transition duration-300 hover:bg-indigo-500">No hay show</td>
                                    @endif
                                @else
                                    @if ($channel->horarios->where('fecha',$date_search." ".$i.":00:00")!="[]")
                                            <td class="transition duration-300 hover:bg-indigo-500">{{$channel->horarios->where('fecha',$date_search." ".$i.":00:00")->first()->programa->nombre}}</td>
                                    @else
                                            <td class="transition duration-300 hover:bg-indigo-500">No hay show</td>
                                    @endif
                                @endif
                                @endfor
                            
                            </tr>
                        
                         @endforeach 
                    @else
                        @foreach ($channels->where('nombre',$channel_search) as $channel)
                            <tr class="divide-x-2 text-sm text-gray-800" >
                                <td class="bg-gray-800 text-gray-100 px-6">{{$channel->nombre}}</td>
                    
                                @for ($i = 0; $i < 24; $i++)
                                @if ($i<10)
                                    
                                    @if ($channel->horarios->where('fecha',$date_search." 0".$i.":00:00")!="[]")
                                            <td class="transition duration-300 hover:bg-indigo-500">{{$channel->horarios->where('fecha',$date_search." 0".$i.":00:00")->first()->programa->nombre}}</td>
                                    @else
                                        <td class="transition duration-300 hover:bg-indigo-500">No hay show</td>
                                    @endif
                                @else
                                    @if ($channel->horarios->where('fecha',$date_search." ".$i.":00:00")!="[]")
                                            <td class="transition duration-300 hover:bg-indigo-500">{{$channel->horarios->where('fecha',$date_search." ".$i.":00:00")->first()->programa->nombre}}</td>
                                    @else
                                            <td class="transition duration-300 hover:bg-indigo-500">No hay show</td>
                                    @endif
                                @endif
                                @endfor
                            
                            </tr>
                    
                        @endforeach 
                    @endif
                    
                </tbody>
            </table>
        </div>
    @endif
</div>

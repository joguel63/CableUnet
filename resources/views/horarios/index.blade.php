<x-app-layout>

    {{-- <h1>{{$channels}}</h1>

    <select name="" id="">
        <option value="">Seleccionar</option>
        @foreach ($fechas as $fecha)
            <option value="{{$fecha}}">{{$fecha}}</option>
        @endforeach
    </select> --}}

    <livewire:horario :fechas="$fechas" :channels="$channels" :horarios="$horarios"/>
    
</x-app-layout>
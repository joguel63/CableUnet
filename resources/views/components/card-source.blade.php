
<div class="max-w-md h-56 mb-10 md:w-64 md:h-80 shadow-lg bg-gray-300 rounded-md mr-auto ml-auto p-2 transition duration-500 hover:bg-{{$color}}-400" >
    @auth
    <a href="{{$ruta}}">
        <h1 class="pt-2 text-2xl text-center text-gray-800 font-bold">{{$titulo}}</h1> 
        <div class="mr-auto ml-auto  w-max my-5 md:my-10">
            <i class="fas fa-store"></i>
        </div>
        <p class="text-gray-900 text-center ">{{$slot}}</p>
      
    </a>  

    
        
    @else
    <a href="{{ {{ route('login') }} }}">
        <h1 class="pt-2 text-2xl text-center text-gray-800 font-bold">{{$titulo}}</h1> 
        <div class="mr-auto ml-auto  w-max my-5 md:my-10">
        <i class="{{$icono}}"></i>
        </div>
        <p class="text-gray-900 text-center ">{{$slot}}</p>
      
    </a>
    
    @endauth
    
    
 </div>
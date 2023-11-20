@if(session()->has('message'))
    <div 
        x-data="{show:true}" x-init="setTimeout(()=>show = false, 2000)" x-show="show"
        class="fixed top-0 left-1/3 transform -translate-x-1/3 bg-laravel text-white px-20 py-1">
       <p>
        {{session('message')}}
        </p> 
    </div>

@endif
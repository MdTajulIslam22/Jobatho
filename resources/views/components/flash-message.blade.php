@if(session()->has('message'))
    <div
        x-data="{show:true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show"
        class="fixed top-3 left-1/3 transform -translate-x-1/3 bg-gradient-to-r from-green-300 to-green-500 text-white px-10 py-1 rounded-md texture-bg">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif

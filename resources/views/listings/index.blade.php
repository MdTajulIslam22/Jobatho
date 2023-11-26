<x-layout>

@include('partials/_loggedHero')
@include("partials/_search")
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">



@if(count($listings) == 0)
<p>No listings found</p>
@endif
@foreach($listings as $post)

<x-listings-card :post="$post" />

@endforeach
</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>

{{-- @include('partials/_banner') --}}

{{-- footer component --}}
<x-footer/>

</x-layout>

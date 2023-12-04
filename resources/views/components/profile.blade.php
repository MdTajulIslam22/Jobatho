<?php
    $user_id = auth()->user()->id;
    $profile = DB::table('jobatho_profile')->where('jobatho_user_id', $user_id)->first();
        // dd($profile);
?>
<div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
            <div class="col-span-4 sm:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <img src="{{$profile->image != null ? $profile->image : asset('images/def-profile.jpg')}}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                        </img>
                        <h1 class="text-xl font-bold uppercase">{{auth()->user()->name}}</h1>
                        <p class="text-gray-600">{{auth()->user()->email}}</p>
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a href="#" class="bg-green-300 hover:bg-green-500 text-white py-2 px-4 rounded">Contact: {{$profile->primary_contact != null? $profile->primary_contact:'N/A'}}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-4 sm:col-span-9">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Profile Perfection Bar</h2>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mb-4">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="{{$profile->percentage != null ? 'width:'. $profile->percentage.'%' : 'width: 1%'}}"></div>
                    </div>
                    <hr class="my-6 border-t border-gray-500">
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">Profession: </p>
                        <p class="text-base ">{{$profile->profession != null? $profile->profession:'N/A'}}</p>
                    </div>
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">NID: </p>
                        <p class="text-base ">{{$profile->nid != null? $profile->nid:'N/A'}}</p>
                    </div>
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">Current Address: </p>
                        <p class="text-base ">{{$profile->current_address != null? $profile->current_address:'N/A'}}</p>
                    </div>
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">Permanent Address: </p>
                        <p class="text-base ">{{$profile->permanent_address != null? $profile->permanent_address:'N/A'}}</p>
                    </div>
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">Primary Contact: </p>
                        <p class="text-base ">{{$profile->primary_contact != null? $profile->primary_contact:'N/A'}}</p>
                    </div>
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">Secendary Contant: </p>
                        <p class="text-base ">{{$profile->secendary_contact != null? $profile->secendary_contact:'N/A'}}</p>
                    </div>
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">Describtion: </p>
                        <p class="text-base ">{{$profile->about != null? $profile->about:'N/A'}}</p>
                    </div>
                    <div class="mb-4 ">
                        <p class=" float-left text-base font-bold mx-10">Refference: </p>
                        <p class="text-base ">{{$profile->ref != null? $profile->ref:'N/A'}}</p>
                    </div>

                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                        <a href="/profile/edit/{{$profile->jobatho_user_id}}" class="bg-green-500 text-white text-xl py-2 px-4 rounded">Edit Profile</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

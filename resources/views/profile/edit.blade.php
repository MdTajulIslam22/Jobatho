
<x-layout>
    <div class="mx-4">
        <x-card
            class="p-10 max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Profile
                </h2>
            </header>

            <form method="POST" action="/profile/update/{{$profile->id != null ?$profile->id:''}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="profession"
                        class="inline-block text-lg mb-2"
                        >Profession</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="profession"
                        placeholder="Example: Farmer, Lebor, etc" value="{{$profile->profession != null ?$profile->profession:''}}"
                    />
                    @error('profession')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="nid" class="inline-block text-lg mb-2"
                        >NID number</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="nid"
                        placeholder="Example: (124******452)" value="{{$profile->nid != null ?$profile->nid:''}}"
                    />
                    @error('nid')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="about"
                        class="inline-block text-lg mb-2"
                    >
                        About
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="about"
                        rows="10"
                        placeholder="Who you are? what is your experiance and others"
                        >{{$profile->about != null ?$profile->about:''}}</textarea>
                    @error('about')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                {{-- profile picture section  --}}
                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2">
                        Profile Picture
                    </label>
                    <img
                            class="w-20 mr-6 mb-6"
                            src="{{$profile->image != null ? asset($profile->image) : asset('images/def-profile.jpg')}}"
                            alt=""
                        />
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="image"
                    />
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="current_address"
                        class="inline-block text-lg mb-2"
                        >Current Address</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="current_address"
                        placeholder="Example: dhaka, khulna, chittagong" value="{{$profile->current_address != null ?$profile->current_address:''}}"
                    />
                    @error('current_address')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="permanent_address" class="inline-block text-lg mb-2"
                        >Permanent Address</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="permanent_address"
                        placeholder="Example: dhaka, khulna, chittagong" value="{{$profile->permanent_address != null ?$profile->permanent_address:''}}"
                    />
                    @error('permanent_address')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="primary_contact"
                        class="inline-block text-lg mb-2"
                    >
                        Primary Contact
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="primary_contact"
                        placeholder="example:01*********" value="{{$profile->primary_contact != null ?$profile->primary_contact:''}}"
                    />
                    @error('primary_contact')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="secendary_contact"
                        class="inline-block text-lg mb-2"
                    >
                        Secondary Contact
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="secendary_contact"
                        placeholder="example:01*********" value="{{$profile->secendary_contact != null ?$profile->secendary_contact:''}}"
                    />
                    @error('secendary_contact')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="ref" class="inline-block text-lg mb-2">
                        Refference
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="ref"
                        placeholder="who know you well"
                        value="{{$profile->ref != null ?$profile->ref:''}}"
                    />
                    @error('ref')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-green-300 text-white rounded py-2 px-4 hover:bg-green-500"
                    >
                        Update Gig
                    </button>

                    <a href="/profiles" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>
    </div>
    </x-layout>

<x-layout>
    <div class="container mx-auto flex justify-center items-center h-screen">
        <x-card class="p-10 max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account to post gigs</p>
            </header>

            <form method="POST" action="/user">
                @csrf
                <!-- Existing form fields... -->

                <!-- Hidden input for selected option -->
                <input type="hidden" id="selectedOption" name="selected_option">

                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name" value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Other form fields... -->

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Sign Up
                    </button>
                </div>
            </form>

            <!-- Option Images Section -->
            <div class="flex justify-center mt-8">
                <div class="option-image" data-option="khala">
                    <img src="{{asset('images/charecter_icon/khala.png')}}" alt="Khala" class="rounded-md cursor-pointer">
                </div>
                <div class="option-image" data-option="mama">
                    <img src="{{asset('images/charecter_icon/mama.png')}}" alt="Mama" class="rounded-md cursor-pointer">
                </div>
                <div class="option-image" data-option="bariwala">
                    <img src="{{asset('images/charecter_icon/bariwala.png')}}" alt="Bariwala" class="rounded-md cursor-pointer">
                </div>
            </div>

            <!-- Form Modal Trigger Button -->
            <button id="showFormBtn">
                Show Form
            </button>

            <!-- Form Modal -->
            <div id="formModal" class="fixed inset-0 bg-black opacity-0 pointer-events-none transition-opacity duration-300">
                <div class="fixed inset-0 flex items-center justify-center">
                    <!-- Your Registration Form -->
                    <x-card class="p-10 max-w-lg mx-auto mt-24">
                        <!-- Your existing form content -->
                    </x-card>
                </div>
            </div>
        </x-card>
    </div>

    <!-- jQuery script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Handle option selection
            $('.option-image').on('click', function() {
                var selectedOption = $(this).data('option');
                $('#selectedOption').val(selectedOption);
            });

            // Show form modal on button click
            $('#showFormBtn').on('click', function() {
                var selectedOption = $('#selectedOption').val();
                if (selectedOption) {
                    $('#formModal').toggleClass('opacity-0 pointer-events-none');
                } else {
                    alert('Please select an option.');
                }
            });

            // Close form modal on overlay click
            $('#formModal').on('click', function(e) {
                if ($(e.target).hasClass('fixed')) {
                    $('#formModal').toggleClass('opacity-0 pointer-events-none');
                }
            });
        });
    </script>
</x-layout>

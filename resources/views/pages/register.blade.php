<form class="w-full max-w-md mx-auto" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- General error message -->
    @if (session('error'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('error') }}
        </div>
    @endif
    <div class="relative flex items-center">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </span>

        <input type="text" name="fullname"
            class="block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
            placeholder="Fullname">
    </div>
    @error('fullname')
        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
    <div class="relative flex items-center mt-6">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </span>

        <input type="text" name="username"
            class="block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
            placeholder="Username">
    </div>
    @error('username')
        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
    <div class="relative flex items-center mt-6">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </span>

        <input type="email" name="email"
            class="block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
            placeholder="Email address">
    </div>
    @error('email')
        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
    <div class="relative flex items-center mt-4">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </span>

        <input type="password" name="password"
            class="block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
            placeholder="Password">
    </div>
    @error('password')
        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
    <label for="dropzone-file"
        class="flex items-center px-3 py-3 mx-auto mt-6 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300 dark:text-gray-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
        </svg>

        <h2 class="mx-3 text-gray-400">Profile Photo</h2>

        <input id="dropzone-file" name="profileImage" type="file" class="hidden" />
    </label>
    @error('profileImage')
        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
    <div class="mt-6">
        <button name="register" type="submit"
            class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
            Sign Up
        </button>
    </div>
</form>


<script>
    $(document).ready(function() {
        $("form").validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 2
                },
                username: {
                    required: true,
                    minlength: 2,
                    uniqueUsername: true
                },
                email: {
                    required: true,
                    email: true,
                    uniqueEmail: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                profileImage: {
                    required: true,
                    extension: "jpg|jpeg|png|gif"
                }
            },
            messages: {
                fullname: {
                    required: "Please enter your fullname",
                    minlength: "Your fullname must be at least 2 characters long"
                },
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must be at least 2 characters long"
                },
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                profileImage: {
                    required: "Please upload a profile image",
                    extension: "Allowed file extensions: jpg, jpeg, png, gif"
                }
            },
            errorPlacement: function(error, element) {
                error.addClass("text-sm text-red-600 mt-1");
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("border-red-600");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("border-red-600");
            }
        });
    });
</script>

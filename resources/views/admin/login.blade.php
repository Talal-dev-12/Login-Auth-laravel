<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Login to your account</h2>
        <form method="POST" action="{{ route('check') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 text-gray-600">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                    class=" w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-gray-600">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('email')
                    <div class="flex justify-between items-center">
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        <a href="{{route('forgot.password')}}">
                            <span class="text-blue-500 text-sm hover:underline">Forgot password?</span>
                        </a>
                    </div>
                @enderror
            </div>
            @if(session('success'))
                <div class="mb-4">
                    <div class="bg-green-100 text-green-800 p-2 rounded-md">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <button type="submit"
                class="w-full bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-800 transition">Login</button>
        </form>
        <p class="text-center text-sm text-gray-600 mt-4">
            Don't have an account?
            <a href="/register" class="text-blue-600 hover:underline">Register here</a>
        </p>
    </div>
</body>

</html>
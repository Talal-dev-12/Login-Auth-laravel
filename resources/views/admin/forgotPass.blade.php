<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Change your Password</h2>

        <!-- resources/views/auth/forgot-password.blade.php -->
        <form action="{{route('OtpSend')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 text-gray-600">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit"
                class="w-full bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-800 transition">Send
                Otp</button>
        </form>
    </div>
</body>

</html>
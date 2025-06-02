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
        <form method="POST" action="#">
            @csrf
            <!-- resources/views/auth/forgot-password.blade.php -->
            <form action="{{ route('forgot.password') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Send OTP</button>
            </form>
    </div>
</body>

</html>
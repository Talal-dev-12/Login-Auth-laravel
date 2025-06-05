<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">Change Password</h2>

        <form method="POST" action="{{ route('resetPassword') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-1 text-gray-600">Email Address</label>
                <p class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <?=$email?>
                </p>
                <input type="hidden" name="email" id="" value="<?=$email?>">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1 text-gray-600">New Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block mb-1 text-gray-600">Confirm New
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit"
                class="w-full bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-800 transition">Update
                password</button>
        </form>
    </div>

</body>

</html>
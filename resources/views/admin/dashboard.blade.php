<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold">Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="hover:underline">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto mt-10">
        <div class="bg-white shadow p-6 rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">Welcome, {{ Auth::user()->name ?? 'User' }}!</h2>
            <p>This is your dashboard where you can manage your application.</p>
        </div>
    </div>
</body>

</html>
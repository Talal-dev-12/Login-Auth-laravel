@if (!session('email'))
    <script>window.location.href = "{{ url('/login') }}";</script>
    @php exit; @endphp
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">OTP Verification</h2>
        <p class="text-center text-sm text-gray-600 mb-6">
            An OTP has been sent to <span class="font-medium text-blue-600">{{ session('email') }}</span>. Please enter
            it below to verify your account.
        </p>

        @if (session('otp'))
            <div class="mb-4 text-red-600 text-center text-sm">
                {{ session('otp') }}
            </div>
        @endif

        <form action="{{ route('CheckOtp') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" name="otp" placeholder="Enter OTP"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <button
                    class="w-full bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-800 transition duration-200"
                    type="submit">Verify OTP</button>
            </div>
        </form>
    </div>
</body>

</html>
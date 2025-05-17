<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-blue-50 flex items-center justify-center h-screen">
<div class="items-center">
    <div class="text-center mb-6">
        <h1 class="text-2xl text-blue-800">Faça seu Login</h1>
    </div>

    <div class="aspect-square bg-blue-600 text-white p-8 rounded-lg shadow-lg w-96 max-w-md text-center ">
        <a href="{{ route('google.redirect') }}" class="block bg-blue-800 hover:bg-blue-700 text-white py-2 px-4 rounded mb-4 flex items-center justify-center">
            <i class="fab fa-google mr-2"></i> Google
        </a>

        <div class="text-center mb-4">Ou</div>

        <form action="{{ route('authenticate') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block mb-1 text-white">Email</label>
                <input type="text" id="email" name="email" required class="w-full px-3 py-2 rounded border border-gray-300 text-black">
            </div>

            <div>
                <label for="password" class="block mb-1 text-white">Senha</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 rounded border border-gray-300 text-black">
            </div>

            <button type="submit" class="w-full bg-blue-800 hover:bg-blue-700 text-white py-2 px-4 rounded">LOGIN</button>
        </form>
    </div>
    </div>
</body>
</html>

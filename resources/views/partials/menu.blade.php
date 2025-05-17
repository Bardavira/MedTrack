<div class="fixed top-0 left-0 right-0 z-50">

    <div class="bg-blue-500 flex justify-between items-center px-4 py-2">
        
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto">
        </div>
        
        <div class="flex items-center gap-4">
            @auth
                <a href="{{ url('/logout') }}" class="inline-block px-5 py-1.5 bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg border-[#19140035] hover:border-[#1915014a] border text-white rounded-sm text-sm">
                    Logout
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg border-[#19140035] hover:border-[#1915014a] border text-white rounded-sm text-sm">  
                    Log in
                </a>
            @endauth
        </div>
    </div>

    <nav class="h-16 flex bg-blue-500 dark:bg-blue-700">
        <a href="{{ route('users.index') }}" 
           class="flex-1 flex items-center justify-center text-white text-sm hover:bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg">
            Usuários
        </a>
        <a href="{{ route('medical_records.index') }}" 
           class="flex-1 flex items-center justify-center text-white text-sm hover:bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg">
            Prontuários
        </a>
        <a href="{{ route('units.index') }}" 
           class="flex-1 flex items-center justify-center text-white text-sm hover:bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg">
            Salas
        </a>
    </nav>
</div>

<div class="pt-40"></div>

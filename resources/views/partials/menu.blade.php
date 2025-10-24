<div class="fixed top-0 left-0 right-0 z-50">
    <!-- Top bar -->
    <div class="bg-blue-500 flex justify-between items-center px-4 py-2">
        
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto">
        </div>
        
        <!-- Settings + Auth buttons -->
        <div class="flex items-center gap-4">

            <!-- Settings menu inside top bar -->
<div class="flex items-center gap-4">

    <!-- Dark Mode slider -->
    <label class="inline-flex relative items-center cursor-pointer">
        <input type="checkbox" id="darkModeToggle" class="sr-only peer">
        <div class="w-12 h-6 bg-gray-300 rounded-full peer dark:bg-gray-600 peer-checked:bg-blue-600 transition-colors duration-300"></div>
        <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transform transition-transform duration-300 peer-checked:translate-x-6"></div>
        <span class="ml-2 text-white text-sm">🌙</span>
    </label>

    <!-- Text Size Selector -->
    <select id="textSizeSelect" class="text-sm rounded px-1 py-0.5 text-black dark:text-black">
        <option value="sm">A-</option>
        <option value="base">A</option>
        <option value="lg">A+</option>
        <option value="xl">A++</option>
    </select>

</div>


            <!-- Auth buttons -->
            @auth
                <a href="{{ url('/logout') }}" 
                   class="inline-block px-5 py-1.5 bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg border text-white rounded-sm text-sm">
                    Logout
                </a>
            @else
            
                <a href="{{ route('login') }}" 
                   class="inline-block px-5 py-1.5 bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg border text-white rounded-sm text-sm">  
                    Log in
                </a>
            @endauth
        </div>
    </div>

    <!-- Nav links -->
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

<!-- Space to avoid overlap -->
<div class="pt-40"></div>

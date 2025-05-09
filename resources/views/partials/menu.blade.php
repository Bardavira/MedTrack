<div class="fixed top-0 left-0 right-0 z-50">

    <div class="bg-blue-500">
        <!-- Logo no canto esquerdo -->
        <div class="flex items-center pl-4 pt-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 w-auto">
        </div>
    </div>

    
    <nav class="h-20 flex bg-blue-500 dark:bg-blue-700">
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
       <!-- 
       <a href="{{ route('wings.index') }}" 
           class="flex-1 flex items-center justify-center text-white text-sm hover:bg-blue-600 dark:hover:bg-blue-800 transition-all duration-500 hover:shadow-lg">
            Alas
        </a>-->
    </nav>
</div>

<div class="pt-48"></div>


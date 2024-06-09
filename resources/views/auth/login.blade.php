<x-layout>
    @if (session('success'))
        <x-success-message>{{ session('success') }}</x-success-message>   
    @endif

    <form action="/login" method="POST" class="max-w-sm mx-auto space-y-5">
        @csrf
        
        <x-form.field type="email" name="email" label="Email"/>
        <x-form.field type="password" name="password" label="Password"/>

        <div class="flex justify-between items-center">
            <x-button>Log In</x-button>

            <div class="text-sm">
                Don't have an account? 
                <a href="/register" class="text-[#285D47] font-bold ml-1">Register</a>
            </div>
        </div>
    </form>
</x-layout>
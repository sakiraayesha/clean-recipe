<x-layout>
    @if (session('success'))
        <x-success-message>{{ session('success') }}</x-success-message>   
    @endif

    <form action="/login" method="POST" class="max-w-sm mx-auto space-y-5">
        @csrf
        
        <x-forms.field label="Email" type="email" id="email" name="email" placeholder="Email" :value="old('email')" inputStyles="w-full" />

        <x-forms.field label="Password" type="password" id="password" name="password" placeholder="Password" inputStyles="w-full" />

        <div class="flex flex-col gap-3 min-[390px]:flex-row min-[390px]:justify-between min-[390px]:items-center">
            <x-button>Log In</x-button>

            <div class="text-sm">
                Don't have an account? 
                <a href="/register" class="text-[#0A6847] font-bold ml-1">Register</a>
            </div>
        </div>
    </form>
</x-layout>
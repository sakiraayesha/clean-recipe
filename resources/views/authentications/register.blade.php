<x-layout>
    <form action="/register" method="POST" class="max-w-sm mx-auto space-y-5">
        @csrf
        
        <x-forms.input type="text" name="first_name" placeholder="First Name" :value="old('first_name')" label="First Name" />

        <x-forms.input type="text" name="last_name" placeholder="Last Name" :value="old('last_name')" label="Last Name" />

        <x-forms.input type="text" name="username" placeholder="Username" :value="old('username')" label="Username" />

        <x-forms.input type="email" name="email" placeholder="Email" :value="old('email')" label="Email" />

        <x-forms.input type="password" name="password" placeholder="Password" label="Password" />
        
        <x-forms.input type="password" name="password_confirmation" placeholder="Confirm Password" label="Confirm Password" />

        <div class="flex flex-col gap-3 min-[390px]:flex-row min-[390px]:justify-between min-[390px]:items-center">
            <x-button class="w-fit">Register</x-button>

            <div class="text-sm">
                Already have an account? 
                <a href="/login" class="text-[#0A6847] font-bold ml-1">Log In</a>
            </div>
        </div>
    </form>
</x-layout>
<x-layout>
    <form action="/register" method="POST" class="max-w-sm mx-auto space-y-5">
        @csrf
        
        <x-forms.field label="First Name" id="first-name" name="first_name" placeholder="First Name" :value="old('first_name')" inputStyles="w-full" />

        <x-forms.field label="Last Name" id="last-name" name="last_name" placeholder="Last Name" :value="old('last_name')" inputStyles="w-full" />
        
        <x-forms.field label="Username" id="username" name="username" placeholder="Username" :value="old('username')" inputStyles="w-full" />

        <x-forms.field label="Email" type="email" id="email" name="email" placeholder="Email" :value="old('email')" inputStyles="w-full" />

        <x-forms.field label="Password" type="password" id="password" name="password" placeholder="Password" inputStyles="w-full" />

        <x-forms.field label="Confirm Password" type="password" id="password-confirmation" name="password_confirmation" placeholder="Confirm Password" inputStyles="w-full" />
        
        <div class="flex flex-col gap-3 min-[390px]:flex-row min-[390px]:justify-between min-[390px]:items-center">
            <x-button>Register</x-button>

            <div class="text-sm">
                Already have an account? 
                <a href="/login" class="text-[#0A6847] font-bold ml-1">Log In</a>
            </div>
        </div>
    </form>
</x-layout>
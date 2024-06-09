<x-layout>
    <form action="/register" method="POST" class="max-w-sm mx-auto space-y-5">
        @csrf
        
        <x-form.field type="text" name="first_name" label="First Name" />
        <x-form.field type="text" name="last_name" label="Last Name" />
        <x-form.field type="text" name="username" label="Username" />
        <x-form.field type="email" name="email" label="Email" />
        <x-form.field type="password" name="password" label="Password" />
        <x-form.field type="password" name="password_confirmation" label="Confirm Password" />

        <div class="flex justify-between items-center">
            <x-button>Register</x-button>

            <div class="text-sm">
                Already have an account? 
                <a href="/login" class="text-[#285D47] font-bold ml-1">Log In</a>
            </div>
        </div>
    </form>
</x-layout>
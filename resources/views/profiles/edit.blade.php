<x-layout>
    <h1 class="max-w-3xl mx-auto font-bold text-3xl mb-14">Edit Profile</h1>

    <form action="/profiles/{{ $profile->id }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto">
        @csrf
        @method('PATCH')

        <div class="flex flex-col w-full mb-8 sm:flex-row sm:justify-between">
            <fieldset class="space-y-5 w-full mb-8 sm:w-[calc(100%-15rem)] sm:mr-8 sm:mb-0 min-[800px]:w-[calc(100%-22rem)]">
                <x-forms.field label="Add Photo" type="file" fileType="Profile Image" id="image" name="image" :value="$profile->image" />

                <x-forms.field label="First Name" id="first-name" name="first_name" placeholder="First Name" :value="old('first_name') ?? $profile->first_name" inputStyles="w-full" />

                <x-forms.field label="Last Name" id="last-name" name="last_name" placeholder="Last Name" :value="old('last_name') ?? $profile->last_name" inputStyles="w-full" />
                
                <x-forms.field label="Username" id="username" name="username" placeholder="Username" :value="old('username') ?? $profile->user->username" inputStyles="w-full" />

                <x-forms.field label="Bio" type="textarea" id="bio" name="bio" placeholder="Tell us something about yourself..." :value="old('bio') ?? $profile->bio" />

                <x-forms.field label="Email" type="email" id="email" name="email" placeholder="Email" :value="old('email') ?? $profile->user->email" inputStyles="w-full" />

                <x-forms.field label="Password" type="password" id="password" name="password" placeholder="Password" inputStyles="w-full" />

                <x-forms.field label="Confirm Password" type="password" id="password-confirmation" name="password_confirmation" placeholder="Confirm Password" inputStyles="w-full" />
           
            </fieldset>

            <fieldset class="space-y-5 w-full flex-1 sm:w-52 min-[800px]:w-80">
                <h2 class="font-semibold tracking-wider text-black/40">SOCIALS</h2>

                <x-forms.field label="Facebook" type="url" id="facebook" name="facebook" placeholder="Facebook" :value="old('facebook') ?? $profile->facebook" inputStyles="w-full" />

                <x-forms.field label="Instagram" type="url" id="instagram" name="instagram" placeholder="Instagram" :value="old('instagram') ?? $profile->instagram" inputStyles="w-full" />

                <x-forms.field label="Linkedin" type="url" id="linkedin" name="linkedin" placeholder="Linkedin" :value="old('linkedin') ?? $profile->linkedin" inputStyles="w-full" />

                <x-forms.field label="Tiktok" type="url" id="tiktok" name="tiktok" placeholder="Tiktok" :value="old('tiktok') ?? $profile->tiktok" inputStyles="w-full" />

                <x-forms.field label="Twitter" type="url" id="twitter" name="twitter" placeholder="Twitter" :value="old('twitter') ?? $profile->twitter" inputStyles="w-full" />

                <x-forms.field label="Youtube" type="url" id="youtube" name="youtube" placeholder="Youtube" :value="old('youtube') ?? $profile->youtube" inputStyles="w-full" />  
            </fieldset>
        </div>

        <div class="flex justify-end">
            <x-button type="button" :fill=false link="/profiles/{{ $profile->user_id }}">CANCEL</x-button>
            <x-button>Save</x-button>
        </div>
    </form>
</x-layout>

<script type="module" src="{{ Vite::asset('resources/js/add-image.js') }}"></script>
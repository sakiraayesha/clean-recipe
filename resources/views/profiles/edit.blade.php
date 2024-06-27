<x-layout>
    <h1 class="font-bold text-lg text-center mb-10">Edit Profile</h1>

    <form action="/profiles/{{ $profile->id }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto">
        @csrf
        @method('PATCH')

        <div class="flex flex-col w-full mb-8 sm:flex-row sm:justify-between">
            <fieldset class="bg-[#F0EBE3] p-5 rounded-lg space-y-5 w-full sm:w-[calc(50%-1rem)]">
                <img src={{ asset($profile->image ?? 'defaults/profile-image.svg') }} class="size-20 rounded-full border border-black/10 object-cover -mt-10 mx-auto" id="preview-image" />
                <x-forms.file-input name="image" id="image" label="Upload" />
            </fieldset>
            
            <fieldset class="bg-[#F0EBE3] p-5 rounded-lg space-y-5 w-full mt-5 sm:w-[calc(50%-1rem)] sm:ml-8 sm:mt-0">    
                <x-forms.textarea name="about" placeholder="Tell us something about yourself" label="About">{{ old('about') ?? $profile->about }}</x-forms.textarea> 
            </fieldset>
        </div>

        <div class="flex flex-col w-full mb-8 sm:flex-row sm:justify-between">
            <fieldset class="bg-[#F0EBE3] p-5 rounded-lg space-y-5 w-full h-fit sm:w-[calc(50%-1rem)]">
                <x-forms.input type="text" name="first_name" placeholder="First Name" :value="old('first_name') ?? $profile->first_name" label="First Name" />

                <x-forms.input type="text" name="last_name" placeholder="Last Name" :value="old('last_name') ?? $profile->last_name" label="Last Name" />

                <x-forms.input type="text" name="username" placeholder="Username" :value="old('username') ?? $profile->user->username" label="Username" />

                <x-forms.input type="email" name="email" placeholder="Email" :value="old('email') ?? $profile->user->email" label="Email" />

                <x-forms.input type="password" name="password" placeholder="Change Password" label="Password" />
                
                <x-forms.input type="password" name="password_confirmation" placeholder="Confirm Password" label="Confirm Password" />
            </fieldset>
            
            <fieldset class="bg-[#F0EBE3] p-5 rounded-lg space-y-5 w-full h-fit mt-5 sm:w-[calc(50%-1rem)] sm:ml-8 sm:mt-0">    
                <x-forms.input type="url" name="facebook" placeholder="Facebook" :value="old('facebook') ?? $profile->facebook" label="Facebook" />

                <x-forms.input type="url" name="instagram" placeholder="Instagram" :value="old('instagram') ?? $profile->instagram" label="Instagram" />

                <x-forms.input type="url" name="linkedin" placeholder="Linkedin" :value="old('linkedin') ?? $profile->linkedin" label="Linkedin" />

                <x-forms.input type="url" name="tiktok" placeholder="Tiktok" :value="old('tiktok') ?? $profile->tiktok" label="Tiktok" />

                <x-forms.input type="url" name="twitter" placeholder="Twitter" :value="old('twitter') ?? $profile->twitter" label="Twitter" />

                <x-forms.input type="url" name="youtube" placeholder="Youtube" :value="old('youtube') ?? $profile->youtube" label="Youtube" />
            </fieldset>
        </div>

        <div class="flex gap-5 justify-center">
            <x-button>Save</x-button>
            <x-button type="button" link="/profiles/{{ $profile->user_id }}">Cancel</x-button>
        </div>
    </form>
</x-layout>

<script type="module">
    $(function() {
        $(document).on('change', '#image', function() {
            $('#preview-image').attr('src', URL.createObjectURL(this.files[0]));
            $('#preview-image').onload = () => URL.revokeObjectURL($('#preview-image').attr('src'));
        });
    });
</script>
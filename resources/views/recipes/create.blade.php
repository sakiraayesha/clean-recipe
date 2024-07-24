<x-layout>
    <h1 class="max-w-3xl mx-auto font-bold text-3xl mb-14">Create a Recipe</h1>

    <form action="/recipes" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto">
        @csrf

        <div class="flex flex-col w-full mb-8 sm:flex-row sm:justify-between">
            <fieldset class="space-y-5 w-full mb-5 sm:w-52 sm:mr-8 sm:mb-0 min-[800px]:w-80">
                <x-forms.field label="Add Photo" type="file" id="image" name="image" />
    
                <x-forms.field label="Prep Time" type="number" id="prep-time" name="prep_time" placeholder="0" :value="old('prep_time')" inputStyles="w-[calc(100%-6.063rem)] float-left mr-4 time-input" unitOptions=true />

                <x-forms.field label="Cook Time" type="number" id="cook-time" name="cook_time" placeholder="0" :value="old('cook_time')" inputStyles="w-[calc(100%-6.063rem)] float-left mr-4 time-input" unitOptions=true />
    
                <div class="flex text-sm py-2 border-b border-black/10">
                    <span class="font-semibold">Total Time</span>
                    <span class="ml-auto text-black/60 total-time-string">0</span>
                    <input type="hidden" name="total_time" id="total-time" />
                </div>
    
                <x-forms.field label="Servings" id="servings" name="servings" placeholder="e.g., 6" :value="old('servings')" inputStyles="w-full" />
    
                <x-forms.field label="Cuisine" id="cuisine" name="cuisine" placeholder="e.g., Italian" :value="old('cuisine')" inputStyles="w-full capitalize placeholder:normal-case" />
    
                <x-forms.field label="Category" id="category" name="category" placeholder="e.g., Lunch" :value="old('category')"  inputStyles="w-full capitalize placeholder:normal-case" />
              
                <x-forms.field label="Tags" id="tags" name="tags" placeholder="e.g., Healthy (Optional)" inputStyles="w-[calc(100%-2rem)] capitalize placeholder:normal-case" addIcon=true />
            </fieldset>

            <fieldset class="space-y-5 w-full flex-1 sm:w-[calc(100%-15rem)] min-[800px]:w-[calc(100%-22rem)]">
                <x-forms.field label="Title" id="title" name="title" placeholder="Add a title for your recipe" :value="old('title')" inputStyles="w-full" />
    
                <x-forms.field label="Description" id="description" name="description" placeholder="Tell us something about the recipe..." :value="old('description')" inputStyles="w-full" />

                <x-forms.field label="Ingredients" id="ingredients" name="ingredients" placeholder="e.g., 1 cup diced tomato" inputStyles="w-[calc(100%-2rem)]" addIcon=true />
        
                <x-forms.field label="Instructions" id="instructions" name="instructions" placeholder="e.g., Heat oil in a pan on low heat..." inputStyles="w-[calc(100%-2rem)]" addIcon=true />
    
                <x-forms.field label="Notes" id="notes" name="notes" placeholder="Add any helpful tips (Optional)" inputStyles="w-[calc(100%-2rem)]" addIcon=true />
            </fieldset>
        </div>

        <div class="flex justify-end">
            <x-button type="button" :fill=false link="/profiles/{{ auth()->id() }}">CANCEL</x-button>
            <x-button>Post Recipe</x-button>
        </div>
    </form>
</x-layout>

<script type="module" src="{{ Vite::asset('resources/js/create-recipe.js') }}"></script>
<x-layout>
    <h1 class="font-bold text-lg text-center mb-10">Create a Recipe</h1>

    <form action="/recipes" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col w-full mb-8 sm:flex-row sm:justify-between">
            <fieldset class="space-y-5 w-full sm:w-[calc(100%-14rem)] lg:w-[calc(100%-22rem)]">
                <x-form.input type="text" name="title" placeholder="Title" :value="old('title')" label="Title" />
    
                <x-form.input type="text" name="description" placeholder="Description" :value="old('description')" label="Description" />
            
                <x-form.input type="text" name="ingredient" placeholder="Ingredients" label="Ingredients" button=true />
        
                <x-form.input type="text" name="instruction" placeholder="Instructions" label="Instructions" button=true />
    
                <x-form.input type="text" name="note" placeholder="Notes" label="Notes" button=true />
            </fieldset>
            
            <fieldset class="space-y-5 w-full mt-5 sm:w-48 sm:ml-8 sm:mt-0 lg:w-80">    
                <x-form.input type="text" name="prep_time" placeholder="Prep Time" :value="old('prep_time')" label="Prep Time" />
    
                <x-form.input type="text" name="cook_time" placeholder="Cook Time" :value="old('cook_time')" label="Cook Time" />
    
                <x-form.input type="text" name="servings" placeholder="Servings" :value="old('servings')" label="Servings" />
    
                <x-form.input type="text" name="cuisine" placeholder="Cuisine" :value="old('cuisine')" label="Cuisine" />
    
                <x-form.input type="text" name="category" placeholder="Category" :value="old('category')" label="Category" />
              
                <x-form.input type="text" name="tag" placeholder="Tags" label="Tags" button=true />

                <x-form.input type="file" name="image" label="Image" />
            </fieldset>
        </div>

        <x-button class="block mx-auto">Post</x-button>
    </form>
</x-layout>

<script type="module">
    $(document).ready(function() { 
        $('.add-input').on('click', function() {
            let inputName = $(this).prev().attr('name');
            let inputValue = $(this).prev().val();
            let inputID = inputName  + '-list';
            let containerID = inputName  + '-list-container';
            let listCounter = $('#' + containerID + ' ul li').length;
            let valueList = listCounter > 0 ? JSON.parse($('#' + inputID).val()) : [];

            $('#' + containerID).show();
            $('#' + containerID + ' ul').append('<li>' + (listCounter + 1) + '. ' + inputValue + '</li>');

            valueList.push(inputValue);
            $('#' + inputID).val(JSON.stringify(valueList));

            $(this).prev().val('');
        });
    });
</script>
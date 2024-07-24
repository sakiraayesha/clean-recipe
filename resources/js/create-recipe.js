import './add-image';

$(function() { 
    let addedValues = {};

    $('.hidden-input').each(function () {
        let hiddenInputId = $(this).attr('id');
        let inputName = hiddenInputId.split('-')[0];
        addedValues[inputName] = $('#' + hiddenInputId).val() ? JSON.parse($('#' + hiddenInputId).val()) : [];
    });

    $('.add-icon').on('click', function () {
        let selectedInputField = $(this).prev();
        let inputName = selectedInputField.attr('name');
        let inputValue = selectedInputField.val();
        let addedValuesContainerId = 'added-' + inputName  + '-list';
        let hiddenInputId = inputName  + '-list';

        if (inputValue.trim().length) {
            let inputStyles = 'p-2 border border-black/15 focus-visible:outline-none focus-visible:border-black/30 text-sm w-[calc(100%-2rem)] added-value' + (inputName === 'tags' ? ' capitalize' : '');

            let addedValueContainer = '<li class="flex gap-3 items-center">' +
                                            '<input type="text" value="' + inputValue + '" class="' + inputStyles + '" />' + 
                                            '<img src="' + getImageUrl('remove') + '" class="w-5 input-remove-icon" />' +
                                        '</li>'; 
    
            $('#' + addedValuesContainerId).append(addedValueContainer);                            
            selectedInputField.val('');
            addedValues[inputName].push(inputValue);
            $('#' + hiddenInputId).val(JSON.stringify(addedValues[inputName]));
        }
    });

    $('.form-field').on('click', '.input-remove-icon', function () {
        let selectedInputField = $(this).prev();
        let inputName = selectedInputField.parent().parent().attr('id').split('-')[1];
        let inputIndex = $(this).parent().index();
        let hiddenInputId = inputName  + '-list';

        selectedInputField.parent().remove();
        addedValues[inputName].splice(inputIndex, 1);
        $('#' + hiddenInputId).val(JSON.stringify(addedValues[inputName]));
    });

    $('.form-field').on('change', '.added-value', function () {
        let selectedInputField = $(this);
        let inputName = selectedInputField.parent().parent().attr('id').split('-')[1];
        let inputValue = selectedInputField.val();
        let inputIndex = $(this).parent().index();
        let hiddenInputId = inputName  + '-list';

        if (inputValue.trim().length) {
            addedValues[inputName].splice(inputIndex, 1, inputValue);
            $('#' + hiddenInputId).val(JSON.stringify(addedValues[inputName]));
        }
    });

    $('.time-input').on('change', function () {
        let prepTime = $('#prep-time').val() || 0;
        let prepTimeUnit = $('#prep-time').next('select').val();

        let cookTime = $('#cook-time').val() || 0;
        let cookTimeUnit = $('#cook-time').next('select').val();

        let convertedPrepTime = convertTime(prepTime, prepTimeUnit);
        let convertedCookTime = convertTime(cookTime, cookTimeUnit);

        let totalHours = convertedPrepTime[0] + convertedCookTime[0];
        let totalMins = convertedPrepTime[1] + convertedCookTime[1];

        let totalTimeString = '';
        let totalTimeUnit;

        if (totalHours > 0) {
            totalTimeUnit = totalHours > 1 ? ' hours' : ' hour';
            totalTimeString += totalHours + totalTimeUnit;
        }

        if (totalMins > 0) {
            if (totalTimeString.length) {
                totalTimeString += ' and ';
            }

            totalTimeUnit = totalMins > 1 ? ' minutes' : ' minute';
            totalTimeString += totalMins + totalTimeUnit;
        }

        $('.total-time-string').text(totalTimeString);
        $('#total-time').val((totalHours * 3600) + (totalMins * 60));
    });

    function convertTime(time, unit) {
        let timeInHours = (unit === 'mins') ? (time >= 60 ? time / 60 : 0) : time;
        let timeInMins = (unit === 'mins') ? (time >= 60 ? time % 60 : time) : 0;

        return [parseInt(timeInHours), parseInt(timeInMins)];
    }
});
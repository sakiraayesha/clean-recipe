@props(['error' => false])

@if ($error)
    <p class="mt-2 font-medium text-xs text-red-600">{{ $error }}</p>
@endif
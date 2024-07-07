@props(['user'])

@php
    $isFollowedByCurrentUser = auth()->user()?->isFollowing($user) ? 1 : 0;
@endphp

<x-button type="button" class="w-fit mx-auto follow-button" data-user-id="{{ $user->id }}" data-followed="{{ $isFollowedByCurrentUser }}">
    {{ $isFollowedByCurrentUser ? 'Following' : 'Follow' }}
</x-button>
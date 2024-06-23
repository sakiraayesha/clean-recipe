@props(['user'])

<x-button type="button" class="w-fit mx-auto {{ auth()->user()?->isFollowing($user) ? 'unfollow-button' : 'follow-button' }}" data-user-id="{{ $user->id }}">
    {{ auth()->user()?->isFollowing($user) ? 'Following' : 'Follow' }}
</x-button>
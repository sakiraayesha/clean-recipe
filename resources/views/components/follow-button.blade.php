@props(['user'])

@php
    $isFollowedByCurrentUser = auth()->user()?->isFollowing($user) ? 1 : 0;
    $buttonClasses = $isFollowedByCurrentUser ? 'bg-transparent border-[#262c29] text-[#262c29]' : 'bg-[#7f8567] border-[#7f8567] text-white'
@endphp

<button {{ $attributes(['class' => 'px-5 py-1 w-fit rounded-full text-sm border hover:text-[#262c29] hover:bg-[#eff1e5] hover:border-[#eff1e5] follow-button ' . $buttonClasses]) }} type="button" data-user-id="{{ $user->id }}" data-followed="{{ $isFollowedByCurrentUser }}">
    {{ $isFollowedByCurrentUser ? 'Following' : 'Follow' }}
</button>
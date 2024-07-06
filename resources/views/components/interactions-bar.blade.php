@props(['likeable'])

@php
    $isLikedByUser = auth()->check() && $likeable->isLikedBy(auth()->user()) ? 1 : 0;
    $likes = $likeable->getLikesCount() ?: '';
@endphp

<div {{ $attributes(['class' => 'flex gap-x-4', 'data-likeable-type' => get_class($likeable), 'data-likeable-id' => $likeable->id]) }}>
    <div class="flex gap-2 items-center">
        <img src="{{ Vite::asset($isLikedByUser ? 'resources/images/liked.svg' : 'resources/images/like.svg') }}" class="cursor-pointer w-5 like-icon" data-liked={{ $isLikedByUser }} />
        <span class="text-black/40 font-bold">{{ $likes }}</span>
    </div>
    <img src="{{ Vite::asset('resources/images/comment.svg') }}" class="cursor-pointer w-5" />
    <img src="{{ Vite::asset('resources/images/share.svg') }}" class="cursor-pointer w-5" />
    <img src="{{ Vite::asset('resources/images/save.svg') }}" class="cursor-pointer w-5 ml-auto" />
</div>

<script type="module" src="{{ Vite::asset('resources/js/like.js') }}"></script>
@props(['heading', 'list', 'fieldName'])

<div {{ $attributes(['class' => 'space-y-2 mb-5']) }}>
    <h2 class="font-bold">{{ $heading }}</h2>
    
    <ul>
        @foreach ($list as $counter => $item)
            <li>{{ $counter + 1 }}. {{ $item->$fieldName }}</li>
        @endforeach
    </ul>
</div>
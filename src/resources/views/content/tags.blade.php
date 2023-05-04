@php
    $tags = $tags ?? collect();
@endphp
    @if ($tags->isNotEmpty())
        <ul>
            <div>
                @foreach($tags as $tag)
                    <a href="{{ route('tags', ['tag' => $tag]) }}" class="badge badge-secondary">{{ $tag->name }}</a>
                @endforeach
            </div>
        </ul>
    @endif
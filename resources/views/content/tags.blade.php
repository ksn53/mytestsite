@php
    $tags = $tags ?? collect();
@endphp
    @if ($tags->isNotEmpty())
        <ul>
            <div>
                @foreach($tags as $tag)
                    <a href="/tags/{{ $tag->getRouteKey() }}" class="badge badge-secondary">{{ $tag->name }}</a>
                @endforeach
            </div>
        </ul>
    @endif
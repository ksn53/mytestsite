@php
    $comments = $comments ?? collect();
@endphp
    @if ($comments->isNotEmpty())
        <ul>
            <div>
                @foreach($comments as $comment)
                    {{ $comment->title }}<br>
                @endforeach
            </div>
        </ul>
    @endif
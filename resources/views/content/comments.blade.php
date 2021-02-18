@php
    $comments = $comments ?? collect();
@endphp
    @if ($comments->isNotEmpty())
        <ul>
            <div>
                @foreach($comments as $comment)
                    <div class="commentRow commentContent">
                        <div class="commentHead">
                            <small><strong class='commentUser'>{{ $comment->owner_id }}</strong>{{ $comment->created_at }}</small>
                            <br><b>{{ $comment->title }}</b>
                        </div>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>
        </ul>
    @endif

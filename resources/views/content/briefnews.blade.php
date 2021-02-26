<div class="blog-post">
<h2 class="blog-post-title"><a href="{{ route("newssinglepage", ['news' => $news->slug]) }}">{{ $news->title }}</a></h2>
    <p class="blog-post-meta">{{ $news->updated_at }}</p>
    {{ $news->brief}}
</div>

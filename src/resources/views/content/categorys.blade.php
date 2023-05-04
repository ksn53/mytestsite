@php
    $categorys = $categorys ?? collect();
@endphp
    @if ($categorys->isNotEmpty())
        <ul>
            <div style="list-style-type: none;">
                @foreach($categorys as $category)
                    <div><a href="{{ route('category', ['category' => $category]) }}" style="float: left;"><li>{{ $category->name }}</li></a> &nbsp;({{ $category->posts()->count() }})</div>
                @endforeach
            </div>
        </ul>
    @endif
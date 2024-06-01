<div class="col-md-9 mx-auto">
@if(count($articles) > 0)
    @foreach($articles as $article)
        <div class="post-preview">
            <a href="{{route('single', [$article->getCategory->slug, $article->slug])}}">
                <h2 class="post-title">{{$article->title}}</h2>
                <img src="{{ starts_with($article->image, 'https') ? $article->image : asset($article->image) }}">
                <h3 class="post-subtitle">{!! str_limit($article->content, 75) !!}</h3>
            </a>
            <p class="post-meta">Category:
                <a href="{{route('category', $article->getCategory->slug)}}">{{$article->getCategory->name}}</a>
                <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
            </p>
        </div>
        @if(!$loop->last)
            <hr class="my-4" />
         @endif
    @endforeach
{{$articles->links()}}
@else
    <div class="alert alert-danger">
        <h2>Sorry, there is no article on this category!</h2>
    </div>
@endif
</div>

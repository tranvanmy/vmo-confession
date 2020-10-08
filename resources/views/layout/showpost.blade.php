@foreach($posthome as $post)

    <hr>
    <h3>Vmo Confession</h3>
    <h5>
        <a href="chitietbaipost/{{ $post->id }}"><b>#{{ $post->id }}:</b> {{ $post->title }}</a>
    </h5>
    <p>{!! $post->content !!}</p>

    @include('layout.like')

@endforeach

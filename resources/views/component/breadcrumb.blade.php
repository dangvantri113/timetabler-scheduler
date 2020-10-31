<div>
    @foreach($breadcrumb as $key => $link)
        <a href="{{$link}}">{{$key}}</a>
    @endforeach
</div>

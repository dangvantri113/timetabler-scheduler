<div class="breadcrumb">
    @if(isset($breadcrumb))
        @foreach($breadcrumb as $key => $link)
            <a href="{{$link}}">{{$key}}</a>
        @endforeach
    @endif
</div>

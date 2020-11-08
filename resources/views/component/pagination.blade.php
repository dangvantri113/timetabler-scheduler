<div class="pagination">
    @if($dataLink->currentPage()>1)
        <a class="pagination-item pre" href="{{$dataLink->path()}}?page={{$dataLink->currentPage()-1}}">Pre</a>
    @endif

    @for($i=1;$i<=$dataLink->lastPage();$i++)
        @if($i == $dataLink->currentPage())
            <span class="pagination-item active">{{$i}}</span>
        @else
            <a class="pagination-item" href="{{$dataLink->path()}}?page={{$i}}">{{$i}}</a>
        @endif
    @endfor

    @if($dataLink->currentPage()<$dataLink->lastPage())
        <a class="pagination-item next" href="{{$dataLink->path()}}?page={{$dataLink->currentPage()+1}}">Next</a>
    @endif
</div>

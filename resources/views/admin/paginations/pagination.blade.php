@php
    // dd($userList->links()->elements[0][count($userList->links()->elements[0])]);   
@endphp

<div class="row">
    <div class="col-lg-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link fas fa-angle-double-left" href="{{$userList->links()->elements[0][1]}}"></a>
                </li>
                <li class="page-item">
                    <a class="page-link fas fa-angle-left" href="{{$userList->previousPageUrl()}}"></a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="javascript::void(0)">...</a>
                </li>

                @foreach ($userList->links()->elements[0] as $key => $link)
                <li class="page-item {{$userList->currentPage() == $key ? 'active' : ''}}">
                    <a class="page-link" href="{{$link}}">{{$key}}</a>
                </li>
                @endforeach

            
                <li class="page-item">
                    <a class="page-link" href="javascript::void(0)">...</a>
                </li>
                
                <li class="page-item">
                    <a class="page-link fas fa-angle-right" href="{{$userList->nextPageUrl()}}"></a>
                </li>
                <li class="page-item">
                    <a class="page-link fas fa-angle-double-right" href="{{$userList->links()->elements[0][count($userList->links()->elements[0])]}}"></a>
                </li>
            </ul>
        </nav>
    </div>
</div>  
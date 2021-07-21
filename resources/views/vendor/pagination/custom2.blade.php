@if ($paginator->hasPages())
    <ul>


         {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a  class="blog-sidebar-icon" ><i class="fa fa-angle-up"></i></a>
        @else
            <a class="blog-sidebar-icon"  href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-up"></i></a>
        @endif

        
      <!--   {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="active"><span>{{ $element }}</span></li>
            @endif


            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="#" title="">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach -->

      
 

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
           <a class="blog-sidebar-icon blog-sidebar-icon1" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-down"></i></a>
        @else
            <a class="blog-sidebar-icon blog-sidebar-icon1" ><i class="fa fa-angle-down" ></i></a>
        @endif
    </ul>
@endif

<!-- <div class="blog-sidebar-one">
                                <a href="#" class="blog-sidebar-icon">
                                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="blog-sidebar-icon blog-sidebar-icon1">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </div> -->
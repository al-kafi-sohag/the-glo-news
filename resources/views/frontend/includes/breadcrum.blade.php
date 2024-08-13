<div class="d-flex">
    @foreach ($news->categories as $key => $cat)
    <div class="post_info_cat @if($key>0) ml-1 @endif">
        @if($key>0) | @endif
        <span>
            <a href="">{{ $cat->category->title }}</a>
            @if(isset($cat->subCategory) && !empty(($cat->subCategory)))
                &nbsp;/
                <a href="">{{ $cat->subCategory->title }}</a>
            @endif
        </span>
    </div>
    @endforeach
</div>

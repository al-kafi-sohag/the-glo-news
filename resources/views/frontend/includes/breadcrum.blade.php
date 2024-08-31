<div class="d-flex">
    @foreach ($news->categories as $key => $cat)
    <div class="post_info_cat @if($key>0) ml-1 @endif">
        @if($key>0) | @endif
        <span>
            <a href="{{ route('f.category.index', ['category_slug' => $cat->category->slug]) }}">{{ $cat->category->title }}</a>
            @if(isset($cat->subCategory) && !empty(($cat->subCategory)))
                &nbsp;/
                <a href="{{ route('f.category.index', ['category_slug' => $cat->subCategory->category->slug, 'sub_category_slug' => $cat->subCategory->slug]) }}">{{ $cat->subCategory->title }}</a>
            @endif
        </span>
    </div>
    @endforeach
</div>

<div class="breadcrumb">
    @foreach ($categories as $key => $cat)
        @php
            $hasCategory = isset($cat->category) && !empty($cat->category);
            $hasSubCategory = isset($cat->subCategory) && !empty($cat->subCategory) && isset($cat->subCategory->category);
        @endphp

        @if ($hasCategory || $hasSubCategory)
            @if ($key > 0)
                |
            @endif
            <span>
                {{-- Main category link --}}
                @if ($hasCategory)
                    <a href="{{ route('f.category.index', ['category_slug' => $cat->category->slug]) }}">
                        {{ $cat->category->title }}
                    </a>
                @endif

                {{-- Subcategory link --}}
                @if ($hasSubCategory)
                    &nbsp;/
                    <a href="{{ route('f.category.index', [
                        'category_slug' => $cat->subCategory->category->slug,
                        'sub_category_slug' => $cat->subCategory->slug
                    ]) }}">
                        {{ $cat->subCategory->title }}
                    </a>
                @endif
            </span>
        @endif
    @endforeach
</div>

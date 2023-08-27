@php
    $tag_en = App\Models\Product::groupBy('tag_en')
        ->select('tag_en')
        ->get();
    $tag_ja = App\Models\Product::groupBy('tag_ja')
        ->select('tag_ja')
        ->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">

            @if (session()->get('language') == 'japanese')
                @foreach ($tag_ja as $tag)
                    <a class="item active" title="Phone" href="{{ url('product/tag/' . $tag->tag_ja) }}">
                        {{ str_replace(',', ' ', $tag->tag_ja) }}</a>
                @endforeach
            @else
                @foreach ($tag_en as $tag)
                    <a class="item active" title="Phone" href="{{ url('product/tag/' . $tag->tag_en) }}">
                        {{ str_replace(',', ' ', $tag->tag_en) }}</a>
                @endforeach
            @endif

        </div>
    </div>
</div>

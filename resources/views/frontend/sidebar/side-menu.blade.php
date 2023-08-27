@php
    $categories = App\Models\Category::orderBy('name_en', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach ($categories as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon {{ $category->icon }}" aria-hidden="true"></i>
                        @if (session()->get('language') == 'japanese')
                            {{ $category->name_ja }}
                        @else
                            {{ $category->name_en }}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">

                                @php
                                    $subCategories = App\Models\SubCategory::where('category_id', $category->id)
                                        ->orderBy('name_en', 'ASC')
                                        ->get();
                                @endphp
                                @foreach ($subCategories as $subCategory)
                                    <div class="col-sm-12 col-md-3">

                                        <a
                                            href="{{ url('subCategory/product/' . $subCategory->id . '/' . $subCategory->slug) }}">
                                            <h2 class="title">
                                                @if (session()->get('language') == 'japanese')
                                                    {{ $subCategory->name_ja }}
                                                @else
                                                    {{ $subCategory->name_en }}
                                                @endif
                                            </h2>
                                        </a>

                                        @php
                                            $subSubCategories = App\Models\SubSubCategory::where('sub_category_id', $subCategory->id)
                                                ->orderBy('name_en', 'ASC')
                                                ->get();
                                        @endphp

                                        @foreach ($subSubCategories as $subSubCategory)
                                            <ul class="links list-unstyled">
                                                <li><a href="#">
                                                        @if (session()->get('language') == 'japanese')
                                                            {{ $subSubCategory->name_ja }}
                                                        @else
                                                            {{ $subSubCategory->name_en }}
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </nav>
</div>

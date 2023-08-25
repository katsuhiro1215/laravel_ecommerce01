@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">商品編集画面</h3>
                        </div>
                        <div class="box-body">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <form method="POST" action="{{ route('product.update', $product) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="old_image" value="{{ $product->thumbnail }}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>ブランド名 <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="brand_id" class="form-control" required>
                                                    <option value="" selected="" disabled="">Select Brand
                                                    </option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                            {{ $brand->name_ja }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('brand_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>カテゴリー名 <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select id="category_id" name="category_id" class="form-control" required>
                                                    <option value="" selected="" disabled="">Select Category
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                            {{ $category->name_ja }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>サブカテゴリー名 <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="sub_category_id" class="form-control" required>
                                                    <option value="" selected="" disabled="">Select Category
                                                    </option>
                                                    @foreach ($subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}"
                                                            {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}>
                                                            {{ $subCategory->name_ja }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('sub_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>サブサブカテゴリー名 <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="sub_sub_category_id" class="form-control" required>
                                                    <option value="" selected="" disabled="">Select Category
                                                    </option>
                                                    @foreach ($subSubCategories as $subSubCategory)
                                                        <option value="{{ $subSubCategory->id }}"
                                                            {{ $subSubCategory->id == $product->sub_sub_category_id ? 'selected' : '' }}>
                                                            {{ $subSubCategory->name_ja }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('sub_sub_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>商品名(JA) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name_ja" class="form-control"
                                                    value="{{ $product->name_ja }}" required>
                                            </div>
                                            @error('name_ja')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>商品名(EN) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name_en" class="form-control"
                                                    value="{{ $product->name_en }}" required>
                                            </div>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>商品コード <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="code" class="form-control"
                                                    value="{{ $product->code }}" required>
                                            </div>
                                            @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>タグ名(JA) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="tag_ja" class="form-control"
                                                    value="{{ $product->tag_ja }}" data-role="tagsinput" required>
                                            </div>
                                            @error('tag_ja')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>タグ名(EN) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="tag_en" class="form-control"
                                                    value="{{ $product->tag_en }}" data-role="tagsinput" required>
                                            </div>
                                            @error('tag_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>量 <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="qty" class="form-control"
                                                    value="{{ $product->qty }}" required>
                                            </div>
                                            @error('qty')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>カラー(JA) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="color_ja" class="form-control"
                                                    value="{{ $product->color_ja }}" data-role="tagsinput" required>
                                            </div>
                                            @error('color_ja')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>カラー(EN) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="color_en" class="form-control"
                                                    value="{{ $product->color_en }}" data-role="tagsinput" required>
                                            </div>
                                            @error('color_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>サイズ <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="size" class="form-control"
                                                    value="{{ $product->size }}" data-role="tagsinput" required>
                                            </div>
                                            @error('size')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>販売価格 <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="selling_price" class="form-control"
                                                    value="{{ $product->selling_price }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>割引価格 <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount_price" class="form-control"
                                                    value="{{ $product->discount_price }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="thumbnail" class="form-control"
                                                    onChange="thumbnailUrl(this)" required>
                                                @error('thumbnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5></h5>
                                            <div class="controls">
                                                <img src="{{ asset($product->thumbnail) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5></h5>
                                            <div class="controls">
                                                <img src="" id="thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Short Description(JA) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_description_ja" id="textarea" class="form-control" required placeholder="Textarea text">{!! $product->short_description_ja !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Short Description(EN) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_description_en" id="textarea" class="form-control" required placeholder="Textarea text">{!! $product->short_description_en !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>詳細(JA) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor1" name="long_description_ja" rows="10" cols="80" required="">{!! $product->long_description_ja !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>詳細(EN) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor2" name="long_description_en" rows="10" cols="80" required="">{!! $product->long_description_en !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                        value="1" {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured"
                                                        value="1" {{ $product->featured == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer"
                                                        value="1"
                                                        {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                        value="1"
                                                        {{ $product->special_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">商品画像編集画面</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('multiImage.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @foreach ($multiImages as $image)
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <h5>現在の画像 <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <img src="{{ asset($image->name) }}">
                                                </div>
                                                <div class="controls">
                                                  <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                  <input class="form-control" type="file" name="multi_img[{{ $image->id }}]">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('multiImage.destroy', $image->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i
                                                        class="fa fa-trash"></i> </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-xs-right">
                                  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                                       </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
    <script src="{{ asset('backend/js/pages/editor.js') }}"></script>
    <script type="text/javascript">
        // カテゴリー & サブカテゴリー & サブサブカテゴリー
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                let category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subSubCategory/subCategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_sub_category_id"]').html('');
                            let d = $('select[name="sub_category_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_category_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name_ja + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="sub_category_id"]').on('change', function() {
                var subCategory_id = $(this).val();
                if (subCategory_id) {
                    $.ajax({
                        url: "{{ url('/subSubCategory/subSubCategory/ajax') }}/" + subCategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="sub_sub_category_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_sub_category_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name_ja + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });

        // メインサムネイル
        function thumbnailUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumbnail').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // マルチ画像
        $(document).ready(function() {
            $('#multiImg').on('change', function() {
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) {
                    let data = $(this)[0].files;
                    $.each(data, function(index, file) {
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) {
                            let fRead = new FileReader();
                            fRead.onload = (function(file) {
                                return function(e) {
                                    let img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80);
                                    $('#preview_img').append(
                                        img);
                                };
                            })(file);
                            fRead.readAsDataURL(file);
                        }
                    });
                } else {
                    alert("Your browser doesn't support File API!");
                }
            });
        });
    </script>
@endsection

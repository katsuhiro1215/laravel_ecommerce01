@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">サブサブカテゴリー一覧<span class="badge badge-pill badge-danger">
                                    {{ count($subSubCategories) }}
                                </span></h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>カテゴリー名</th>
                                            <th>サブカテゴリー名</th>
                                            <th>サブサブカテゴリー名(JA)</th>
                                            <th>サブサブカテゴリー名(EN)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subSubCategories as $subSubCategory)
                                            <tr>
                                                <td>{{ $subSubCategory->subCategory->Category->name_ja }}</td>
                                                <td>{{ $subSubCategory->subCategory->name_ja }}</td>
                                                <td>{{ $subSubCategory->name_ja }}</td>
                                                <td>{{ $subSubCategory->name_en }}</td>
                                                <td>
                                                    <a href="{{ route('subSubCategory.edit', $subSubCategory->id) }}"
                                                        class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('subSubCategory.destroy', $subSubCategory->id) }}"
                                                        class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">サブカテゴリー作成画面</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('subSubCategory.store') }}">
                                @csrf
                                <div class="form-group">
                                    <h5>カテゴリー名(JA) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name_ja }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>サブカテゴリー名(JA) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="sub_category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubCategory</option>
                                        </select>
                                    </div>
                                    @error('sub_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>サブサブカテゴリー名(JA) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_ja" class="form-control"
                                            value="{{ old('name_ja') }}" required>
                                    </div>
                                    @error('name_ja')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>サブサブカテゴリー名(EN) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_en" class="form-control"
                                            value="{{ old('name_en') }}" required>
                                    </div>
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
    <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subSubCategory/subCategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="sub_category_id"]').empty();
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
        });
    </script>
@endsection

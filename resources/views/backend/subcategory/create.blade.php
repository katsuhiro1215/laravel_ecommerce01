@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">サブカテゴリー一覧<span class="badge badge-pill badge-danger">
                                    {{ count($subCategories) }}
                                </span></h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>カテゴリー名</th>
                                            <th>サブカテゴリー名(JA)</th>
                                            <th>サブカテゴリー名(EN)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subCategories as $subCategory)
                                            <tr>
                                                <td>{{ $subCategory->category->name_ja }}</td>
                                                <td>{{ $subCategory->name_ja }}</td>
                                                <td>{{ $subCategory->name_en }}</td>
                                                <td>
                                                    <a href="{{ route('subCategory.edit', $subCategory->id) }}"
                                                        class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('subCategory.destroy', $subCategory->id) }}"
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
                            <form method="POST" action="{{ route('subCategory.store') }}">
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
                                </div>
                                <div class="form-group">
                                    <h5>カテゴリー名(JA) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_ja" class="form-control"
                                            value="{{ old('name_ja') }}" required>
                                    </div>
                                    @error('name_ja')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>カテゴリー名(EN) <span class="text-danger">*</span></h5>
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
@endsection

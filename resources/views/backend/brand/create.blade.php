@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">ブランド一覧画面</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ブランド名(ja)</th>
                                            <th>ブランド名(en)</th>
                                            <th>画像</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->name_ja }}</td>
                                                <td>{{ $brand->name_en }}</td>
                                                <td>
                                                    <img src="{{ asset($brand->brand_photo_path) }}" alt=""
                                                        style="width: 70px; height: 40px;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('brand.edit', $brand) }}" class="btn btn-info"
                                                        title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('brand.destroy', $brand) }}" type="button" class="btn btn-danger" title="Delete Data"
                                                        id="delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">ブランド作成画面</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>{{ __('Name ja') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="name_ja" type="text" name="name_ja" class="form-control"
                                            value="{{ old('name_ja') }}" required>
                                    </div>
                                    @error('name_ja')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('Name en') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="name_en" type="text" name="name_en" class="form-control"
                                            value="{{ old('name_en') }}" required>
                                    </div>
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('Image') }}</h5>
                                    <div class="controls">
                                        <input type="file" name="brand_photo_path" class="form-control">
                                    </div>
                                    @error('brand_photo_path')
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

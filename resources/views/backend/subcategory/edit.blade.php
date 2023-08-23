@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">カテゴリー編集画面</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('subCategory.update', $subCategory) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <h5>{{ __('Name ja') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected': ''}} >{{ $category->name_en }}</option>	
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('Name ja') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="name_ja" type="text" name="name_ja" class="form-control"
                                            value="{{ $subCategory->name_ja }}" required>
                                    </div>
                                    @error('name_ja')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('Name en') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="name_en" type="text" name="name_en" class="form-control"
                                            value="{{ $subCategory->name_en }}" required>
                                    </div>
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

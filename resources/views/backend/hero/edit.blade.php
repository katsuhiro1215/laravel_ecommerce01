@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Hero編集画面</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('hero.update', $hero) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="old_image" value="{{ $hero->hero_photo_path }}">			   
                                <div class="form-group">
                                    <h5>{{ __('タイトル') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="title" type="text" name="title" class="form-control" value="{{ $hero->title }}" required>
                                    </div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('詳細') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="description" type="text" name="description" class="form-control" value="{{ $hero->description }}" required>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('Image') }}</h5>
                                    <div class="controls">
                                        <input type="file" name="hero_photo_path" class="form-control" value="{{ $hero->hero_photo_path }}">
                                    </div>
                                    @error('hero_photo_path')
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

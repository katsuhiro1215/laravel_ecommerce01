@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Hero一覧画面</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>画像</th>
                                            <th>タイトル</th>
                                            <th>詳細</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($heros as $hero)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($hero->hero_photo_path) }}" alt=""
                                                        style="width: 70px; height: 40px;">
                                                </td>
                                                <td>
                                                    @if ($hero->title == null)
                                                        <span class="badge badge-pill badge-danger"> No Title </span>
                                                    @else
                                                        {{ $hero->title }}
                                                    @endif
                                                </td>
                                                <td>{{ $hero->description }}</td>
                                                <td>
                                                    <a href="{{ route('hero.edit', $hero) }}" class="btn btn-info"
                                                        title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('hero.destroy', $hero) }}" type="button"
                                                        class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    @if ($hero->status == 1)
                                                        <a href="{{ route('hero.inactive', $hero->id) }}"
                                                            class="btn btn-danger" title="Inactive Now"><i
                                                                class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('hero.active', $hero->id) }}"
                                                            class="btn btn-success" title="Active Now"><i
                                                                class="fa fa-arrow-up"></i> </a>
                                                    @endif
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
                            <h3 class="box-title">Hero作成画面</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('hero.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>{{ __('タイトル') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="title" type="text" name="title" class="form-control"
                                            value="{{ old('title') }}" required>
                                    </div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('詳細') }}<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="description" type="text" name="description" class="form-control"
                                            value="{{ old('description') }}" required>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>{{ __('Image') }}</h5>
                                    <div class="controls">
                                        <input type="file" name="hero_photo_path" class="form-control">
                                    </div>
                                    @error('hero_photo_path')
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

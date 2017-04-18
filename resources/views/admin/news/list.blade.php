@extends('admin.layout.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            @if(session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Danh sách bài viết
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive"
                            class="table table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Ảnh nhỏ</th>
                                    <th>Loại tin</th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $data)
                                <tr>
                                    <td>{{ 'NS'.$data['id'] }}</td>
                                    <td><a href="{{ route('news.view', $data['news_slug']) }}">{!! $data['news_title'] !!}</a></td>
                                    <td>{!! $data['news_description'] !!}</td>
                                    <td><img alt="" src="{{ Image::url(asset('image/imageThumbnail') . '/' . $data['news_image_thumbnail'], ['width' => 100, 'height' => 100, 'crop' => true]) }}"></td>
                                    <td>
                                    @foreach($sub_cate as $cate)
                                        @if($cate['id'] == $data['news_cate_id'])
                                            {{ $cate['sub_category_name'] }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td><img alt="" src="{{ Image::url(asset('image/images') . '/' . $data['news_images'], ['width' => 150, 'height' => 150, 'crop' => true]) }}" width="100"></td>
                                    <td>{{ date('d-m-Y', strtotime($data['created_at'])) }}</td>
                                    <th>
                                        <span>
                                            <a href="{{ route('news.edit', $data['id']) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                        </span>
                                        <span>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#formDelete-{{ $data['id'] }}">
                                                <i class="fa fa-trash"></i> Xóa
                                            </button>
                                            @include('admin.news.delete')
                                        </span>
                                        <span>
                                        @if($data['news_is_check'] == 0)
                                            <a href="" class="btn btn-primary btn-xs disabled">
                                                <i class="fa fa-close"></i> Chưa duyệt
                                            </a>
                                        @else
                                            <a href="" class="btn btn-success btn-xs disabled">
                                                <i class="fa fa-check"></i> Đã duyệt
                                            </a>
                                        @endif
                                        </span>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $('.alert').delay(3000).slideUp();
</script>
@endsection

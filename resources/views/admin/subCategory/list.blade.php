@extends('admin.layout.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade in alert-hiden" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Danh sách loại tin
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive"
                            class="table table-striped table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Loại Tin</th>
                                    <th>Tên Slug</th>
                                    <th>Ngày Tạo</th>
                                    <th>Tên Thể Loại</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $value)
                                <tr>
                                    <td>{{ 'SC'.$value['id'] }}</td>
                                    <td>{{ $value['sub_category_name'] }}</td>
                                    <td>{{ $value['sub_cate_slug'] }}</td>
                                    <td>{{ date('d-m-Y', strtotime($value['created_at'])) }}</td>
                                    <td>
                                    @foreach ($category as $cate)
                                        @if ($value['category_id'] === $cate['id'])
                                            {{ $cate['category_name'] }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <th>
                                        <span>
                                            <a href="{{ route('subcategory.edit', $value['id']) }}" class="btn btn-primary btn-xs" id='delete-cate' @if (Auth::user()->user_role != 1) disabled @endif>
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                            <button onclick="getIdUser({{ $value['id'] }})" class="btn btn-danger btn-xs" id="delete" class="btn btn-primary" data-toggle="modal" data-target="#modelDelete" @if (Auth::user()->user_role != 1) disabled @endif>
                                                <i class="fa fa-trash"></i> Xóa
                                            </button>
                                        </span>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal Delete-->
                        <div class="modal fade" id="modelDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h2>Bạn có chắc chắn xóa loại tin này ?</h2>    
                                        <form method="POST" action="{{ route('subcategory.destroy') }}" id="form_delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="subcate_id" id="subcate_id">
                                        </form>

                                    </div>
                                    <div class="modal-body">
                                        Loại tin sẽ bị xóa và các tin tức thuộc loại tin này cũng sẽ bị xóa.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-danger" id='delete_subcate'>Đồng Ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    function getIdUser($id){
        $('#subcate_id').val($id);
    }

    $(document).ready(function(){
        $('#delete_subcate').click(function(){
            $('#form_delete').submit();
        });

        $('.alert-hiden').delay(3000).slideUp();
    });

</script>
@endsection
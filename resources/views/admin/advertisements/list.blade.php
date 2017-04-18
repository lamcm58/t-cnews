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
                            Danh sách quảng cáo
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive"
                            class="table table-striped table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Tên Công Ty</th>
                                    <th>Vị Trí</th>
                                    <th>Hình Ảnh</th>
                                    <th>Ngày Đăng</th>
                                    <th>Ngày Hết Hạn</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $value)
                                <tr>
                                    <td>{{ $value['adv_company'] }}</td>
                                    <td>{{ $value['adv_position'] }}</td>
                                    <td>{{ $value['adv_url'] }}</td>
                                    <td>{{ date('d-m-Y', strtotime($value['created_day'])) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($value['expired_day'])) }}</td>
                                    <th>
                                        <span>
                                            <a href="{{ route('advertisements.edit', $value['id']) }}" class="btn btn-primary btn-xs" id='delete-cate' @if (Auth::user()->user_role != 1) disabled @endif>
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                            <a onclick="getIdUser({{ $value['id'] }})" class="btn btn-danger btn-xs btn-delete" id="delete" data-toggle="modal" data-target="#modelDelete">
                                                <i class="fa fa-trash"></i> Xóa
                                            </a>
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
                                        <h2>Bạn có chắc chắn muốn xóa quảng cáo ?</h2>
                                        <form method="POST" action="{{ route('advertisements.destroy') }}" id="form_delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="adv_id" id="adv_id">
                                        </form>

                                    </div>
                                    <div class="modal-body">
                                        Quảng cáo sẽ bị xóa vĩnh viễn khỏi hệ thống
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-danger" id='delete_adv'>Đồng Ý</button>
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
        $('#adv_id').val($id);
    }

    $(document).ready(function(){
        $('#delete_adv').click(function(){
            $('#form_delete').submit();
        });

        $('.alert-hiden').delay(3000).slideUp();
    });

</script>
@endsection
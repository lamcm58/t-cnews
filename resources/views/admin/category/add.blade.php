@extends('admin.layout.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm mới thể loại</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="{{ route('category.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group {{ ($errors->first('category_name'))?'has-error':'' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên thể loại<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name='category_name' placeholder="Tên thể loại" value="{{ old('category_name') }}">
                                    @if ($errors->first('category_name'))
                                        <p class="text-danger">{{ $errors->first('category_name')}}</p>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Thêm mới</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layout.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm quảng cáo</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" 
                            action="{{ route('advertisements.store') }}" method="POST" 
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group {{ ($errors->first('adv_company'))?'has-error':'' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên công ty
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="adv_company" class="form-control" 
                                        placeholder="Nhập tên loại tin" value="{{ old('adv_company') }}">
                                    @if ($errors->first('adv_company'))
                                        <p class="text-danger">{{ $errors->first('adv_company')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->first('adv_url'))?'has-error':'' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Ảnh quảng cáo<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="adv_url">
                                    <div id="image_preview">
                                        <img id="previewing" />
                                    </div>
                                    @if ($errors->first('adv_url'))
                                        <p class="text-danger">{{ $errors->first('adv_url')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->first('adv_position'))?'has-error':'' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Vị trí<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <span>
                                        <input type="radio" value="header" id="optionsRadios1" 
                                            name="adv_position"
                                            {{ (in_array('header', $position)) ? 'disabled' : '' }}>
                                            Header
                                    </span>
                                    <span>
                                        <input type="radio" value="sidebar" id="optionsRadios1" 
                                            name="adv_position"
                                            {{ (in_array('sidebar', $position)) ? 'disabled' : '' }}>
                                            Sidebar
                                    </span>
                                    <span>
                                        <input type="radio" value="content" id="optionsRadios1" 
                                            name="adv_position"
                                            {{ (in_array('content', $position)) ? 'disabled' : '' }}>Content
                                    </span>
                                    @if ($errors->first('adv_position'))
                                        <p class="text-danger">{{ $errors->first('adv_position')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->first('url_company'))?'has-error':'' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Trang web công ty<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="url_company" class="form-control" 
                                        placeholder="Nhập địa chỉ website công ty"
                                        value="{{ old('adv_company') }}">
                                    @if ($errors->first('url_company'))
                                        <p class="text-danger">{{ $errors->first('url_company')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Ngày hết hạn quảng cáo<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <fieldset>
                                        <input type="text" class="form-control has-feedback-left" 
                                            id="expired_day" placeholder="" name="expired_day">
                                        <span class="fa fa-calendar-o form-control-feedback left" 
                                            aria-hidden="true">
                                        </span>
                                        <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <a href="{{ URL::previous() }}" class="btn btn-default">Hủy</a>
                                    <button type="submit" class="btn btn-success btn-them">Thêm mới</button>
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

@section ('js')
<script>
  $("input#expired_day").datepicker({
    minDate: 0,
    dateFormat: 'dd-mm-yy',
  }).datepicker("setDate", new Date());
</script>
@endsection
@extends('admin.layout.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm bài viết</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="news_title" class="form-control" placeholder="Tiêu đề" value="{{ old('news_title') }}">
                                    @if($errors->first('news_title'))
                                    <p class="text-danger">{{$errors->first('news_title')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="news_description" class="form-control" rows="3" placeholder='Mô tả'>{{ old('news_description') }}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace("news_description")</script>
                                    @if($errors->first('news_description'))
                                    <p class="text-danger">{{$errors->first('news_description')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="news_content" class="form-control" rows="3" placeholder='Nội dung'>{{ old('news_content') }}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace("news_content")</script>
                                    @if($errors->first('news_content'))
                                    <p class="text-danger">{{$errors->first('news_content')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Thể loại<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control" id="cate" name="category" onchange="loadSubCategory()">
                                        <option value="">Vui lòng lựa chọn thể loại</option>
                                        @foreach($cates as $cate)
                                        <option value="{{ $cate['id'] }}" {{ (isset($cate['id']) && $cate['id'] == old('category')) ? "selected" : "" }}>{{ $cate['category_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('category'))
                                    <p class="text-danger">{{$errors->first('category')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại tin<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="news_cate_id" class="form-control" id="subCategory">
                                        <option value="">Vui lòng lựa chọn loại tin</option>
                                    </select>
                                    @if($errors->first('news_cate_id'))
                                    <p class="text-danger">{{$errors->first('news_cate_id')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Hình nhỏ<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="file" name="news_image_thumbnail" value="">
                                        </label>
                                        @if($errors->first('news_image_thumbnail'))
                                        <p class="text-danger">{{$errors->first('news_image_thumbnail')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Hình ảnh<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="file" name="news_images">
                                        </label>
                                        @if($errors->first('news_images'))
                                        <p class="text-danger">{{$errors->first('news_images')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tin nóng
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="news_is_hot"> Có
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Thêm</button>
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

@section('js')
<script type="text/javascript">
  function loadSubCategory() {
    var _token = $('input[name="_token"]').val();
    var cat_id = $('#cate option:selected').val();
    $.ajax({
      url: "{{ route('subcategory.catChange') }}",
      type: 'POST',
      data: {
        _token: _token,
        category_id: cat_id
      },
      cache: false,
      success: function(data) {
        $('#subCategory').html("");
        var html = "";
        html += "<option value=''>Vui lòng lựa chọn loại tin</option>";
        for (var i=0; i < data['sub_cat'].length; i++) {
          html += "<option value='"+data['sub_cat'][i].id+"'>"+data['sub_cat'][i].sub_category_name+"</option>";
        }
      $('#subCategory').html(html);
      },
      error: function(data) {
        console.log(data);
      }
    });
    console.log(_token);
  }
</script>
@endsection

@extends('admin.layout.master')

@section('content')
<div class="right_col" role="main">
    @if(session('err'))
        <div class="alert alert-warning" role="alert">{{ session('err') }}</div>
    @endif
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Tổng số người viết</span>
            <div class="count">{{ $countUser }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clone"></i> Tổng số bài viết</span>
            <div class="count">{{ $countNews }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-comment-o"></i> Tổng số bình luận</span>
            <div class="count">{{ $countComment }}</div>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-th-list"></i> Tổng số thể loại</span>
            <div class="count">{{ $countCategory }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-cubes"></i> Tổng số loại tin</span>
            <div class="count">{{ $countSub }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-building"></i> Số công ty quảng cáo</span>
            <div class="count">{{ $countAdv }}</div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
@endsection

@section('js')
<script>
  $('div .alert').delay(3000).slideUp();
</script>
@endsection
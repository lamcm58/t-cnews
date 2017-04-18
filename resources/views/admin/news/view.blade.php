@extends('admin.layout.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{!! $news->news_title !!}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <div>
                        <span><u>
                        @foreach($cats as $cat)
                            @if($news->news_cate_id == $cat['id'])
                            {{ $cat['sub_category_name'] }}
                            @endif
                        @endforeach
                        </u></span> |
                        <span>{{ date('d-m-Y H:i:s', strtotime($news->created_at)) }}</span></div>
                    </div>
                    <div>{!! $news->news_description !!}</div>
                    <br/>
                    <img alt="" src="{{ asset('image/images') }}/{{ $news->news_images }}">
                    <br/><br/>
                    <div>{!! $news->news_content !!}</div>
                </div>
                @if(Auth::user()->user_role == 1)
                    @if($news->news_is_check == 0)
                    <form action="{{ route('news.check', $news->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="news_id" value="{{ $news->id }}">
                        <button type="submit" class="btn btn-primary">Duyệt</button>
                        <a href="{{ route('news.index') }}" class="btn btn-default">Quay lại danh sách</a>
                    </form>
                    @endif
                @else
                <a href="{{ route('news.index') }}" class="btn btn-default">Quay lại danh sách</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

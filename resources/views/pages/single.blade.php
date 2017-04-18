@extends('index')

@section ('title')
<title>{{ $news['news_title'] }}</title>
@endsection

@section ('meta')
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="http://t-cnews.cowell.com" />
<meta property="og:title" content="{{ $news['news_title'] }}" />
<meta property="og:description" content="{{ $news['news_description'] }}" />
<meta property="og:image" content="{{ asset('image/images/'. $news['news_images']) }}"/>
@endsection

@section('content')
<div class="main-content-left">
    <div class="content-article-title">
        <ul class="breadcrumb">
        @foreach ($breadcrumb as $br)
            <li>{{ $br }}</li>
        @endforeach
        </ul>
        <div class="right-title-side">
            <a href="{{ URL::previous() }}">
                <i class="fa fa-reply"></i>
                Quay lại trang chủ
            </a>
        </div>
    </div>
    <div class="main-article-content">
        <h2 class="article-title">
            {{ $news['news_title'] }}
        </h2>
        {{-- share facebook --}}
        <ul class="social-network">
            <li>
                <div class="fb-share-button"
                    data-href="{{ url()->current() }}"
                    data-layout="button_count">
                </div>
            </li>
            <li>
                <div class="g-plus" data-action="share"></div>
            </li>
        </ul>
        <div class="article-photo">
            <img class="setborder"
                src="{{ asset('image/images/'. $news['news_images']) }}"
                alt="{{ $news['news_slug'] }}" />
        </div>
        <!-- BEGIN .article-controls -->
        <div class="article-controls">
            <div class="date">
                <div class="calendar-time">
                    <font>Ngày đăng: </font>
                    <font>{{ date('h:m', strtotime($news['created_at'])) }}</font>
                    <font>{{ date('d-m-Y', strtotime($news['created_at'])) }}</font>
                </div>
            </div>
            <div class="right-side">
                <div>
                    <a href="#"
                        title="Posts by Orange Themes" rel="author" class="icon-link"><i
                        class="fa fa-user"></i> Tác giả: {{ $user['username'] }}</a> <a
                        href="#" class="icon-link"> <i
                        class="fa fa-comment"></i>{{ CommentNews::countComment($news['id']) }} Bình luận
                    </a>
                </div>
            </div>
            <div class="clear-float"></div>
            <!-- END .article-controls -->
        </div>
        <!-- BEGIN .shortcode-content -->
        <div class="shortcode-content">
            {!! $news['news_content'] !!}
        </div>
    </div>
    <!-- BEGIN .main-nosplit -->

    <div class="content-article-title">
        <h3>Xem thêm</h3>
    </div>
    <div class="related-block">
        <!-- BEGIN .article-array -->
        <ul class="article-array">
            @foreach ($newsRelated as $related)
            @if ($related['id'] != $news['id'])
                <li><a href="{{ route('single', $related['news_slug']) }}">
                    {{ $related['news_title'] }}
                    </a>
                    <a href="#"
                    class="comment-icon"> <i class="fa fa-comment"></i>
                    {{ CommentNews::countComment($related['id']) }}
                    </a>
                </li>
            @endif
            @endforeach
            <!-- END .article-array -->
        </ul>
        <div class="split-line"></div>
    </div>
    <div class="content-article-title">
        <h3>Ý kiến bạn đọc ({{ CommentNews::countComment($news['id']) }})</h3>
        <div class="right-title-side">
            <a href="#respond"><i class="fa fa-pencil"></i>Viết bình luận</a>
        </div>
    </div>
    <div class="comment-block">
        @foreach ($comment as $comm)
        <div class="commment-content">
            <strong class="user-nick">
                <a href="#">{{ $comm['comment_name'] }}</a>
            </strong>
            <span class="time-stamp"> {{ date('d-m-Y, h:m', strtotime($news['created_at'])) }}</span>
            <div class="comment-text">
                <p>{{ $comm['comment_content'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="content-article-title">
        <h3>Bình luận</h3>
    </div>
    <a href="#" name="respond"></a>
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">
            <small><a rel="nofollow" id="cancel-comment-reply-link"
                href="index.html#respond" style="display: none;">Click here to
                    cancel reply.</a></small>
        </h3>
        <div class="row">
            <div class="col-md-offset-1 col-md-9">
                <form action="{{ route('comment') }}" method="POST" id="add_comment">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="comment_news_id" id="comment_news_id" value="{{ $news['id'] }}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="comment_name" class="form-control" id="comment_name" placeholder="Tên nặc danh">
                    </div>
                    <div class="form-group">
                        <label>Ý kiến của bạn</label>
                        <textarea class="form-control" name="comment_content" placeholder="Ý kiến của bạn..." rows="3" id="comment_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right btn-sm">Gửi</button>
                </form>
            </div>
        </div>
    </div>
    <!-- #respond -->
    <!-- END .main-content-left -->
</div>
@endsection

@section ('js')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1320961527966423";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>
@endsection
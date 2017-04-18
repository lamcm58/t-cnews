@extends('index')

@section ('title')
    <title>t-cnews.cowell</title>
@endsection

@section('content')
<div class="main-content-left">
    <!-- BEGIN .slider-container -->
    <div class="slider-container">
        <!-- BEGIN .slider-content -->
        <div class="slider-content">
            <ul>
                @if (isset($slideNews))
                    @foreach ($slideNews as $slide)
                    <li><a
                        href="">
                            <span class="slider-info">{{ $slide['news_title'] }}</span>
                            <img
                            src="{{ Image::url(asset('image/images') . '/' . $slide['news_images'],
                                ['width' => 680, 'height' => 250, 'crop' => true]) }}"
                            class="setborder"
                            alt="{{ $slide['news_slug'] }}" />
                    </a></li>
                    @endforeach
                @else
                    <p>Không có tin</p>
                @endif
            </ul>
            <!-- END .slider-content -->
        </div>
        <ul class="slider-controls"></ul>
        <!-- END .slider-container -->
    </div>
    <!-- BEGIN .main-content-split -->
    <div class="main-content-split">
        <!-- BEGIN .main-split-left -->
        <div class="main-split-left">
            <!-- BEGIN .article-big-block -->
            <div
                class="article-big-block post-172 post type-post status-publish format-standard has-post-thumbnail hentry category-entertainment category-technology tag-cibods tag-dispdo tag-feugiat-epicuri-deterruisset tag-no-tollit-reprimique tag-reprimique tag-repriue-dissentiet"
                id="post-172">
                <div class="article-header">
                    <h2>
                        <a href="{{ route('single', $newsHost['news_slug']) }}">
                            {{ $newsHost['news_title'] }}
                        </a>
                    </h2>
                </div>
                <div class="article-photo">
                    <span class="image-hover">
                        <span class="drop-icons">
                            <span class="icon-block">
                            <a href="{{ route('single', $newsHost['news_slug']) }}"
                                title="Xem tin" class="icon-link legatus-tooltip">&nbsp;
                            </a>
                            </span>
                        </span>
                        <img class="setborder"
                        src="{{ Image::url(asset('image/images') . '/' . $newsHost['news_images'],
                            ['width' => 330, 'height' => 200, 'crop' => true]) }}"
                        alt="Intellegat quaerendum suscipiantur est epicurei delicata" />
                    </span>
                </div>
                <div class="article-content">
                    <p>{!! $newsHost['news_description'] !!}</p>
                </div>
                <div class="article-links">
                    <a href="intellegat-quaerendum-suscipiantur-est-epicurei-delicata-3-2/index.html#comments" class="article-icon-link">
                    <i class="fa fa-comment"></i>
                        {{ CommentNews::countComment($newsHost['id']) }} bình luận</a>
                    <a href="intellegat-quaerendum-suscipiantur-est-epicurei-delicata-3-2/index.html"
                        class="article-icon-link"><i class="fa fa-reply"></i>Xem chi tiết</a>
                </div>
                <!-- END .article-big-block  -->
            </div>
            <!-- BEGIN .content-panel -->
            <div class="content-panel">
                <div class="panel-header">
                    <b><i class="fa fa-chain"></i>Tin liên quan</b>
                    <div class="top-right">
                        <a href="">Xem chi tiết</a>
                    </div>
                </div>
                <div class="panel-content">
                    <ul class="article-array">
                        @foreach ($newsRelated as $related)
                        <li>
                            <a href="{{ route('single', $related['news_slug']) }}">
                                {{ $related['news_title'] }}
                            </a>
                                <i class="fa fa-comment"></i>
                                {{ CommentNews::countComment($related['id']) }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- END .content-panel -->
            </div>
            <!-- BEGIN .article-big-block -->
        </div>
        <!-- BEGIN .main-split-right -->
        <div class="main-split-right">
            <!-- BEGIN .article-small-block -->
            @foreach ($newsHotLeft as $hotLeft)
            <div class="article-small-block post type-post status-publish format-standard has-post-thumbnail hentry category-entertainment category-sport-news tag-cibods tag-ex-usu-blandit tag-modus-sapientem tag-patrioque-omntur tag-reprimique"
                id="post-163">
                <div class="article-header">
                    <h2>
                        <a
                            href="{{ route('single', $hotLeft['news_slug']) }}">
                            {{ $hotLeft['news_title'] }}
                        </a>
                    </h2>
                </div>
                <div class="article-photo">
                    <span class="image-hover"> <span class="drop-icons"> <span
                            class="icon-block"><a
                                href="{{ route('single', $hotLeft['news_slug']) }}"
                                title="Xem tin" class="icon-link legatus-tooltip">&nbsp;</a>
                        </span>
                    </span> <img class="setborder"
                        src="{{ Image::url(asset('image/images') . '/' . $hotLeft['news_images'],
                            ['width' => 140, 'height' => 110, 'crop' => true]) }}"
                        alt="Has dico invenire everti maiorum voluptatum his" />
                    </span>
                </div>
                <div class="article-content">
                    <p>{!! $hotLeft['news_description'] !!}</p>
                </div>
                <div class="article-links">
                    <a
                        href="has-dico-invenire-everti-maiorum-voluptatum-his-2-3-2/index.html#comments"
                        class="article-icon-link"><i class="fa fa-comment"></i>
                        {{ CommentNews::countComment($hotLeft['id']) }}
                        bình luận</a> <a
                        href="{{ route('single', $hotLeft['news_slug']) }}"
                        class="article-icon-link"><i class="fa fa-reply"></i>Xem chi tiết</a>
                </div>
                <!-- END .article-small-block  -->
            </div>
            @endforeach
            <!-- END .main-split-right -->
        </div>
    </div>
    <!-- BEGIN .main-content-split -->
    <div class="main-content-split">
        <!-- BEGIN .main-split-left -->
        <div class="main-split-left">
            <!-- BEGIN .content-panel -->
            <div class="content-panel">
                <div class="panel-header">
                    <b style="background: #6D8B13;"><i class="fa fa-star-o"></i>Tin giải trí</b>
                    <div class="top-right">
                        <a href="{{ route('cate', 'giai-tri') }}">Xem chi tiết</a>
                    </div>
                </div>
                <div class="panel-content">
                    <!-- BEGIN .article-big-block -->
                    <div class="article-big-block">
                    @if(!empty($newsEntertain))
                        <div class="article-photo">
                            <span class="image-hover"> <span class="drop-icons">
                                    <span class="icon-block"><a
                                        href="{{ route('single', $newsEntertain[0]['news_slug']) }}"
                                        title="Xem tin" class="icon-link legatus-tooltip">&nbsp;</a></span>
                            </span>
                            <img src="{{ Image::url(asset('image/images') . '/' . $newsEntertain[0]['news_images'],
                                     ['width' => 330, 'height' => 200, 'crop' => true]) }}"
                                class="setborder" alt="" title="" />
                            </span>
                        </div>
                    @endif
                        <div class="article-header">
                            <h2>
                                <a href="{{ route('single', $newsEntertain[0]['news_slug']) }}">
                                @if(!empty($newsEntertain))
                                    {!! $newsEntertain[0]['news_title'] !!}
                                @endif
                                </a>
                            </h2>
                        </div>
                        <div class="article-content">
                        @if(!empty($newsEntertain))
                            <p>{!! $newsEntertain[0]['news_description'] !!}</p>
                        @endif
                        </div>
                        <div class="article-links">
                        @if(!empty($newsEntertain))
                            <a
                                href="intellegat-quaerendum-suscipiantur-est-epicurei-delicata-3-2/index.html#comments"
                                class="article-icon-link"> <i class="fa fa-comment"></i>
                                    {{ CommentNews::countComment($newsEntertain[0]['news_id']) }} bình luận
                            </a> <a
                                href="{{ route('single', $newsEntertain[0]['news_slug']) }}" class="article-icon-link"><i class="fa fa-reply"></i>Xem chi tiết bài viết</a>
                        @else
                            <h3><a href="#" class="article-header">Hiện tại không có bài viết nào thuộc thể loại này.</a></h3>
                        @endif
                        </div>
                        <!-- END .article-big-block -->
                    </div>
                    <!-- BEGIN .article-array -->
                    <ul class="article-array content-category">
                    @if(!empty($newsEntertain))
                        @foreach($newsEntertain as $news)
                            @if($news !== $newsEntertain[0])
                            <li>
                                <a href="{{ route('single', $news['news_slug']) }}">{!! $news['news_title'] !!}</a>
                                <a href="#" class="comment-icon"><i class="fa fa-comment"></i>{{ CommentNews::countComment($news['news_id']) }}</a>
                            </li>
                            @endif
                        @endforeach
                    @endif

                        <!-- END .article-array -->
                    </ul>
                </div>
                <!-- END .content-panel -->
            </div>
            <!-- END .main-split-right -->
        </div>
        <!-- BEGIN .main-split-right -->
        <div class="main-split-right">
            <!-- BEGIN .content-panel -->
            <div class="content-panel">
                <div class="panel-header">
                    <b style="background: #9F3819;"><i class="fa fa-ship"></i>Tin khoa học</b>
                    <div class="top-right">
                        <a href="{{ route('cate', 'khoa-hoc') }}">Xem chi tiết</a>
                    </div>
                </div>
                <div class="panel-content">
                    <!-- BEGIN .article-big-block -->
                    <div class="article-big-block">
                    @if(!empty($newsTech))
                        <div class="article-photo">
                            <span class="image-hover"> <span class="drop-icons">
                                    <span class="icon-block">
                                    <a href="{{ route('single', $newsTech[0]['news_slug']) }}" title="Xem tin" class="icon-link legatus-tooltip">&nbsp;
                                    </a>
                                    </span>
                            </span>
                            <img src="{{ Image::url(asset('image/images') . '/' . $newsTech[0]['news_images'],
                                     ['width' => 330, 'height' => 200, 'crop' => true]) }}"
                                class="setborder" alt="" title="" />
                            </span>
                        </div>
                    @endif
                        <div class="article-header">
                            <h2>
                                <a href="{{ route('single', $newsTech[0]['news_slug']) }}">
                                @if(!empty($newsTech))
                                    {!! $newsTech[0]['news_title'] !!}
                                @endif
                                </a>
                            </h2>
                        </div>
                        <div class="article-content">
                        @if(!empty($newsTech))
                            <p>{!! $newsTech[0]['news_description'] !!}</p>
                        @endif
                        </div>
                        <div class="article-links">
                        @if(!empty($newsTech))
                            <a
                                href="#" class="article-icon-link"> <i class="fa fa-comment"></i>
                                    {{ CommentNews::countComment($newsTech[0]['news_id']) }} bình luận
                            </a> <a
                                href="{{ route('single', $newsTech[0]['news_slug']) }}"
                                class="article-icon-link"><i class="fa fa-reply"></i>Xem chi tiết bài viết</a>
                        @else
                            <h3><a href="#" class="article-header"> Hiện tại không có bài viết nào thuộc thể loại này.</a></h3>
                        @endif
                        </div>
                        <!-- END .article-big-block -->
                    </div>
                    <!-- BEGIN .article-array -->
                    <ul class="article-array content-category">
                    @if(!empty($newsTech))
                        @foreach($newsTech as $news)
                            @if($news !== $newsTech[0])
                            <li>
                                <a href="{{ route('single', $news['news_slug']) }}">{!! $news['news_title'] !!}</a> <a
                                href="{{ route('single', $news['news_slug']) }}"
                                class="comment-icon"><i class="fa fa-comment"></i>{{ CommentNews::countComment($news['news_id']) }}</a>
                            </li>
                            @endif
                        @endforeach
                    @endif

                        <!-- END .article-array -->
                    </ul>
                </div>
                <!-- END .content-panel -->
            </div>
            <!-- END .main-split-right -->
        </div>
        <div class="clear-float"></div>
        <!-- END ..main-content-split -->
    </div>
    <!-- BEGIN .main-nosplit -->
    <div class="main-nosplit">
        <!-- BEGIN .banner -->
        <div class="banner">
            <div class="banner-block">
                @foreach ($adv as $adve)
                    @if ($adve['adv_position'] === 'content')
                    <a href="{{ $adve['url_company'] }}" target="_blank">
                        <img src="{{ asset('image/adv/' . $adve['adv_url']) }}"
                        alt="" />
                    </a>
                    @endif
                @endforeach
            </div>
            <!-- END .banner -->
        </div>
    </div>
    <!-- BEGIN .main-nosplit -->
    <div class="main-nosplit">
        <!-- BEGIN .content-panel -->
        <div class="content-panel">
            <div class="panel-header">
                <b style="background: #A21D1D;"><i class="fa fa-soccer-ball-o"></i>Tin thể thao</b>
                <div class="top-right">
                    <a href="{{ route('cate', 'the-thao') }}">Xem chi tiết</a>
                </div>
            </div>
            <div class="panel-content">
                <!-- BEGIN .article-array -->
                <ul class="article-array content-category">
                @if(!empty($newsSport))
                    @foreach($newsSport as $news)
                    <li><a
                        href="{{ route('single', $news['news_slug']) }}">{!! $news['news_title'] !!}</a>
                        <a
                        href="everti-maiorum-voluptatum-omnes-eligendi-vim-erroribus-disputationi-3-2/index.html#comments"
                        class="comment-icon"><i class="fa fa-comment"></i>{{ CommentNews::countComment($news['news_id']) }}</a></li>
                    @endforeach
                @else
                    <h3><a href="#" class="article-header"> Hiện tại không có bài viết nào thuộc thể loại này.</a></h3>
                @endif
                    <!-- END .article-array -->
                </ul>
            </div>
            <!-- END .content-panel -->
        </div>
    </div>

    <!-- BEGIN .main-nosplit -->
    <div class="main-nosplit">
        <!-- BEGIN .banner -->
        <div class="banner">
            <div class="banner-block">
                @foreach ($adv as $adve)
                    @if ($adve['adv_position'] === 'content')
                    <a href="{{ $adve['url_company'] }}" target="_blank">
                        <img src="{{ asset('image/adv/' . $adve['adv_url']) }}"
                        alt="" />
                    </a>
                    @endif
                @endforeach
            </div>
            <!-- END .banner -->
        </div>
    </div>

</div>
@endsection
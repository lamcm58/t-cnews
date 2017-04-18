<div class="main-content-right">
    <!-- BEGIN .main-nosplit -->
    <div class="main-nosplit">
        <div class="widget-1 first panel">
            <div class="banner">
                @foreach ($adv as $adve)
                    @if ($adve['adv_position'] === 'sidebar')
                    <a href="{{ $adve['url_company'] }}" target="_blank">
                        <img src="{{ Image::url(asset('image/adv') . '/' . $adve['adv_url'],
                            ['width' => 300, 'height' => 250, 'crop' => true]) }}"
                        alt="" />
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="widget-4 panel">
            <h3>Lịch</h3>
            <div id="calendar_wrap" class="calendar_wrap"><table id="wp-calendar">
            <caption>April 2017</caption>
            <thead>
            <tr>
                <th scope="col" title="Monday">M</th>
                <th scope="col" title="Tuesday">T</th>
                <th scope="col" title="Wednesday">W</th>
                <th scope="col" title="Thursday">T</th>
                <th scope="col" title="Friday">F</th>
                <th scope="col" title="Saturday">S</th>
                <th scope="col" title="Sunday">S</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="3" id="prev"><a href="http://legatus.orange-themes.com/2013/06/">« Jun</a></td>
                <td class="pad">&nbsp;</td>
                <td colspan="3" id="next" class="pad">&nbsp;</td>
            </tr>
            </tfoot>

            <tbody>
            <tr>
                <td colspan="5" class="pad">&nbsp;</td><td><span>1</span></td><td><span>2</span></td>
            </tr>
            <tr>
                <td><span>3</span></td><td><span>4</span></td><td><span>5</span></td><td><span>6</span></td><td><span>7</span></td><td><span>8</span></td><td><span>9</span></td>
            </tr>
            <tr>
                <td><span>10</span></td><td id="today"><span>11</span></td><td ><span>12</span></td><td><span>13</span></td><td><span>14</span></td><td><span>15</span></td><td><span>16</span></td>
            </tr>
            <tr>
                <td><span>17</span></td><td><span>18</span></td><td><span>19</span></td><td><span>20</span></td><td><span>21</span></td><td><span>22</span></td><td><span>23</span></td>
            </tr>
            <tr>
                <td><span>24</span></td><td><span>25</span></td><td><span>26</span></td><td><span>27</span></td><td><span>28</span></td><td><span>29</span></td><td><span>30</span></td>
            </tr>
            </tbody>
            </table></div>
        </div>
        <div class="widget-5 last panel">
            <h3>Tin mới nhất</h3>
            <div>
                <div class="top-right">
                    <a href="blog/index.html">Xem thêm tin</a>
                </div>
                <!-- BEGIN .article-middle-block -->
                <div class="article-side-block">
                    <div class="article-photo">
                        <span class="image-hover">
                        <img src="{{ Image::url(asset('image/images') . '/' . $newsHostSb['news_images'], ['width' => 310, 'height' => 250, 'crop' => true]) }}"
                            class="setborder" alt="{{ $newsHostSb['news_slug'] }}"/>
                        </span>
                    </div>
                    <div class="article-header">
                        <h2>
                            <a href="{{ route('single', $newsHostSb['news_slug']) }}">
                            {{ $newsHostSb['news_title'] }}</a>
                        </h2>
                    </div>
                    <div class="article-links">
                        <a
                            href="qui-wisi-aliquam-gubergren-no-sed-ei-omnes-expetenda-2-3-2/index.html#comments"
                            class="article-icon-link"> <i class="fa fa-comment"></i>
                            {{ CommentNews::countComment($newsHostSb['id']) }} Bình luận
                        </a>
                        <a
                            href="{{ route('single', $newsHostSb['news_slug']) }}"
                            class="article-icon-link"><i class="fa fa-reply">
                            </i>Xem chi tiết
                        </a>
                    </div>
                    <!-- END .article-middle-block -->
                </div>
                <!-- BEGIN .article-array -->
                <ul class="article-array content-category">
                    @foreach ($newsRelatedSb as $newsSb)
                    <li>
                        <a href="{{ route('single', $newsSb['news_slug']) }}">
                            {{ $newsSb['news_title'] }}
                        </a>
                        <a href="#"
                            class="comment-icon"><i class="fa fa-comment"></i>
                            {{ CommentNews::countComment($newsSb['id']) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1riqeSpjvp4irYZuNVnkSB_fNgEQ" height="300px"></iframe>
        </div>
        <!-- END .main-nosplit -->
    </div>
    <!-- END .main-content-right -->
</div>
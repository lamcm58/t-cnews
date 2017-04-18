<div class="footer">
    <!-- BEGIN .wrapper -->
    <div class="wrapper">
        <!-- BEGIN .footer-content -->
        <div class="footer-content">
            <div class="footer-menu">
                <ul class="load-responsive" rel="Footer Menu">
                    @foreach ($category as $cate)
                    <li class="menu-item menu-item-object-post_tag">
                        <a href="{{ route('cate', $cate['category_slug']) }}">
                        {{ $cate['category_name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="left">
                © 2017 Copyright <b>t-cnews theme</b>. All Rights reserved.
            </div>
            <div class="right">
                Designed by 
            </div>
            <div class="clear-float"></div>
            <!-- END .footer-content -->
        </div>
        <!-- END .wrapper -->
    </div>
    <!-- END .footer -->
</div>
    <div class="footer">
        <div class="container">
            <div class="col-md-3 grid_4">
               <h3>@lang('messages.btn_about')</h3>    
               <p>"Project 1 Xuân Nam và Hùng Cường..."</p>
                  <ul class="social-nav icons_2 clearfix">
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                 </ul>
            </div>
            <div class="col-md-3 grid_4">
               <h3>@lang('messages.lb_quickLink')</h3>
                <ul class="footer_list">
                    <li><a href="#">-&nbsp;  ANIMAL </a></li>
                    <li><a href="#">-&nbsp;  CITY</a></li>
                    </ul>
            </div>
            <div class="col-md-3 grid_4">
               <h3>@lang('messages.lb_contactUs')</h3>
                <address>
                    <strong>Framgia inc.</strong>
                    <br>
                    <span>16 Lý Thường Kiệt, Hải Châu, Đà Nẵng</span>
                    <br><br>
                    <abbr>Telephone : </abbr> +84 (90) 6498644
                    <br>
                    <abbr>Email : </abbr> <a href="#">xnam7799@gmail.com</a>
               </address>
            </div>
            <div class="col-md-3 grid_4">
               <h3>@lang('messages.lb_working')</h3>
                 <table class="table_working_hours">
                    <tbody>
                        <tr class="opened_1">
                            <td class="day_label">monday</td>
                            <td class="day_value">7:45 am - 4.45 pm</td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">tuesday</td>
                            <td class="day_value">7:45 am - 4.45 pm</td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">wednesday</td>
                            <td class="day_value">7:45 am - 4.45 pm</td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">thursday</td>
                            <td class="day_value">7:45 am - 4.45 pm</td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">friday</td>
                            <td class="day_value">7:45 am - 4.45 pm</td>
                        </tr>
                        <tr class="closed">
                            <td class="day_label">saturday</td>
                            <td class="day_value closed"><span>Closed</span></td>
                        </tr>
                        <tr class="closed">
                            <td class="day_label">sunday</td>
                            <td class="day_value closed"><span>Closed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="clearfix"> </div>
            <div class="copy">
               <p>Copyright © 2019 Framgia E-learnining . All Rights Reserved  | Design by <a href="http://fb.com/phamxuannam97" target="_blank">XuanNam</a> </p>
            </div>
        </div>
    </div>
{{ Html::script(asset('layouts/home/js/jquery.countdown.js')) }}
{{ Html::script(asset('layouts/home/js/script.js')) }}
</body>
</html>

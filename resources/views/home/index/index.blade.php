@extends('layouts.home.master')
@section('title')
Framgia E-learning System
@endsection
@section('content')
<div class="banner">
   {{ Html::script(asset('layouts/home/js/responsiveslides.min.js')) }}
   {{ Html::script(asset('layouts/home/js/slideBar.js')) }}

   <div  id="top" class="callbacks_container">
      <ul class="rslides" id="slider3">
         <li>
            <div class="banner-bg">
               <div class="container">
                  <div class="banner-info">
                     <h3>Take the first step<span>to knowledge friends</span></h3>
                     <p>Inspired by Brasil’s bold colors and matching up to football’s on-pitch
                        playmakers, these kicks are ready to stand out.
                     </p>
                  </div>
               </div>
            </div>
         </li>
         <li>
            <div class="banner-bg banner-img2">
               <div class="container">
                  <div class="banner-info">
                     <h3>Stay in touch<span>Lorem Ipsum</span></h3>
                     <p>Inspired by bold colors and matching up to football’s on-pitch
                        playmakers, these kicks are ready to stand out.
                     </p>
                  </div>
               </div>
            </div>
         </li>
      </ul>
   </div>
</div>
<div class="grid_1">
   <div class="container">
      <div class="col-md-4">
         <div class="news">
            <h1>@lang('messages.lb_vocabularyToday')</h1>
            <div class="section-content">
               <table class="table table-bordered">
                  <tbody>
                     <td>
                        <div class="dropdown">
                           <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chicken</button>
                           <ul class="dropdown-menu">
                              <li>
                                 <table class="table">
                                    <tbody>
                                       <div class="wordToday">
                                          Con gà
                                       </div>
                                       <div class="img-word">
                                          <img src="layouts/home/images/1.jpg" alt="">
                                       </div>
                                    </tbody>
                                 </table>
                              </li>
                           </ul>
                        </div>
                     </td>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-8 grid_1_right">
         <h2>@lang('messages.lb_topicToday')</h2>
         <div class="but_list">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
               <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
                  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Animal</a></li>
                  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Plants</a></li>
                  <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">City</a></li>
               </ul>
               <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                     <div class="events_box">
                        <div class="event_left">
                           <div class="event_left-item">
                              <img src="layouts/home/images/1.jpg" width="155px" height="125px" alt="">
                           </div>
                        </div>
                        <div class="event_right">
                           <h3><a href="#">Welcoming and introduction</a></h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form </p>
                           <a href="#">
                              <div class="btn-readmore">
                                 &nbsp;@lang('messages.btn_readmore')
                              </div>
                           </a>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                     <div class="events_box">
                        <div class="event_left">
                           <div class="event_left-item">
                              <img src="layouts/home/images/1.jpg" width="155px" height="125px" alt="">
                           </div>
                        </div>
                        <div class="event_right">
                           <h3><a href="#">Welcoming and introduction</a></h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form </p>
                           <a href="#">
                              <div class="btn-readmore">
                                 &nbsp;@lang('messages.btn_readmore')
                              </div>
                           </a>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
                     <div class="events_box">
                        <div class="event_left">
                           <div class="event_left-item">
                              <img src="layouts/home/images/1.jpg" width="155px" height="125px" alt="">
                           </div>
                        </div>
                        <div class="event_right">
                           <h3><a href="#">Welcoming and introduction</a></h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form </p>
                           <a href="#">
                              <div class="btn-readmore">
                                 &nbsp;@lang('messages.btn_readmore')
                              </div>
                           </a>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"> </div>
   </div>
   <div class="container">
      <div class="Topic_top">
         <h1>@lang('messages.lb_topic')</h1>
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc1.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc2.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="clearfix"> </div>
      </div>
      <div class="Topic_top">
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc3.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc4.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc5.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="clearfix"> </div>
      </div>
      <div class="Topic_bottom">
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc6.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc7.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="col-md-4 Topic_grid">
            <figure class="team_member">
               <img src="layouts/home/images/fc8.jpg" class="img-responsive wp-post-image" alt=""/>
               <div></div>
               <figcaption>
                  <h3 class="person-title"><a href="event_single.html">Readable Content </a></h3>
                  <span class="person-deg">Pg, Degree</span>
                  <p><a href="mailto@example.com">info(at)Learn.com</a></p>
                  <p>4 Years</p>
                  <div class="person-social">
                     <ul class="social-person">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </figcaption>
            </figure>
         </div>
         <div class="clearfix"> </div>
      </div>
      <ul class="pagination">
         <li class="active"><a href="#">1</a></li>
         <li><a href="#">2</a></li>
      </ul>
   </div>
</div>
@endsection

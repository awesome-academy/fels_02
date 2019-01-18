@extends('layouts.home.master')
@section('title')
    @lang('messages.index_title')
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
                  @foreach($displayWordToday as $key => $word)
                     <tbody>
                        <td>
                           <div class="dropdown">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $word->word_name }}</button>
                              <ul class="dropdown-menu words">
                                 <li>
                                    <table class="table">
                                       <tbody>
                                          <div class="wordToday">
                                             <h2>{{ $word->word_name }}</h2>
                                             <span>{{ $word->spelling }}</span>
                                             <img src="/layouts/home/images/speaker.png" alt="spelling" class="img-speaker" onclick="document.getElementById('myTune{{ $word->word_id }}').play()">
                                             <p>{{ $word->translate }}</p>
                                          </div>
                                          <div class="img-word">
                                             <img src="images/words/{{ $word->picture }}" alt="">
                                          </div>
                                          <audio id="myTune{{ $word->word_id }}">
                                             <source src="audio/{{ $word->sound }}">
                                          </audio>
                                       </tbody>
                                    </table>
                                 </li>
                              </ul>
                           </div>
                        </td>
                     </tbody>
                  @endforeach
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-8 grid_1_right">
         <h2>@lang('messages.lb_topicToday')</h2>
         <div class="but_list">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
               <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
                  @foreach($displayTopicToday as $key => $topicToday)
                     <li role="presentation"><a id="btn-topic-today" href="#topic-today-{{ $topicToday->topic_id }}" role="tab" data-toggle="tab">{{ $topicToday->topic_name }}</a></li>
                  @endforeach
               </ul>
               <div id="myTabContent" class="tab-content">
                  @foreach($displayTopicToday as $key => $topicToday)
                     <div role="tabpanel" class="tab-pane fade" id="topic-today-{{ $topicToday->topic_id }}">
                        @foreach($lessonsForToday as $key => $lesson)
                           @if($lesson->topic_id == $topicToday->topic_id)
                              <div class="events_box">
                                 <div class="event_left">
                                    <div class="event_left-item">
                                       <img src="images/lessons/{{ $lesson->picture }}" alt="">
                                    </div>
                                 </div>
                                 <div class="event_right">
                                    <h3><a href="#">{{ $lesson->lesson_name }}</a></h3>
                                    <p>{{ $lesson->preview }}</p>
                                    <a href="{{ route('lessondetail.show', $lesson->lesson_id) }}">
                                       <div class="btn-readmore">
                                          &nbsp;@lang('messages.btn_readmore')
                                       </div>
                                    </a>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           @endif
                        @endforeach
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"> </div>
   </div>
   <div class="container">
      <div class="Topic_top">
         <h1>@lang('messages.lb_topic')</h1>
         @foreach($displayTopics as $key => $topic)
            <div class="col-md-4 Topic_grid">
               <figure class="team_member">
                  <img src="images/topics/{{ $topic->picture }}" class="img-responsive wp-post-image" alt=""/>
                  <div></div>
                  <figcaption>
                     <h3 class="person-title"><a href="{{ route('lesson.show', $topic->topic_id) }}">{{ $topic->topic_name }}</a></h3>
                     <span class="person-deg">{{ $topic->preview }}</span>
                     <p><a href="">0/20</a></p>
                     <div class="person-social">
                        <ul class="social-person">
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                     </div>
                  </figcaption>
               </figure>
            </div>
         @endforeach
         <div class="clearfix"> </div>
      </div>
      <div class="btn_readmore_topic">
         <a href="{{ route('topic.index') }}">
            <div class="btn-readmore">
               &nbsp;@lang('messages.btn_readmore')
            </div>
         </a>
      </div>
   </div>
</div>
@endsection

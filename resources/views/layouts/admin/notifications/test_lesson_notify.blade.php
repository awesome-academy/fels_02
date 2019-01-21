<div class="notifi__item {{ $notification->read_at == null ? "unread" : "" }}">
    <div class="bg-c1 img-cir img-40">
        <i class="fas fa-clipboard-check"></i>
    </div>
    <div class="content">
        <a href="javascript:void(0)" id="showmodal"
           data-username="{{$notification->data['user']['username']}}"
           data-fullname="{{$notification->data['user']['fullname']}}"
           data-examname = "{{$notification->data['exam']['exam_name']}}"
           data-dayend="{{date("H:i:s d-m-Y", strtotime($notification->data['exam']['created_at']))}}"
           data-sumanswer="{{$notification->data['exam']['sum_correct_answer']}}"
           data-status="{{$notification->data['exam']['status']}}">
            <p>{{$notification->data['user']['username']}} @lang('adminMess.finish_test_message')</p>
        </a>
    </div>
</div>

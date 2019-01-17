<a href="{{ route('lesson.show', $notification->data['topic']['topic_id']) }}">
    <div class="content">
        <p>
            <font color="red">{{$notification->data['creater']['username']}}</font> @lang('adminMess.create_topic')
        </p>
        <span class="date">{{ $notification->created_at }}</span>
    </div>
</a>

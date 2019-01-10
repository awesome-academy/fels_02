@if(array_key_exists($word_id, $wordRemember))
    <span id="word{{$word_id}}" onclick="return ajaxToggleWordRemember({{$word_id}})">
        <i class="fa fa-minus"></i>
    </span>
@else
    <span id="word{{$word_id}}" onclick="return ajaxToggleWordRemember({{$word_id}})">
        <i class="fa fa-plus"></i>
    </span>
@endif

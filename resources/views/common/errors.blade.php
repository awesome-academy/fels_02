@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('messagelogin'))
    <script> alert('{{ Session::get('messagelogin')}}')</script>
@endif
@if (Session::has('update'))
    <script> alert('{{ Session::get('update')}}')</script>
@endif
@if (Session::has('messagecreate'))
    <script> alert('{{ Session::get('messagecreate')}}')</script>
@endif

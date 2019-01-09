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
@if (Session::has('messagecreate'))
    <script> alert('{{ Session::get('messagecreate')}}')</script>
@endif
@if (Session::has('msgTestSuccess'))
    <script> alert('{{ Session::get('msgTestSuccess')}}')</script>
@endif
@if (Session::has('msgTestFail'))
    <script> alert('{{ Session::get('msgTestFail')}}')</script>
@endif
    
@if (Session::has('msg'))
    <script> alert('{{ Session::get('msg')}}')</script>
@endif

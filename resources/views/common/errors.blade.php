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
@if (Session::has('adminmessage'))
    <script> alert('{{ Session::get('adminmessage')}}')</script>
@endif
@if(Session::has('messageD'))
    <div class="alert alert-danger alert-dismissible fade show col col-8 tuychinh" role="alert">
        <strong>{{ Session::get('messageD') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
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

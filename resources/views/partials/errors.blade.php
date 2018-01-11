@if(count($errors) > 0)
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach($errors as $error)
            <li><strong>{!! $error !!}</strong></li>
        @endforeach
    </div>
@endif

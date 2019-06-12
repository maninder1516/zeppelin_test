<!-- Message-section -->

@if(session()->has('message.level') =='success')
<div class="alert alert-{{ session('message.level') }}">
    {!! session('message.content') !!}
</div>
@else
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endif
<!-- /.Message-section -->
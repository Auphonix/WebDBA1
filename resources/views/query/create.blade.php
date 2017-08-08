@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Query</h2>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {!! Form::model($user, ['action' => 'QueryController@store']) !!}

    <div class="form-group">
        {!! Form::label('firstName', 'First Name') !!}
        {!! Form::text('firstName', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lastName', 'Last Name') !!}
        {!! Form::text('lastName', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('isAdmin', 'Are you an administrator?') !!}
        {!! Form::checkbox('isAdmin', 'value', false); !!}
    </div>

    <button class="btn btn-success" type="submit">Submit Query</button>

    {!! Form::close() !!}
@endsection
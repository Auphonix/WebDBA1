@extends('master')
@section('title', 'Submit a query')
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
        {!! Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'John']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lastName', 'Last Name') !!}
        {!! Form::text('lastName', null, ['class' => 'form-control', 'placeholder' => 'Doe']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 's1234567@student.rmit.edu.au']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('operatingSystem', 'Operating System') !!}
        {!! Form::text('operatingSystem', null, ['class' => 'form-control', 'placeholder' => 'Windows 10']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('issue', 'Issue') !!}
        {!! Form::textarea('issue', null, ['class' => 'form-control','placeholder' => 'Describe your issue here'
        ,'maxlength' =>2000, 'rows' => 5, 'style' => 'resize:none']) !!}
    </div>

    <button class="btn btn-success" type="submit">Submit Query</button>

    {!! Form::close() !!}
@endsection
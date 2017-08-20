@extends('master')
@section('content')
    <head><title>Index</title></head>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Tickets</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ticket.create') }}"> Create New Ticket</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $ticket->userEmail}}</td>
                <td>{{ $ticket->issue}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('ticket.show', $ticket->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('ticket.edit', $ticket->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['ticket.destroy', $ticket->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Close', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $tickets->render() !!}
@endsection
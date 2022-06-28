@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            All Contact
        </div>
          <form type="get" action="{{ route('search') }}" class="col-9">
            <div class="form-group">
              <input type="search" name="search" id="" class="form-control" placeholder="Search by Name or Email or Phone"/>
            </div>
            <button class="btn btn-success">Search</button>
            <a href="{{ route('contact') }}">
               <button class="btn btn-success" type="button">Reset</button>
            </a>
        </form>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{!! $item->message !!}</td>
                            <td>
                                <a href="{{ route('delete_contact',[$item->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
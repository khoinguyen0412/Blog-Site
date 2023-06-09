@extends(layouts.app)

@section('content')
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role_ID</th>
            </tr>
            <tbody>
        </thead>
            @foreach($users as $key => $user)
            <tr>
                <th scope="row">{{$key+1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email_address}}</td>
            <td>{{$user->role_id == 1 ? 'Admin' :'User'}}</td>
            
            </tr>
            @endforeach
            </tbody>
        </table>
    
@endsection
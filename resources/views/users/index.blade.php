@extends('layouts.app')

@section('title', 'Panel | users')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if ($role == 'write' || $role == 'all')
            <div class="Plus py-3">
                <a class="btn btn-primary text-capitalize" href="{{route('users.add')}}" role="button"><i class="fa-solid fa-user-plus"></i> add new user</a>
            </div>
            @endif
        @if (count($users) <= 1)
            <div class="bg-primary text-center p-5 text-white text-capitalize alert">
                soory, there are No data for view!
            </div>
            
            @else
            <table class="table table-striped table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        @if ($role == 'edit' || $role == 'all' ||$role == 'delete')
                        <th>Handel</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                        @if(($user->type != 'superadmin'))
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if ($role == 'edit' || $role == 'all')
                                <a class="btn btn-info" href="{{route('users.edit',$user->id)}}" role="button"><i class="fa-solid fa-file-pen"></i></a>
                                @endif
                                @if ($role == 'all' ||$role == 'delete')
                                <a class="btn btn-danger" href="{{route('users.delete',$user->id)}}" role="button"><i class="fa-solid fa-trash-can"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total users: <strong>{{count($users)-1}}</strong></td>
                            <td>{{$users->render()}}</td>
                        </tr>
                    </tfoot>
            </table>
            
        @endif

        </div>
    </section>

@endsection
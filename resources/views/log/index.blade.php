@extends('layouts.app')

@section('title', 'Panel | log')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Log</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            
        @if (count($logs) == 0)
            <div class="bg-primary text-center p-5 text-white text-capitalize alert">
                soory, there are No data for view!
            </div>
            
            @else
            <table class="table table-striped table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Properties</th>
                        <th>Date & Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$log->name}}</td>
                            <td>
                               {{$log->description}}
                            </td>
                            <td>{{$log->properties}}</td>
                            <td>{{$log->created_at}}</td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Total users: <strong>{{count($logs)}}</strong></td>
                            <td>{{$logs->render()}}</td>
                        </tr>
                    </tfoot>
            </table>
            
        @endif

        </div>
    </section>

@endsection
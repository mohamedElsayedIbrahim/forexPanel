@extends('layouts.app')

@section('title', 'Panel | depoisters')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Depoisters</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            
        @if (count($depoisters) <= 1)
            <div class="bg-primary text-center p-5 text-white text-capitalize alert">
                soory, there are No data for view!
            </div>
            
            @else
            <table class="table table-striped table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Subjects</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($depoisters as $depoister)

                       
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$depoister->fullName}}</td>
                            <td>{{$depoister->account}}</td>
                            <td>{{$depoister->phone}}</td>
                            <td>{{$depoister->amount}}</td>
                            <td>{{$depoister->type}}</td>
                        </tr>
                        
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total users: <strong>{{count($depoisters)}}</strong></td>
                            <td>{{$depoisters->render()}}</td>
                        </tr>
                    </tfoot>
            </table>
            
        @endif

        </div>
    </section>

@endsection
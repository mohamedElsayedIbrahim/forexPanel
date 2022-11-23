@extends('layouts.app')

@section('title', 'Panel | sliders')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sliders</li>
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

            @if ($role=='write' || $role == 'all')
            <div class="Plus py-3">
                <a class="btn btn-primary text-capitalize" href="{{route('sliders.add')}}" role="button"><i class="fa-solid fa-book"></i> add new sliders</a>
            </div>
            @endif
            
        @if (count($sliders) == 0)
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
                        @foreach ($sliders as $slider)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$slider->btn_value}}</td>
                            <td>
                                @if ($role == 'edit' || $role == 'all')
                                <a class="btn btn-info" href="{{route('sliders.edit',$slider->id)}}" role="button"><i class="fa-solid fa-file-pen"></i></a>
                                @endif
                                @if ($role == 'delete' || $role == 'all')
                                <a class="btn btn-danger" href="{{route('sliders.delete',$slider->id)}}" role="button"><i class="fa-solid fa-trash-can"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total sliders: <strong>{{count($sliders)}}</strong></td>
                            <td>{{$sliders->render()}}</td>
                        </tr>
                    </tfoot>
            </table>
            
        @endif

        </div>
    </section>

@endsection
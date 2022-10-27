@extends('layouts.app')

@section('title', 'Panel | permissions')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">permissions</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit permission</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Edit System permissions</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')
                <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('permissions.update',$permission->id)}}">
                  
                  @csrf

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Specialize Name</label>
                      <input type="text" name="name" value="{{$permission->nameScreen ?? old('name')}}" maxlength="100" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a permissions.
                      </div>
                  </div>

                  
                 
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                  </div>
                </form> 
            </div>
        </div>
    </section>

@endsection
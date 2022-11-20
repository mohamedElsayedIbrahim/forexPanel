@extends('layouts.app')

@section('title', 'Panel | brokers')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('broker.index')}}">Brokers</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Add System broker</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')
                <form enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="POST" action="{{route('broker.store')}}">
                  
                  @csrf

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Broker Name</label>
                      <input type="text" name="title" maxlength="100" class="form-control" value="{{old('title')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a artical title.
                      </div>
                  </div>
                 
                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Broker Logo</label>
                      <input type="file" name="logo" accept=".jpg,.png,.webp" class="form-control" value="{{old('poster')}}" id="validationCustomUsername" aria-label="file example" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a artical poster image.
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

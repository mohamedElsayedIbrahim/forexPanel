@extends('layouts.app')

@section('title', 'Panel | users')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Add System User</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')

                <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('users.store')}}">
                  
                  @csrf

                  <div class="col-md-12">
                    <label for="exampleFormControlTextarea1" class="form-label">About Page Contnet</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    
                      <input type="text" name="name" maxlength="100" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a username.
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

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'desc' );</script>
@endsection
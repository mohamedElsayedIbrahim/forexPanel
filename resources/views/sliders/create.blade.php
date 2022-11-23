@extends('layouts.app')

@section('title', 'Panel | sliders')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('broker.index')}}">Sliders</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Add System slider</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')
                <form enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="POST" action="{{route('sliders.store')}}">
                  
                  @csrf

                                 
                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">slider image</label>
                      <input type="file" name="logo" accept=".jpg,.png,.webp" class="form-control" value="{{old('poster')}}" id="validationCustomUsername" aria-label="file example" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a artical poster image.
                      </div>
                  </div>

                  <div class="col-md-12">
                    <label for="exampleFormControlTextarea1" class="form-label fw-bold">slider Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" maxlength="200" rows="5" name="content" required>{{old('content')}}</textarea>
                    <div class="invalid-feedback">
                        Please choose a description.
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">slider button text</label>
                      <input type="text" name="btn" maxlength="50" class="form-control" value="{{old('btn')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a butten text.
                      </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">slider button Url</label>
                      <input type="url" name="url" maxlength="250" class="form-control" value="{{old('url')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a artical title.
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


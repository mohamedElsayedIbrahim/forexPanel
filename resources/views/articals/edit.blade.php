@extends('layouts.app')

@section('title', 'Panel | articals')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('articals.index')}}">articals</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit permission</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Edit System articals</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')
                <form enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="POST" action="{{route('articals.update',$artical->id)}}">
                  
                  @csrf

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Artical title</label>
                      <input type="text" name="title" maxlength="100" class="form-control" value="{{$artical->title ?? old('title')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a artical title.
                      </div>
                  </div>
                 
                  <div class="col-md-12">
                    <label for="exampleFormControlTextarea1" class="form-label fw-bold">Artical Page Contnet</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content" required>{{ $artical->conent ?? old('content')}}</textarea>
                    <div class="invalid-feedback">
                        Please choose a artical content.
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Artical Poster</label>
                      <input type="file" name="poster" accept=".jpg,.png,.webp" class="form-control" value="{{old('poster')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend">
                      <div class="invalid-feedback">
                        Please choose a artical title.
                      </div>
                  </div>

                  <h4 class="text-danger">SEO settings</h4>

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Meta keywords</label>
                      <input type="text" name="keywords" maxlength="200" class="form-control" value="{{$artical->keywords ?? old('keywords')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" >
                      <div class="invalid-feedback">
                        Please choose a artical title.
                      </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Meta description</label>
                      <input type="text" name="desc" maxlength="150" class="form-control" value="{{$artical->description ?? old('desc')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend">
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


@section('scripts')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'content' );</script>
@endsection
@extends('layouts.app')

@section('title', 'Panel | adverticers')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('adverticers.index')}}">Adverticers</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit permission</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Edit System adverticers</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')
                <form enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="POST" action="{{route('adverticers.update',$adverticer->id)}}">
                  
                  @csrf

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">adverticers posation</label>
                    <select class="form-select" name="posation" aria-label="Default select example" required>
                      <option value="">Open this select menu</option>
                      @if ($adverticer->posation == 'landscape')
                      <option selected value="landscape">Landscape</option>
                      <option value="side">Side</option>
                      @else
                      <option value="landscape">Landscape</option>
                      <option selected value="side">Side</option>
                      @endif
                      
                    </select>
                      <div class="invalid-feedback">
                        Please choose a adverticers posation.
                      </div>
                  </div>
                 

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">adverticers logo</label>
                      <input type="file" name="poster" accept=".jpg,.png,.webp" class="form-control" value="{{old('poster')}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend">
                      <div class="invalid-feedback">
                        Please choose a adverticers title.
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
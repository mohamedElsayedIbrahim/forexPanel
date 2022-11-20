@extends('layouts.app')

@section('title', 'Panel | adverticers')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('adverticers.index')}}">Brokers</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Add System adverticers</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')
                <form enctype="multipart/form-data" class="row g-3 needs-validation" novalidate method="POST" action="{{route('adverticers.store')}}">
                  
                  @csrf

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">adverticers posation</label>
                    <select class="form-select" name="posation" aria-label="Default select example" required>
                      <option selected>Open this select menu</option>
                      <option value="landscape">Landscape</option>
                      <option value="side">Side</option>
                    </select>
                      <div class="invalid-feedback">
                        Please choose a adverticers posation.
                      </div>
                  </div>
                 
                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Broker Logo</label>
                      <input type="file" name="poster" accept=".jpg,.png,.webp" class="form-control" value="{{old('poster')}}" id="validationCustomUsername" aria-label="file example" aria-describedby="inputGroupPrepend" required>
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

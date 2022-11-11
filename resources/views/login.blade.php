@extends('layouts.app')

@section('title', 'Panel | login')

@section('content')
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="head">
                        <h2>System Login</h2>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
                    </div>
                    <div class="bady">
                      @include('layouts.includes.errors')
                        <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('system.login')}}">
                          
                          @csrf

                          <div class="col-md-12">
                            <label for="validationCustomUsername" class="form-label">username</label>
                              <input type="text" name="name" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                              <div class="invalid-feedback">
                                Please choose a username.
                              </div>
                          </div>
                          
                          <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" minlength="6" id="validationCustom03" required>
                            <div class="invalid-feedback">
                              Please provide a valid paswword.
                            </div>
                          </div>
                         
                          <div class="col-12">
                            <button class="btn btn-primary" type="submit">login</button>
                          </div>
                        </form> 
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="head text-center">
                        <img src="{{asset('assets/images/logo.png')}}" class="img-fluid" width="300px" alt="Clinical Managment system">
                    </div>
                    <div class="body">
                        <h1 class="text-primary text-uppercase">OLXForx dashboard</h1>
                        <p class="lead">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt dolorum delectus assumenda saepe soluta, nostrum reprehenderit sapiente, aut natus rem illum molestias, odio repellendus nihil. Aspernatur ratione optio quisquam ad?   
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection
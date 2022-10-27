@extends('layouts.app')

@section('title', 'Panel | users')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
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
                    <label for="validationCustomUsername" class="form-label">username</label>
                      <input type="text" name="name" maxlength="100" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a username.
                      </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustomEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" maxlength="100" id="validationCustomEmail" aria-describedby="inputGroupPrepend">
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Password</label>
                    <input type="password" name="password" maxlength="50" class="form-control" minlength="6" id="validationCustom03" required>
                    <div class="invalid-feedback">
                      Please provide a valid paswword.
                    </div>
                  </div>

                  <div class="col-12">
                    <div>
                      <button id="serviceButton"  type="button" class="btn btn-secondary">Add permission</button>
                    </div>

                    <table class="table table-striped table-responsive">
                      <thead class="thead-inverse">
                          <tr>
                              <th>Permission</th>
                              <th>Access level</th>
                              <th>Handel</th>
                          </tr>
                          </thead>
                          <tbody id="tbody">
                              
                              <tr>
                                <td>
                                  <select class="form-select" name="permissions[]" aria-label="Default select example">
                                    <option selected>Open this permission menu</option>
                                    @foreach ($permissions as $item)
                                        <option value="{{$item->id}}">{{$item->nameScreen}}</option>
                                    @endforeach
                                  </select>
                                </td>
                                <td>
                                  <select class="form-select" name="roles[]" aria-label="Default select example">
                                    <option selected>Open this role menu</option>
                                    <option value="all" class="text-capitalize">all</option>
                                    <option value="write" class="text-capitalize">write</option>
                                    <option value="read" class="text-capitalize">read</option>
                                    <option value="edit" class="text-capitalize">edit</option>
                                    <option value="delete" class="text-capitalize">delete</option>
                                  </select>   
                                </td>
                              </tr>
                          </tbody>
                  </table>
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                  </div>
                </form> 
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/user.js') }}"></script>
@endsection
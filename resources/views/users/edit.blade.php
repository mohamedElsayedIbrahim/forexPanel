@extends('layouts.app')

@section('title', 'Panel | users')



@section('bread')
<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('panel')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit user</li>
    </ol>
  </nav>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    
    <section class="content py-5">
        <div class="container">
            <div class="head">
                <h2>Edit System User</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi optio temporibus error reprehenderit assumenda velit cupiditate accusamus sapiente saepe consectetur iusto quidem!</p>
            </div>
            <div class="bady">
              @include('layouts.includes.errors')

             
                <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('users.update',$user->id)}}">
                  
                  @csrf

                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">username</label>
                      <input type="text" name="name" value="{{$user->name ?? old('name')}}" maxlength="100" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a username.
                      </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustomEmail" class="form-label">Email</label>
                      <input type="email" name="email" value="{{$user->email ?? old('email')}}" class="form-control" maxlength="100" id="validationCustomEmail" aria-describedby="inputGroupPrepend">
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Password</label>
                    <input type="password" name="password" maxlength="50" class="form-control" minlength="6" id="validationCustom03">
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
                              
                            @foreach ($userPermission as $role)
                            <tr>
                              <td>
                                <select class="form-select" required name="permissions[]" aria-label="Default select example">
                                  @foreach ($permissions as $item)
                                    @if($role->permission_id == $item->id)
                                      <option selected value="{{$item->id}}">{{$item->nameScreen}}</option>                                         
                                      @else
                                      <option value="{{$item->id}}">{{$item->nameScreen}}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </td>
                              <td>
                                <select class="form-select" required name="roles[]" aria-label="Default select example">
                                  @foreach ($roles as $item)
                                    @if($role->type == $item)
                                    <option selected value="{{$item}}" class="text-capitalize">{{$item}}</option>                                         
                                      @else
                                      <option value="{{$item}}" class="text-capitalize">{{$item}}</option>                                         
                                    @endif
                                  @endforeach
                                </select>   
                              </td>
                              @if($loop->iteration>1)
                              <td>
                                <button class="btn btn-danger" type="button" onclick="deleteRow(this);">Remove</button>
                              </td>
                              @endif
                            </tr>
                            @endforeach

                              
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
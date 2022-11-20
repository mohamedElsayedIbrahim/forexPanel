@extends('layouts.app')

@section('title', 'Panel')

@section('bread')
    <div class="text-center py-5">
        <h1>Application Panel</h1>
        <p class="lead">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, nulla consequuntur autem in officiis veritatis quis earum, velit dignissimos eligendi voluptate labore. Quisquam fuga, maiores nobis officiis magni veritatis blanditiis?
        </p>
        <h4 class="lead text-danger pt-5">let's Do it!</h4>
    </div>
@endsection

@section('content')
    @include('layouts.includes.pageHead')
    <section class="content p-5">
        <div class="container">
          @if ($usertype != 'superadmin')
          <h2 class="text-danger">System Functions</h2>
            <div class="row">
      
               
      @foreach ($userPermission as $item)
              
          @if ($item->nameScreen == 'about')
                <div class="col-md-3 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('about')}}" class="card-link">Site About</a></h5>
                          <h6 class="card-subtitle mb-2 text-muted">Site about</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="{{route('about')}}" class="card-link">use service</a>
                        </div>
                      </div>
                </div>
          @endif

          @if ($item->nameScreen == 'Contacts')
                <div class="col-md-3 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('contacts.index')}}" class="card-link">Site Contacts</a></h5>
                          <h6 class="card-subtitle mb-2 text-muted">Site contacts</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="{{route('contacts.index')}}" class="card-link">use service</a>
                        </div>
                      </div>
                </div>
          @endif

          @if ($item->nameScreen == 'articals')
                <div class="col-md-3 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('articals.index')}}" class="card-link">Site articals</a></h5>
                          <h6 class="card-subtitle mb-2 text-muted">Site articals</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="{{route('articals.index')}}" class="card-link">use service</a>
                        </div>
                      </div>
                </div>
          @endif

          @if ($item->nameScreen == 'depoister')
                <div class="col-md-3 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('depoisters.index')}}" class="card-link">Site Depoisters</a></h5>
                          <h6 class="card-subtitle mb-2 text-muted">Site Depoister</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="{{route('depoisters.index')}}" class="card-link">use service</a>
                        </div>
                      </div>
                </div>
          @endif

          @if ($item->nameScreen == 'borker')
          <div class="col-md-3 my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('broker.index')}}" class="card-link">Site Brokers</a></h5>
                  <h6 class="card-subtitle mb-2 text-muted">Site Borkers</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route('broker.index')}}" class="card-link">use service</a>
                </div>
            </div>
          </div>
          @endif
          
              @endforeach
            </div>
            <h2 class="text-danger">System Reports</h2>
            
            <div class="row">

              @foreach ($userPermission as $item)

              
              @endforeach

            </div>

            <h2 class="text-danger">System Security</h2>
            
            <div class="row">
              @foreach ($userPermission as $item)
              @if ($item->nameScreen == 'users')

              <div class="col-md-3 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('users.index')}}" class="card-link">Users</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Managemment users</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="{{route('users.index')}}" class="card-link">use service</a>
                    </div>
                  </div>
              </div>
              @endif
              
              @if ($item->nameScreen == 'log')

              <div class="col-md-3 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('log')}}" class="card-link">System Log</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">System log</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="{{route('log')}}" class="card-link">use service</a>
                    </div>
                  </div>
              </div>

              @endif
              @endforeach
            </div>

        </div>

        @else


        <div class="container">
          
          <h2 class="text-danger">System Functions</h2>
            <div class="row">

              <div class="col-md-3 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('depoisters.index')}}" class="card-link">Site Depoisters</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Site Depoister</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="{{route('depoisters.index')}}" class="card-link">use service</a>
                    </div>
                  </div>
            </div>

            <div class="col-md-3 my-2">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title"><a href="{{route('contacts.index')}}" class="card-link">Site Contacts</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Site contacts</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{route('contacts.index')}}" class="card-link">use service</a>
                  </div>
              </div>
            </div>

            <div class="col-md-3 my-2">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title"><a href="{{route('broker.index')}}" class="card-link">Site Brokers</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Site Borkers</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{route('broker.index')}}" class="card-link">use service</a>
                  </div>
              </div>
            </div>


            <div class="col-md-3 my-2">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title"><a href="{{route('articals.index')}}" class="card-link">Site Articals</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Site contacts</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{route('articals.index')}}" class="card-link">use service</a>
                  </div>
              </div>
            </div>


              <div class="col-md-3 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('about')}}" class="card-link">Site About</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Site about managment</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="{{route('about')}}" class="card-link">use service</a>
                    </div>
                  </div>
              </div>
     
               
              
            </div>
            <h2 class="text-danger">System Reports</h2>
            
            <div class="row">

           
              

             
            </div>

            <h2 class="text-danger">System Security</h2>
            
            <div class="row">
             

              <div class="col-md-3 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('users.index')}}" class="card-link">Users</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Managemment users</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="{{route('users.index')}}" class="card-link">use service</a>
                    </div>
                  </div>
              </div>
          
              <div class="col-md-3 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('permissions.index')}}" class="card-link">Permission</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Permission</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="{{route('permissions.index')}}" class="card-link">use service</a>
                    </div>
                  </div>
              </div>
            
             

              <div class="col-md-3 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('log')}}" class="card-link">System Log</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">System log</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="{{route('log')}}" class="card-link">use service</a>
                    </div>
                  </div>
              </div>

            </div>

        </div>

        @endif

    </section>
@endsection
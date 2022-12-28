<x-layout>
    <x-slot name="content">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-7 col-lg-8">
            <h3 class="page-header"> Contact Page</h3> 
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
            @if(session('success'))
                <h1>{{session('success') }}</h1>
            @endif
            @if(session('failed'))
            <h1>{{session('failed') }}</h1>
        @endif
            <form method="POST" action="{{ route('contact.send.mail') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @else is-valid @enderror" id="email" placeholder="name@example.com" name="email">
              </div>
          
              <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname" placeholder="Firstname Lastname" name="fullname">
                @error('fullname')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
              </div>
          
          
          
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="3" name="message"></textarea>
                @error('message')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
              <br/>
              <div class="form-group ">
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary">Send Email</button>
                </div>
              </div>
            </form>
           
          </div>
        </div>
      </div>
  
    </x-slot>
  </x-layout>






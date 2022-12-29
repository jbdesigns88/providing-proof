<x-layout>
    <x-slot name="content">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-7 col-lg-8">
            <h1>Create Event</h1>
            @if(session('success'))
                <h3>{{session('success') }}</h3>
            @endif
        @if(session('failed'))
            <h3>{{session('failed') }}</h3>
        @endif
            <form method="POST" action="{{ route('events.store') }}">
                <x-honeypot />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="datetime">Start</label>
                    <input type="datetime-local" name="start" id="start" class="form-control @error('start') is-invalid @enderror" value="{{ old('start') }}" required>
                    @error('start')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="datetime">End</label>
                    <input type="datetime-local" name="end" id="end" class="form-control @error('end') is-invalid @enderror" value="{{ old('end') }}" required>
                    @error('end')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br/>
                <div class="form-group ">
                    <div class="col-sm-4">
                        <button type="submit">Create Event</button>
                    </div>
                </div>
            </form>
            
       
          </div>
        </div>
      </div>
  
    </x-slot>
  </x-layout>
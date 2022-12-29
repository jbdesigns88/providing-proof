<x-layout>
    <x-slot name="content">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-7 col-lg-8">
            <h3 class="page-header"> {{ $event->name }}</h3> 
            <p class="text-muted">{{ $event->start }} - {{ $event->end }}</p>
            <p>{{ $event->description }}</p>

       
          </div>
        </div>
      </div>
  
    </x-slot>
  </x-layout>
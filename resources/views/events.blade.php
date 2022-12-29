<?php use Carbon\Carbon;
?>
<x-layout>
  <x-slot name="content">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-md-7 col-lg-8">
          <h3 class="page-header"> Events</h3> 
          @if(!$events)
           <h4> We are currently preparing for our next cohort of students. Please join our mailing list for the latest updates.</h4>
          @endif
          <br/>
          <ul id="events-holder" class="list-group mb-2">
          @foreach($events as $event)
            @if(Carbon::now() < $event->start )
            <a href="/events/{{$event->id}}">
            <li class="list-group-item">
              <h5 class="mb-3 event-name">Event: {{$event->name}}</h5>
              <p style="font-size:1.3em ">Description: {{$event->description}}</p>
              <div class="d-flex justify-content-between date-information">

                <div><p class="ml-auto text-muted">Dates: <span>{{ Carbon::parse( $event->start)->format('M d, Y h:i A') }} - {{ Carbon::parse( $event->end)->format('M d, Y h:i A') }} </span></p></div>
       
                <div> <p class="ml-auto text-muted"> Event in {{Carbon::parse(Carbon::now())->diffInDays($event->start)}} days.</p></div>
                
            
              </div>

            </li>
            </a>
            @endif
            <!-- more list items -->
    
          

          @endforeach
        </ul>
        
        {{ $events->render('vendor.pagination') }}

        </div>
      </div>
    </div>

  </x-slot>
</x-layout>
<?php
       $data = [
           ['name'=> 'home','slug' => '/'],
           ['name'=> 'about','slug' => 'about'],
           ['name'=> 'events','slug' => 'events'],
           ['name'=> 'donate','slug' => 'donate'],
        ];


?>


<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
      <div class="container-fluid">
        <div class="container"> 
        <a class="navbar-brand" href="#">Providing Proof</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
   
                @foreach($data as $item)
                <li class="nav-item"><a href="{{$item['slug']}}" class="nav-link" aria-current="page">{{$item['name']}}</a></li>
              
              @endforeach
         
          </ul>
        </div>
        </div>
      </div>
    </nav>
  </header>

</div>

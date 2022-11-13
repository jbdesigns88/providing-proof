<?php
       $data = [
           ['name'=> 'home','slug' => 'home'],
           ['name'=> 'about','slug' => 'about'],
           ['name'=> 'events','slug' => 'events'],
           ['name'=> 'donate','slug' => 'donate'],
        ];


?>
  <div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3  border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Providing Proof</span>
      </a>

      <ul class="nav nav-pills">
  @foreach($data as $item)
  <li class="nav-item"><a href="{{$item['slug']}}" class="nav-link" aria-current="page">{{$item['name']}}</a></li>

        @endforeach
    </ul>
</header>
</div>

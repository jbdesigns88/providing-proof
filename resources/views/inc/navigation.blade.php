<?php $data = [
           ['name'=> 'home','slug' => '/'],
           ['name'=> 'our curriculum','slug' => 'our-curriculum'],
           ['name'=> 'events','slug' => 'events'],
           ['name'=> 'donate','slug' => 'donate'],
        ];
 ?>   
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
             
                          @foreach($data as $item)
                          <li class="nav-item"><a href="{{$item['slug']}}" class="nav-link" aria-current="page">{{$item['name']}}</a></li>
                        
                        @endforeach
                   
                    </ul>
<?php $data = [
           ['name'=> 'home','slug' => '/','isSpecial'=> false],
           ['name'=> 'our curriculum','slug' => 'our-curriculum','isSpecial'=> false],
           ['name'=> 'events','slug' => 'events','isSpecial'=> false],
           ['name'=> 'donate','slug' => 'donate','isSpecial'=> true],
        ];
 ?>   
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
             
                          @foreach($data as $item)
                            @if($item['isSpecial'])
                            <li class="nav-item"><a href="{{$item['slug']}}" class="nav-link specialize" aria-current="page">{{$item['name']}}</a></li>
                            @else
                            <li class="nav-item"><a href="{{$item['slug']}}" class="nav-link" aria-current="page">{{$item['name']}}</a></li>
                            @endif
                          
                        
                        @endforeach
                   
                    </ul>
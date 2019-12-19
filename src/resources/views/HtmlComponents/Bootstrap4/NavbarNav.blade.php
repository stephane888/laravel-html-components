@isset($items)
@php
	if(empty($nav_treeview)){ $nav_treeview='nav-treeview'; }
	if(!isset($level)){$level=0;}
@endphp
<ul class="navbar-nav {{ $navbarNav_class ?? '' }}" {!! $navbarNav_attrib ?? '' !!}>
	@foreach ($items as $item)
		@php
			$item = $DS->NavbarNav__item($item, $level);
		@endphp
    <li class="nav-item {{ $item['class'] }} ">
    	@isset($item['link'])<a class="nav-link {{ $item['active'] }}" href="{{$item['link']}}" {!! $item['attrib'] !!} > @endisset
    		@isset($item['icon_before']) {!! $item['icon_before'] !!} @endisset
    		@if($item['tag']) <{{$item['tag']}}>@endif
    			@isset($item['external']) @isset($item['html']) {!! $item['title'] !!} @else {{ $item['title'] }} @endisset @endisset
    		@if($item['tag']) </{{$item['tag']}}>@endif
    	@isset($item['link'])</a>@endisset
    	@isset($item['submenu'])
				@php $level=1 + $level; @endphp
    		@include( 'HtmlComponents::HtmlComponents.Bootstrap4.NavbarNav', ['items'=>$item['submenu'], 'navbarNav_class'=>$nav_treeview, 'navbarNav_attrib'=>'', 'level'=>$level] )
    	@endisset
    </li>
	@endforeach
</ul>
@endisset

{{--
il faudra  renvoyer un bon nombre d'element dans la classe
return [
            [
                'title'=>'Dashboard',
                'link'=>'#',
                'active'=>false,
                'class'=>'',
                'icon_before'=>'',
                'icon_after'=>'',
                'external'=>false,
                'tag'=>'p',
                'attrib'=>'data-widget="pushmenu"'
                'submenu'=>[
                    [
                        'title'=>'s v1',
                        'link'=>'#',
                        'active'=>false,
                        'class'=>'',
                        'icon_before'=>'',
                        'icon_after'=>'',
                        'external'=>false,
                        'tag'=>'p',
                    ],
                    [
                        'title'=>'s v2',
                        'link'=>'#',
                        'active'=>false,
                        'class'=>'',
                        'icon_before'=>'',
                        'icon_after'=>'',
                        'external'=>false,
                        'tag'=>'p',
                    ],
                ]
            ],
            [
                'title'=>'v1',
                'link'=>'#',
                'active'=>false,
                'class'=>'',
                'icon_before'=>'',
                'icon_after'=>'',
                'external'=>false,
                'tag'=>'p',
            ],
            [
                'title'=>'v2',
                'link'=>'#',
                'active'=>false,
                'class'=>'',
                'icon_before'=>'',
                'icon_after'=>'',
                'external'=>false,
                'tag'=>'p',
            ],
        ];
--}}
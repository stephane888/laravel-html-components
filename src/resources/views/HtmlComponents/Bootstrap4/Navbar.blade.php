@php
$id ="navbarText";
@endphp
<nav class="navbar {{ $navbar_class ?? 'navbar-expand-sm' }}">
	@if(isset($navbar_container) && $navbar_container)<div class="{{ $navbar_container }}">@endif
		@if($show_logo)
			<a class="navbar-brand" href="#"><img alt="Logo"
			src="{{ asset('LaravelComingSoon/images/wb-universe_logo_2.png') }}"></a>
		@endif
		@if($show_bugger)
    		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
    			data-target="#{{ $id_navbar ?? $id }}" aria-controls="navbarText"
    			aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
    		</button>
		@endif
		@if($show_collapse)
    		<div class="collapse navbar-collapse" id="{{ $id_navbar ?? $id }}">
    			@if(!empty($NavItems))
    			<ul class="navbar-nav mr-auto">
    
    			</ul>
    			@endif @if(!empty($header['NavbarText'])) <span class="navbar-text ml-sm-auto">
    				@if( is_array($header['NavbarText']) ) 
    						@foreach($header['NavbarText'] as $value) <span>{{$value['item']}}</span>@endforeach 								
    				@else {{$header['NavbarText']}} @endif
    			</span> @endif
    		</div>
    	@else
    		{{ $slot }}
		@endif
	@if(isset($navbar_container) && $navbar_container)</div>@endif
</nav>

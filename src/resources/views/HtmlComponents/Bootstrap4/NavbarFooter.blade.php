<nav class="navbar footer">
	<div class="container">
		<div class="collapse navbar-collapse show" >
			@if(!empty($NavItems))
			<ul class="navbar-nav mr-auto">

			</ul>
			@endif @if(!empty($footer['NavbarText'])) <span class="navbar-text">
				@if( is_array($footer['NavbarText']) ) 
						@foreach($footer['NavbarText'] as $value) <span>{{$value['item']}}</span>@endforeach 								
				@else {{$footer['NavbarText']}} @endif
			</span> @endif
		</div>
	</div>
</nav>
<!-- 
 1- cette class doit etre dans les  variables:
 navbar-light bg-success principal
 
 
 -->
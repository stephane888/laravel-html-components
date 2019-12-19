@php
	$classes  = (!empty($WisthBorder))? 'list-group-flush':'';
	$classes .= ' ';
	$classes .= (!empty($CustomClass))? $CustomClass:'';
@endphp
@isset($ListComplex)
<ul class="list-group {{ $classes }}">
  @foreach($ListComplex['datas'] as $List)
    @if(empty($ListComplex['url_base']))
    	<li class="list-group-item">{{ $List[$ListComplex['txt']] }} </li>
    @else
      <li class="list-group-item">
      	<a href="{{ $ListComplex['url_base'] }}/{{ $List[$ListComplex['url_patch']] }}">{{ $List[$ListComplex['txt']] }}</a>
      </li>
    @endif
  @endforeach
</ul>
@endisset
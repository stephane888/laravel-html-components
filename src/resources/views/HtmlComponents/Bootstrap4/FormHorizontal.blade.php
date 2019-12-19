@php
$identifiant = (isset($form_identifiant))? $form_identifiant : "formid";
@endphp
<div class="card card-outline card-primary ">
	<div class="card-header bg-light">
		<h3 class="card-title">
			{!! $form_header_txt ?? 'Remplissez les champs ci-déssous et cliquez sur <strong>Enregistrer</strong>' !!}
		</h3>
	</div>
	<!-- form start -->
	<form class="form-horizontal" action="{{ $inputs['form_action'] }}"
		method="{{ $form_method ?? 'POST'}}">
		<div class="card-body">
			@csrf
			@if($inputs['method'] != 'POST' && $inputs['method'] != 'GET')
				@method($inputs['method'])
			@endif


			@foreach ($inputs['inputs'] as $input)
				@if(empty($input['type']) || $input['type']=='text')
				@php
					$input = $DS->build_text($input, old($input['name']));
				@endphp
				<div class="form-group row">
  				<label for="{{ $identifiant }}-{{$loop->iteration}}" class="col-sm-2 col-form-label">{{ $input['label'] }}</label>
  				<div class="col-sm-10">
  					<input type="text" class=" form-control @error($input['name']) is-invalid @enderror " name="{{ $input['name'] }}" id="{{ $identifiant }}-{{$loop->iteration}}"
  						placeholder="{{ $input['label'] }}" value="{{ $input['old'] }}">
  				</div>
  			</div>
  			@elseif($input['type']=='textarea')
  			@php
						$input = $DS->build_textarea($input, old($input['name']));
				@endphp
  			<div class="form-group row">
  				<label for="{{ $identifiant }}-{{$loop->iteration}}" class="col-sm-2 col-form-label">{{ $input['label'] }}</label>
  				<div class="col-sm-10">
  					<textarea id="{{ $identifiant }}-{{$loop->iteration}}" rows="{{ $input['rows'] ?? 3 }}" placeholder="{{ $input['label'] }}" name="{{ $input['name'] }}" class=" form-control @error($input['name']) is-invalid @enderror ">{{ $input['old'] }}</textarea>
  				</div>
  			</div>
  			@elseif($input['type']=='html_area')
  			@php
						$input = $DS->build_textarea($input, old($input['name']));
				@endphp
  			<div class="form-group row">
  				<label for="{{ $identifiant }}-{{$loop->iteration}}" class="col-sm-2 col-form-label">{{ $input['label'] }}</label>
  				<div class="col-sm-10">
  					<textarea id="{{ $identifiant }}-{{$loop->iteration}}" rows="{{ $input['rows'] ?? 8 }}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="{{ $input['label'] }}" name="{{ $input['name'] }}" class="textarea form-control @error($input['name']) is-invalid @enderror ">{{ $input['old'] }}</textarea>
  				</div>
  			</div>
  			@elseif($input['type']=='dateheure')
  			@php
						$input = $DS->build_textarea($input, old($input['name']));
				@endphp
				<div class="form-group row">
  				<label for="{{ $identifiant }}-{{$loop->iteration}}" class="col-sm-2 col-form-label">{{ $input['label'] }}</label>
  				<div class="col-sm-10">
  					<div class="input-group " >
                    <input type='text' class=" form-control @error($input['name']) is-invalid @enderror datetimepicker" name="{{ $input['name'] }}" id="{{ $identifiant }}-{{$loop->iteration}}"
                    placeholder="{{ $input['label'] }}" value="{{ $input['old'] }}"
                    />
                    <div class="input-group-append">
                      <span class="input-group-text"> <i class="far fa-calendar-alt"></i> </span>
                    </div>
            </div>
  				</div>
  			</div>
  			@elseif($input['type']=='checkbox')
  				@php
						$input = $DS->build_checkbox($input, old($input['name']));
					@endphp
					<div class="form-group row">
    				<div class="offset-sm-2 col-sm-10">
    					<div class="form-check">
    						<input type="{{ $input['type'] }}" @if($input['old']) checked @endif class="form-check-input" id="{{ $identifiant }}-{{$loop->iteration}}" name="{{ $input['name'] }}" >
    						<label class="form-check-label" for="{{ $identifiant }}-{{$loop->iteration}}">{{ $input['label'] }}</label>
    					</div>
    				</div>
    			</div>
  			@endif
			@endforeach
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-outline-primary float-right">Enregistrer</button>
			<button type="submit" class="btn btn-default float-right d-none">Cancel</button>
		</div>
		<!-- /.card-footer -->
	</form>
</div>

<!--

<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="inputEmail3"
						placeholder="Email">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword3"
						placeholder="Password">
				</div>
			</div>
			<div class="form-group row">
				<div class="offset-sm-2 col-sm-10">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck2">
						<label class="form-check-label" for="exampleCheck2">Remember me</label>
					</div>
				</div>
			</div>

 -->
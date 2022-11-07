@extends('frontend.layout.profile.master')
		

@section('content')

	
	<!-- Product -->
	<section class="bg0 p-t-50 p-b-100">
		<div class="container">
			<div class="p-b-10 title">
				<h3 class="ltext-103 cl5">
					Edit Profile
				</h3>
			</div>

			<form method="POST"  action="{{ route('profile.update', $data) }}">
				@csrf
				@method('PUT')

				<div class="form-row">
				   
					<div class="form-group col-6">
						<label for="fnameInput">{{ __('First Name') }}</label>
						<input id="fnameInput" type="text" class="form-control form-control-lg mb-2  @error('first_name') is-invalid @enderror" name="first_name" value="{{$data->first_name }}"   autofocus>

						@error('first_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>

					<div class="form-group col-6">
						<label for="lnameInput">{{ __('Last Name') }}</label>

						<input id="lnameInput" type="text" class="form-control form-control-lg mb-2  @error('last_name') is-invalid @enderror" name="last_name" value="{{$data->last_name }}"   autofocus>

						@error('last_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>

				</div>


				<div class="form-group row">
					<label for="addressInput" >{{ __('Address') }}</label>

					<div class="col-md-12">
						<input id="addressInput" type="text" class="form-control form-control-lg mb-2  @error('address') is-invalid @enderror" name="address" value=" {{$data->address }} "  autofocus>

						@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>
				</div>

				<div class="form-group row">
					<label for="numberInput" >{{ __('Number') }}</label>

					<div class="col-md-12">
						<input id="numberInput" type="text" class="form-control form-control-lg mb-2  @error('number') is-invalid @enderror" name="number" value=" {{$data->number }} "  autocomplete="number" autofocus>

						@error('number')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>
				</div>

			

		 
				<div class="form-group row mb-0">
					<div class="col-md-12 ">
						<button type="submit" class="btn btn-secondary btn-lg reg-btn">
							{{ __('Update') }}
						</button>
					</div>
				</div>
			</form>

			

			<!-- Load more -->
			
		</div>
	</section>
	

@endsection


	
@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">{{ __('Create User') }}</div>

	                <div class="card-body">
	                    <form method="POST" action="{{ route('users.update' , ['id' => $user->id]) }}">
	                        @csrf
							<div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $user->name) }}" autocomplete="name" autofocus>

	                                @error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

	                            <div class="col-md-6">
	                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone' , $user->phone) }}" autocomplete="phone">

	                                @error('phone')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('Payment') }}</label>

	                            <div class="col-md-6">
	                                <input id="payment" type="text" class="form-control @error('payment') is-invalid @enderror" name="payment" value="{{ old('payment' , $user->payment) }}" autocomplete="payment">

	                                @error('payment')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
									<span class="text text-primary" style="font-size: 12px">Leave Password field empty if you don't want to update</span>
	                                @error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="paid_at" class="col-md-4 col-form-label text-md-right">{{ __('Date of All Payments') }}</label>

	                            <div class="col-md-6">
	                                <input id="paid_at" type="date" class="form-control @error('paid_at') is-invalid @enderror" name="paid_at" value="{{ old('paid_at' , $user->paid_at) }}" autocomplete="paid_at">

	                                @error('paid_at')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row mb-0">
	                            <div class="col-md-8 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    {{ __('Update') }}
	                                </button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
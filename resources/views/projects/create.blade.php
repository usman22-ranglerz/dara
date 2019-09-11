@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">{{ __('Create Project') }}</div>

	                <div class="card-body">
	                    <form method="POST" action="{{ route('projects.store') }}">
	                        @csrf
							
							<div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

	                                @error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

	                            <div class="col-md-6">
	                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old('description') }}</textarea>

	                                @error('description')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="cost" class="col-md-4 col-form-label text-md-right">{{ __('Cost') }}</label>

	                            <div class="col-md-6">
	                                <input id="cost" type="number" step="0.01" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') }}" autocomplete="cost">

	                                @error('cost')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="delivery_date" class="col-md-4 col-form-label text-md-right">{{ __('Delivery Date') }}</label>

	                            <div class="col-md-6">
	                                <input id="delivery_date" type="date" class="form-control @error('delivery_date') is-invalid @enderror" name="delivery_date" value="{{ old('delivery_date') }}" autocomplete="delivery_date">

	                                @error('delivery_date')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row mb-0">
	                            <div class="col-md-8 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    {{ __('Save') }}
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
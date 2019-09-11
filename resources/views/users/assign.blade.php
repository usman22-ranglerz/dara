@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	            	@if(session()->has('success'))
	            		<div class="alert alert-success">
	            			{{ session()->get('success') }}
	            		</div>
	            	@endif
	                <div class="card-header">{{ __("Assign Projects to {$user->name}") }}</div>

	                <div class="card-body">
	                    <form method="POST" action="{{ route('user.post-assign' , ['id' => $user->id]) }}">
	                        @csrf
							
							<div class="form-group row">
	                            <label for="projects" class="col-md-4 col-form-label text-md-right">{{ __('Projects') }}</label>

	                            <div class="col-md-6">
									<select name="projects[]" multiple="" id="projects" class="multiple-select form-control @error('projects') is-invalid @enderror">
										<option value="" disabled="">--- Select Projects ---</option>
										@php
											$already = $user->projects()->pluck('project_id')->toArray();
										@endphp
										@foreach($projects as $project)
											<option @if(in_array($project->id , $already)) selected="" @endif value="{{ $project->id }}">{{ $project->name }}</option>
										@endforeach
									</select>
	                                @error('projects')
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

@push('scripts')
	<script>
		$(document).ready(function() {
	    	$('.multiple-select').select2();
		});
	</script>
@endpush
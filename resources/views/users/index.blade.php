@extends('layouts.app')

@section('title')
	Users Listing
@endsection

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-10">
	            <div class="card">
	            	@if(session()->has('success'))
	            		<div class="alert alert-success">
	            			{{ session()->get('success') }}
	            		</div>
	            	@endif
	                <div class="card-header">Users Listing</div>
	                <div class="card-body">
						{!! $dataTable->table() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@push('scripts')
	{!! $dataTable->scripts() !!}
@endpush
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
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>id</th>
									<th>Name</th>
									<th>Created By</th>
									<th>Updated By</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{ $user->id }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ optional(optional($user->m_created_by)->operator)->name }}</td>
										<td>{{ optional(optional($user->m_updated_by)->operator)->name }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{!! $users->links() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@push('scripts')
@endpush
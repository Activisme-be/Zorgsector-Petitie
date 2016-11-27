@layout('layouts/backend')

@section('content')
	@if (isset($_SESSION['class']) && isset($_SESSION['message'])) 
		<div class="{{ $_SESSION['class'] }}">
			{{ $_SESSION['message'] }}
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>
	@endif

	<div class="row">
		{{-- Navbar menu --}}
			<div class="col-sm-12">
				<ul class="nav nav-tabs" role="tablist">
			    	<li role="presentation" class="active"><a href="#tab_1" aria-controls="home" role="tab" data-toggle="tab">Tickets</a></li>
				    <li role="presentation"><a href="#tab_2" aria-controls="profile" role="tab" data-toggle="tab">Labels</a></li>
				    <li role="presentation"><a href="#tab_3" aria-controls="messages" role="tab" data-toggle="tab">Applicaties</a></li>
			  	</ul>
			</div>
		{{-- /Navbar menu --}}
	</div>

		{{-- Navbar tab menu --}}
			<div class="tab-content">
				{{-- Tickets --}}
				   	<div role="tabpanel" class="tab-pane fade in active" id="tab_1">
				    	<div class="row">
				    		{{-- Search and functions --}}
				    			<div class="col-sm-12">
				    				{{-- Search form --}}
					    				<div class="panel-functions pull-left">
					    					<form class="form-inline" method="POST" action="{{ base_url('feedback/search') }}">
					    						<input type="text" class="form-control" name="term" placeholder="Uw zoekterm" />

					    						<button type="submit" class="btn btn-danger">
					    							<span class="glyphicon glyphicon-search"></span> Zoek	
					    						</button>
					    					</form>
					    				</div>
				    				{{--  /Search form --}}

				    				{{-- Functions --}}
				    					<div class="panel-functions pull-right">
				    						<a href="#" class="btn btn-success">Ticket aanmaken</a>
				    					</div>
				    				{{--  /Functions --}}
				    			</div>
				    		{{-- /Search and functions --}}

				    		{{-- Tickets overview --}}
				    			<div class="col-sm-12">
				    				<div class="panel panel-default">
					    				<div class="panel-body">
					    					@if (count($tickets) == 0)
					    						<div class="alert alert-info">
					    							Er zijn geen tickets gevonden in het systeem. 
					    						</div>
					    					@else 
					    						<table class="table table-condensed table-hover">
						    						<thead>
						    							<tr>
						    								<th>#</th>
						    								<th>Categorie:</th>
						    								<th>Aangemaakt door:</th>
						    								<th>Beschrijving</th>
						    								<th></th> {{-- Functions --}}
						    							</tr>	
						    						</thead>
						    						<tbody>
						    							@foreach ($tickets as $ticket)
						    								<tr>
						    									<td><code>#{{ $ticket->id }}</code></td>
						    									<td><span class="label label-info">{{ $ticket->labels->name }}</span></td>
						    									<td>{{ $ticket->email }}</td>
						    									<td> {{ substr($ticket->description, 0, 25) }}...</td>

						    									{{-- Functions --}}
						    										<td>
						    											<a href="" class="label label-primary">Info</a>
						    											<a href="{{ base_url('feedback/githubHook/' . $ticket->id) }}" class="label label-info">Publish</a>
						    											<a href="{{ base_url('feedback/destroy' . $ticket->id) }}" class="label label-danger">Delete</a>
						    										</td>
						    									{{-- /Functions--}}
						    								</tr>
						    							@endforeach
						    						</tbody>
						    					</table>
					    					@endif
					    				</div>
					    			</div>

					    			{{-- Ticket pagination --}}
					    				{{ $links }}
					    			{{--  /Ticket pagination --}}
				    			</div>
				    		{{-- /Tickets overview --}}
				    	</div>
					</div>
				{{-- /Tickets --}}

				{{-- Labels --}}
				    <div role="tabpanel" class="tab-pane fade in" id="tab_2">
				    	<div class="row">
				    		{{-- Ticket functions  --}}
				    			<div class="col-sm-12">
					    			<div class="panel-functions pull-right">
					    				<a href="" data-toggle="modal" data-target="#newLabel" class="btn btn-success">Label toevoegen</a>
					    			</div>
					    		</div>
					    	{{--  /Ticket functions --}}
				    	</div>
				    </div>
				{{--  /Labels --}}

				{{-- Applications --}}
				    <div role="tabpanel" class="tab-pane fade in" id="tab_3">
				    	<div class="row">
				    		{{-- Applicaton functions --}}
					    		<div class="col-sm-12">
					    			<div class="panel-functions pull-right">
						    			<a href="" class="btn btn-success">Applicatie toevoegen</a>
						    		</div>
					    		</div>
					    	{{-- /Application functions --}}
				    	</div>
				    </div>
				{{-- /Applications --}}
			</div>
		</div>
	{{-- /Navbar tab menu --}}
	
	{{--  Includes --}}
		@include('tickets/insert')
		@include('applications/insert')
		@include('labels/insert')
	{{--  /Includes --}}
@endsection
@layout('layouts/backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (isset($_SESSION['message']) && isset($_SESSION['class']))
                <div class="{{ $_SESSION['class'] }}">
                    {{ $_SESSION['message'] }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div> 
            @else 
                {{-- Search form --}}
                    <div style="margin-bottom: 15px;" class="pull-left">
                        <form method="POST" action="" class="form-inline"> 
                            <input class="form-control" placeholder="Search term" name="term" />
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-search"></span> Zoek
                            </button>
                        </form>   
                    </div>
                {{-- /Search form --}}

                {{-- Functions --}}
                    <div style="margin-bottom: 15px;" class="pull-right">
                        <a class="btn btn-success">Add signature.</a>
                    </div>
                {{-- /Functions -- --}}
            @endif
        </div>

        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Handtekeningen:
                   <div class="pull-right">
                       {{ $signatures }} / <strong>{{ $this->config->item('sign_count') }}</strong> Handtekeningen.
                   </div>
                </div>

                <div class="panel-body">
                    @if (count($results) == 0)
                        <div class="alert alert-info">
                            There are no signatures found in the system.
                        </div> 
                    @else
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name:</th>
                                    <th>Email:</th>
                                    <th>Birth date:</th>
                                    <th>Birth place:</th>
                                    <th></th> {{-- Functions --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td><code>#{{ $result->id }}</code></td>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->email }}</td>
                                        <td>{{ $result->birth_date }}</td>
                                        <td>{{ $result->city }}</td>

                                        {{-- Functions --}}
                                        <td>
                                            <a href="" class="label label-warning">Edit</a>
                                            <a href="{{ base_url('signature/destroy/' . $result->id) }}" class="label label-danger">Delete</a>
                                        </td>
                                        {{-- /Functions --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            {{-- pagination --}}
                {{ $links }}
            {{-- /pagination --}}
        </div>
    </div>
@endsection
@layout('layouts/backend')

@section('content')
    <div class="row">
        {{-- Content --}}
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-asterisk"></span> {{ $ticket->heading }}</div>
                    <div class="panel-body">
                        {{ $ticket->description }}
                    </div>
                </div>

                {{-- Comment --}}
                <div class="row">
                    {{-- Comment box --}}
                        <div class="col-sm-12">
                            <form class="form-horizontal" method="POST" action=""> 
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="7" name="comment" placeholder="Uw reactie"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="reset" class="btn btn-danger">Sluiten</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    {{-- /Comment box --}}
                </div>
                {{-- /Comment --}}
            </div>
        {{-- /Content --}}

        {{-- Sidebar --}}
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Informatie:</div>

                    <ul class="list-group">
                        <li class="list-group-item">Email: <span class="pull-right">{{ $ticket->email; }}</span></li>
                        <li class="list-group-item">Label <span class="label label-success pull-right">{{ $ticket->labels->name }}</span></li>
                    </ul>
                </div>

                <div class="text-center">
                    <div class="btn-group">
                        <a class="btn btn-success">
                        <span class="glyphicon glyphicon-asterisk"></span> Publiceren
                    </a>
                    <a class="btn btn-danger" href="">
                        <span class="glyphicon glyphicon-close"></span> Verwijderen
                    </a>
                    </div>
                </div>
            </div>
        {{-- /Sidebar --}}
    </div>
@endsection
@layout('layouts/backend')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div style="margin-bottom: 10px;" class="pull-left">
                <form action="" class="form-inline">
                    <input class="form-control" type="text" name="" placeholder="search">
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>
                </form>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#newUser">Creer login</a>
            </div>
        </div>

        @if (validation_errors())
            <div class="col-sm-12">
                <div class="alert alert-danger">
                    {{ validation_errors() }}
                </div>
            </div>
        @elseif(isset($_SESSION['class']) && isset($_SESSION['message']))
            <div class="col-sm-12">
                <div class="{{ $_SESSION['class'] }}">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $_SESSION['message'] }}
                </div>
            </div>
        @endif

        {{-- Content --}}
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name:</th>
                                <th>Email:</th>
                                <th></th> {{-- Functions --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><code>#{{ $user->id }}</code></td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>

                                    {{-- Options --}}
                                    <td>
                                        <a href="" class="label label-danger">Reset password</a>
                                        <a href="{{ base_url('/users/destroy/' . $user->id) }}" class="label label-danger">Delete</a>

                                        @if((int) $user->blocked === 0)
                                            <a href="{{ base_url('users/status/' . $user->id . '/1') }}" class="label label-danger">Block</a>
                                        @elseif((int) $user->blocked === 1)
                                            <a href="{{ base_url('users/status/' . $user->id . '/0') }}" class="label label-danger">Unblock</a>
                                        @endif
                                    </td>
                                    {{-- /Options --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Pagination --}}
                {{ $links }}
            {{-- /Pagination --}}
        </div>
        {{-- /Content --}}

        {{-- Includes --}}
            @include('users/create-user')
        {{-- /Includes --}}
    </div>
@endsection
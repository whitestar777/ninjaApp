@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h2>{{$franchise->name}} Franchise</h2>
                        <h3>Users</h3>
                        <hr>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/add') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" id="franchise" name="franchise" value="{{$franchise->id}}">
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Role</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="role">
                                        <option value="user">User</option>
                                        @if(Auth::user()->role == 'admin')
                                            <option value="manager">Manager</option>
                                        @endif
                                    </select>

                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        @foreach($franchise->users as $user)
                            {{$user->email}} - {{$user->role}} <br>
                        @endforeach
                        <h3>Documents</h3>
                        <hr>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/document/upload') }}" enctype="multipart/form-data">

                            <input type="hidden" id="franchise_id" name="franchise_id" value="{{$franchise->id}}">
                            @if(Auth::user()->role == 'admin')
                                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Only for</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="role" value="manager"> Manager<br>
                                        @if ($errors->has('role'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @include('document.new')
                        </form>
                        <hr>
                        <h3>Documents</h3>
                        <h4>everyone</h4>
                        @foreach($everyonesDocuments as $document)
                            <a href="/download/{{$document->id}}">{{$document->name}} - {{$document->role}}</a><br>
                        @endforeach
                        <h4>{{$franchise->name}} only</h4>
                        @foreach($franchise->documents as $document)
                            <a href="/download/{{$document->id}}">{{$document->name}} - {{$document->role}}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

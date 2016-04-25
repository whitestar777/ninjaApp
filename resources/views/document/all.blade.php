@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h2>Documents</h2>
                        <hr>
                        @if(Auth::user()->role !== 'user')
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/document/upload') }}" enctype="multipart/form-data">
                                @if(Auth::user()->role == 'manager')
                                    <input type="hidden" id="franchise_id" name="franchise_id" value="{{Auth::user()->franchise_id}}">
                                @endif
                                @if(Auth::user()->role == 'admin')
                                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Only for</label>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="role" value="manager"> Manager<br>
                                            <input type="checkbox" name="role" value="admin"> Admin<br>
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
                        @endif
                        <hr>
                        <h3>Documents</h3>
                        @if(isset($documents))
                            @foreach($documents as $document)
                                <a href="/download/{{$document->id}}">{{$document->name}} - {{$document->role}}</a><br>
                            @endforeach
                        @endif
                        @if(isset($managerDocuments))
                            @foreach($managerDocuments as $document)
                                <a href="/download/{{$document->id}}">{{$document->name}} - {{$document->role}}</a><br>
                            @endforeach
                        @endif
                        @if(isset($everyoneDocuments))
                            @foreach($everyoneDocuments as $document)
                                <a href="/download/{{$document->id}}">{{$document->name}} - {{$document->role}}</a><br>
                            @endforeach
                        @endif
                        @if(isset($franchiseDocuments))
                            @foreach($franchiseDocuments as $document)
                                @if($document->role == 'manager')
                                    @if(Auth::user()->role == 'manger')
                                        <a href="/download/{{$document->id}}">{{$document->name}} - {{$document->role}}</a><br>
                                    @endif
                                @endif
                                @if($document->role == null)
                                    <a href="/download/{{$document->id}}">{{$document->name}} - {{$document->role}}</a><br>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

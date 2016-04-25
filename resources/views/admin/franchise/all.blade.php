@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h2>All Franchise's</h2>
                        @foreach($allFranchise as $franchise)
                            <a href="/franchise/view/{{$franchise->id}}">{{$franchise->name}}</a> <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

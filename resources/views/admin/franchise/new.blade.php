@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h2>New Franchise</h2>
                        <form method="POST" action="/franchise/createFranchise">
                            {{ csrf_field() }}
                            <label for="name">Franchise Name</label>
                            <input type="text" id="name" name="name">
                            <input class="btn" type="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

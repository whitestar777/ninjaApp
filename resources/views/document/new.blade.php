{{ csrf_field() }}
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
    <label class="col-md-4 control-label">Select image to upload:</label>

    <div class="col-md-6">
        <input type="file" name="file_name" id="file_name">
        @if ($errors->has('file_name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('file_name') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>Upload
        </button>
    </div>
</div>
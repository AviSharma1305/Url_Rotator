@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Rotator Info</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tables.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $table->link }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created At:</strong>
                {{ $table->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created At:</strong>
                {{ $table->updated_at }}
            </div>
        </div>

    </div>
@endsection

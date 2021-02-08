@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Rotator Management</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tables.create') }}" title="Create a group"> <i
                        class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="padding-top: 5px;">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div style="padding-top: 7px;">
        <table class="table table-bordered table-responsive-lg">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th width="280px">Action</th>
            </tr>
            <p hidden> {{ $i = 1 }}</p>
            @foreach ($urlGroup as $group)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->created_at }}</td>
                    <td>{{ $group->updated_at }}</td>
                    <td>
                        <form action="{{ route('tables.destroy', $group->id) }}" method="POST">

                            <a href="{{ route('projects.index', ['table_id' => $group->id]) }}" title="show"
                                class="btn btn-success"><i class="fa fa-eye"></i></a>

                            <a href="{{ route('tables.edit', $group->id) }}" class="btn btn-info"><i
                                    class="fa fa-edit"></i></a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" class="btn btn-warning"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



@endsection

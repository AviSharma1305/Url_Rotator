@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Urls</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-4 hw">
                <a class="btn btn-primary" href="{{ route('tables.index') }}"
                    title="Add new url"> <i class="fas fa-backward "></i>
                </a>
        </div>
        <div class="col-lg-4">
                <a class="btn btn-success" href="{{ route('projects.create', ['table_id' => $table_id]) }}"
                    title="Add new url"> <i class="fas fa-plus-circle"></i>
                </a>
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
                <th>Link</th>
                <th>HW</th>
                <th>CH</th>
                <th>HR</th>
                <th width="280px">Action</th>
            </tr>
            <p hidden> {{ $i = 1 }}</p>
            @foreach ($urls as $url)
                @if ($url->table_id == $table_id)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $url->link }}</td>
                        <td>{{ $url->hw }}</td>
                        <td>{{ $url->ch }}</td>
                        <td>{{ $url->hr }}</td>
                        <td>
                            <form action="{{ route('projects.destroy', $url->id) }}" method="POST">

                                <a href="{{ route('projects.show', ['project' => $url->id, 'table_id' => $table_id]) }}" title="show" class="btn btn-success"><i
                                        class="fa fa-eye"></i></a>

                                <a href="{{ route('projects.edit', ['project' => $url->id, 'table_id' => $table_id]) }}"
                                    class="btn btn-info"><i class="fa fa-edit"></i></a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" class="btn btn-warning"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>

    <div>
        <a class="btn btn-primary" href="redirect">CLICK ME</a>
    </div>



@endsection

@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Link Mgt.</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a project"> <i
                        class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Link</th>
            <th>HW</th>
            <th>CH</th>
            <th>HR</th>
            {{-- <th>HC</th> --}}
            <th width="280px">Action</th>
        </tr>
        <p hidden> {{ $i = 1 }}</p>
        @foreach ($urls as $url)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $url->link }}</td>
                <td>{{ $url->hw }}</td>
                <td>{{ $url->ch }}</td>
                <td>{{ $url->hr }}</td>
                {{-- <td>{{ $url->hc }}</td> --}}
                <td>
                    <form action="{{ route('projects.destroy', $url->id) }}" method="POST">

                        <a href="{{ route('projects.show', $url->id) }}" title="show" class="btn btn-success"><i
                                class="fa fa-eye"></i></a>

                        <a href="{{ route('projects.edit', $url->id) }}" class="btn btn-info"><i
                                class="fa fa-edit"></i></a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div>
        <a class="btn btn-primary" href="redirect">CLICK ME</a>
    </div>



@endsection

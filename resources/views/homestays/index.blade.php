@extends('layouts')
@section('title') Homestay | Index @endsection
@section('content')
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Deskripsi</th>
            <th colspan="3">&nbsp;</th>
        </tr>
        @foreach($homestays as $homestay)
            <tr>
                <td>{{ $homestay->name  }}</td>
                <td>{{ $homestay->address  }}</td>
                <td>{{ $homestay->description  }}</td>

                <td> <a href="{{ route('homestays.show', ["homestay" => $homestay->id]) }}">Lihat</a></td>
                <td> <a href="{{ route('homestays.edit', ["homestay" => $homestay->id]) }}">Edit</a></td>
                <td>
                    <form onSubmit="showConfirm();" action="{{route('homestays.destroy', ["homestay" => $homestay->id])}}" methods="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <a href="{{ route('homestays.create')  }}">Homestay Baru</a>

    <script>
        function showConfirm() {
            if (!confirm('Apakah Anda Yakin?')) {
                return false;
            }
        }
    </script>
@endsection
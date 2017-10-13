@extends('layouts')
@section('title') Homestay | Baru @endsection

@section('content')
    <form action="{{ route('homestays.store')  }}" method="post">
        {{ csrf_field()  }}

        <div>
            <div>Nama</div>
            <div>{{ $homestay->name  }}</div>
        </div>

        <div>
            <div>Alamat</div>
            <div>{{ $homestay->address  }}</div>
        </div>

        <div>
            <div>Deskripsi</div>
            <div>{{ $homestay->deskripsi  }}</div>
        </div>
    </form>

    <a href="{{ route('homestays.index')  }}">Kembali</a>
@endsection
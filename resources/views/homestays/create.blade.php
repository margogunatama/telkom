@extends('layouts')
@section('title') Homestay | Baru @endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('homestays.store')  }}" method="post">
        {{ csrf_field()  }}

        <div>
            <div>Nama</div>
            <div><input type="text" name="name"></div>
        </div>

        <div>
            <div>Alamat</div>
            <div>
                <textarea name="address"></textarea>
            </div>
        </div>

        <div>
            <div>Deskripsi</div>
            <div>
                <textarea name="description"></textarea>
            </div>
        </div>

        <div><button type="submit">Simpan</button></div>
    </form>

    <a href="{{ route('homestays.index')  }}">Kembali</a>
@endsection
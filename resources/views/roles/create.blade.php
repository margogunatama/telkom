@extends("layouts.app")

@section("content")
    <div class="col-lg-12">
        <form action="{{ route('roles.store')  }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Nama Role</label>
                <input type="text" name="name" class="form-control" placeholder="Masukan nama role">
            </div>

            <table class="table table-bordered">
                @foreach($permissions as $controller => $actions)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">
                            {{ $controller  }}
                        </td>
                        <td>
                            @foreach($actions as $action)
                                <div class="checkbox">
                                    <label>
                                        <input name="permissions[]" type="checkbox" value="{{ $action. " ".$controller  }}">
                                        {{ strtoupper($action)  }}
                                    </label>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
@extends("layouts.app")

@section("content")
    <div class="col-lg-12">
        <form action="{{ route('roles.update', ["role" => $role->id])  }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label>Nama Role</label>
                <input type="text" name="name" class="form-control" placeholder="Masukan nama role" value="{{ $role->name  }}">
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
                                        <input
                                                name="permissions[]"
                                                type="checkbox"
                                                value="{{ $action. " ".$controller  }}"
                                                {{ $role->hasPermissionTo($action. " ".$controller) ? "checked" : ""  }}
                                        >
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
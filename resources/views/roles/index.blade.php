@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <h1>Roles List</h1>

        <table class="table table-bordered">
            <tr>
                <th class="text-center" width="60%">Name</th>
                <th class="text-center" width="20%">Permissions</th>
                <th class="text-center" width="20%">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary btn-block">
                        New Role
                    </a>
                </th>
            </tr>

            @if(count($roles) > 0)
                @foreach($roles as $role)
                    <tr>
                        <td>
                            <a href="{{ route('roles.show', ['role' => $role->id])  }}">
                                {{ $role->name  }}
                            </a>
                        </td>
                        <td class="text-right">
                            {{ $role->permissions()->count()  }}
                        </td>
                        <td class="text-center">
                            <a class="btn btn-default" href="{{ route('roles.show', ['role' => $role->id])  }}">
                                Show
                            </a>
                            <a class="btn btn-warning" href="{{ route('roles.edit', ['role' => $role->id])  }}">
                                Edit
                            </a>
                            <form action="{{ route('roles.destroy', ['role' => $role->id])  }}" style="display: inline-block;" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-danger" onclick="event.preventDefault();confirmCheck(this);">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" align="center">No Data</td>
                </tr>
            @endif

        </table>
    </div>
@endsection

@section("extra-js")
    <script>
        function confirmCheck(el) {
            console.log(el)
            var conf = confirm("Are you sure?");

            if (conf === true) {
                el.parentNode.submit()
            }
        }
    </script>
@endsection
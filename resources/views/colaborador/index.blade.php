@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong>
        
        {{ Session::get('mensaje')}}
       
    </div>
    @endif


    <a href="{{ url('colaborador/create')}}" class="btn btn-outline-dark">Registrar Nuevo Colaborador</a>

    <a href="{{ url('download-pdf')}}" class="btn btn-outline-dark">Generar Pdf</a>
    <br> <br>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody style="background-color: rgba(131, 144, 144, 0.14)">
            @foreach( $colaboradores as $colaborador )
            <tr>
                <td>{{ $colaborador->id }}</td>


                <td>
                    <img src="{{asset('storage'.'/'.$colaborador->Foto)}}" width="100" alt="">


                </td>
                <td>{{ $colaborador->Nombres }}</td>
                <td>{{ $colaborador->Apellidos }}</td>
                <td>{{ $colaborador->Correo }}</td>

                <td>
                    <a href="{{ url('/colaborador/'.$colaborador->id.'/edit')}}" class="btn btn-info">
                        Editar
                    </a>
                    |

                    <form action="{{ url('/colaborador/'.$colaborador->id)}}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Borrar" onclick="return confirm('¿seguro que quieres eliminar?')"
                            class="btn btn-danger">
                    </form>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/colaborador/'.$colaborador->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PUT')}}
    @include('colaborador.form',['modo'=>'Editar'])

</form>
</div>
@endsection


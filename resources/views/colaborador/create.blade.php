
@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/colaborador')}}" method="post" enctype="multipart/form-data">
@csrf
   @include('colaborador.form',['modo'=>'Crear'])
</form>
</div>
@endsection
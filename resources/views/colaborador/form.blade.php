<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:  rgba(131, 144, 144, 0.14);">
                <div class="card-header text-white" style="background-color:rgba(17, 17, 18, 0.88);">
                    {{ $modo}} Colaborador
                </div>

                <div class="card-body">

                    @if(count($errors)>0)
                    <div class="row mb-3 justify-content-center">
                        <div class="alert alert-danger col-md-8" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="row mb-3">
                        <label for="Nombres" class="col-md-4 col-form-label text-md-end">Nombres</label>

                        <div class="col-md-6">
                            <input id="Nombres" type="text" class="form-control" name="Nombres"
                                value="{{isset($colaborador->Nombres)?$colaborador->Nombres:old('Nombres')}}" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Apellidos" class="col-md-4 col-form-label text-md-end">Apellidos</label>

                        <div class="col-md-6">
                            <input id="Apellidos" type="text" class="form-control" name="Apellidos"
                                value="{{isset($colaborador->Apellidos)?$colaborador->Apellidos:old('Apellidos')}}" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Correo" class="col-md-4 col-form-label text-md-end">Correo</label>

                        <div class="col-md-6">
                            <input id="Correo" type="email" class="form-control" name="Correo"
                                value="{{isset($colaborador->Correo)?$colaborador->Correo:old('Correo')}}" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Foto" class="col-md-4 col-form-label text-md-end">Foto</label>

                        <div class="col-md-6">
                            @if(isset($colaborador->Foto))
                            <img src="{{asset('storage'.'/'.$colaborador->Foto)}}" width="110" alt="">
                            @endif
                            <input id="Foto" type="file" class="form-control" name="Foto"
                                value="{{isset($colaborador->Foto)?$colaborador->Foto:old('Foto')}}" autofocus>
                        </div>
                    </div>

                    <div class="d-flex p-3 justify-content-center">
                        <div class="p-1">
                            <input type="submit" class="form-control btn btn-info" value="{{$modo}} datos">
                        </div>
                        <div class="p-1">
                            <a href="{{ url('/colaborador')}}" class="form-control btn btn-outline-dark">Regresar</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
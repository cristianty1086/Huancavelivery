@extends('theme.default')



@section('content')

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Tenemos problemas con los datos en el formulario.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Editar datos de usuario</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card" style="width: 100%">

                    <div class="card-header"> </i> <strong>Los campos con <span class="text-danger">*,</span> !son obligatorios!</strong>  </div>

                    <div class="card-body">



                        <div class="col-sm-6">


                            <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Nombre <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="Ingrese un nombre" required>
                                </div>

                                <div class="form-group">
                                    <label>Correo electrónico <span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" placeholder="Ingrese un correo electrónico" required>
                                </div>

                                <div class="form-group">
                                    <label>Teléfono <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" placeholder="Ingrese un teléfono" required>
                                </div>

                                <div class="form-group">
                                    <label>Estado <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control" required>
                                        <?php
                                        if($user->status == 1){
                                        ?>
                                            <option value="1" selected>habilitado</option>
                                            <option value="0">deshabilitado</option>
                                        <?php
                                        }else{
                                        ?>
                                            <option value="1">habilitado</option>
                                            <option value="0" selected>deshabilitado</option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label>Tipo de cuenta<span class="text-danger">*</span></label>
                                    <select name="rol" id="rol" class="form-control" required>
                                    <?php
                                    if(count($roles)>0){
                                        $s	=	'';
                                        foreach($roles as $val){
                                            $s++;
                                    ?>
                                      <option value="{{$val->id}}" <?php if($user->roles[0]->pivot->role_id == $val->id) echo 'selected' ?> >{{ $val->name }}</option>
                                    <?php
                                        }
                                    }else{
                                    ?>
                                        <option>No hay roles</option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Avatar <span class="text-danger">*</span></label>
                                    <input type="file" name="avatar" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" >
                                    @if ($errors->has('file'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">

                                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Guardar</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>

          </div>
          <!-- /.container-fluid -->

@endsection

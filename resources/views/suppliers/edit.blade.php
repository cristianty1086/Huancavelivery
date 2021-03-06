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
              <h1 class="h3 mb-0 text-gray-800">Editar datos de negocio</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card" style="width: 100%">

                    <div class="card-header"> </i> <strong>Los campos con <span class="text-danger">*,</span> !son obligatorios!</strong>  </div>

                    <div class="card-body">



                        <div class="col-sm-6">


                            <form action="{{ route('suppliers.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Nombre <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $supplier->name }}"  placeholder="Ingrese un nombre" required>
                                </div>

                                <div class="form-group">
                                    <label>Ruc <span class="text-danger">*</span></label>
                                    <input type="text" name="ruc" id="razonsocial" class="form-control" value="{{ $supplier->ruc }}"  placeholder="Ingrese la razon social" required>
                                </div>

                                <div class="form-group">
                                    <label>Descripcion <span class="text-danger">*</span></label>
                                    <input type="text" name="descripcion" id="phone" class="form-control" value="{{ $supplier->descripcion }}" placeholder="Ingrese un telefono" required>
                                </div>

                                <div class="form-group">
                                    <label>Direccion <span class="text-danger">*</span></label>
                                    <input type="text" name="direccion" id="phone" class="form-control" value="{{ $supplier->direccion }}" placeholder="Ingrese un telefono" required>
                                </div>

                                <div class="form-group">
                                    <label>Telefono <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $supplier->telefono }}"  placeholder="Ingrese un telefono" required>
                                </div>

                                <div class="form-group">
                                    <label>Estado <span class="text-danger">*</span></label>
                                    <select name="estado" id="status" class="form-control" required>
                                        <?php
                                        if($supplier->estado == 1){
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
                                    <label>Correo electrónico <span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $supplier->email }}"  placeholder="Ingrese un correo electrónico" required>
                                </div>

                                <div class="form-group">
                                    <label>Logo <span class="text-danger">*</span></label>
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

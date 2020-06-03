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
              <h1 class="h3 mb-0 text-gray-800">Editar tipo de residencia</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card" style="width: 100%">

                    <div class="card-header"> </i> <strong>Los campos con <span class="text-danger">*,</span> !son obligatorios!</strong>  </div>

                    <div class="card-body">



                        <div class="col-sm-6">


                            <form action="{{ route('categories.update',$supplier->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Nombre <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $supplier->name }}"  placeholder="Ingrese un nombre" required>
                                </div>

                                <div class="form-group">
                                    <label>Razon social <span class="text-danger">*</span></label>
                                    <input type="text" name="razonsocial" id="razonsocial" class="form-control" value="{{ $supplier->razonsocial }}"  placeholder="Ingrese la razon social" required>
                                </div>

                                <div class="form-group">
                                    <label>Logo <span class="text-danger">*</span></label>
                                    <input type="text" name="avatar" id="avatar" class="form-control" value="{{ $supplier->avatar }}"  placeholder="Ingrese un logo" required>
                                </div>

                                <div class="form-group">
                                    <label>Telefono <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $supplier->phone }}"  placeholder="Ingrese un telefono" required>
                                </div>

                                <div class="form-group">
                                    <label>Correo electrónico <span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $supplier->email }}"  placeholder="Ingrese un correo electrónico" required>
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

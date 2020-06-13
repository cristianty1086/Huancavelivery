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
              <h1 class="h3 mb-0 text-gray-800">Agregar rol</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card" style="width: 100%">

                    <div class="card-header"> </i> <strong>Los campos con <span class="text-danger">*,</span> !son obligatorios!</strong>  </div>

                    <div class="card-body">



                        <div class="col-sm-6">


                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf

                                <div class="form-group">

                                    <label>Nombre <span class="text-danger">*</span></label>

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese un nombre" required>

                                </div>

                                <div class="form-group">

                                    <label>Alias <span class="text-danger">*</span></label>

                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Ingrese un alias" required>

                                </div>

                                <div class="form-group">

                                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Agregar</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>

          </div>
          <!-- /.container-fluid -->

@endsection

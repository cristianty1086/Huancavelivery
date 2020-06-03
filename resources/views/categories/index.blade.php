@extends('theme.default')



@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar reporte</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card" style="width: 100%">
                    <div class="card-header">Registro<a href="categories/create" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Agregar</a></div>
                    <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Id</th>
                                <th >Image</th>
                                <th >Nombre</th>
                                <th >Descripcion</th>
                                <th class="text-center">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(count($data)>0){
                                $s	=	'';
                                foreach($data as $val){
                                    $s++;
                            ?>
                            <tr>
                                <td><?php echo $s;?></td>
                                <td><img src="{{ asset($val['imagen']) }}" alt="" title="" width="150px"></td>
                                <td><?php echo $val['name'];?></td>
                                <td><?php echo $val['descripcion'];?></td>
                                <td align="center">
                                    <form action="{{ route('roles.destroy',$val['id']) }}" method="POST">


                                        <a class="btn btn-primary" href="{{ route('roles.edit',$val['id']) }}">Editar</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger"  onClick="return confirm('¿Esta seguro de quitar el tipo de residencia?');">Delete</button>
                                    </form>
                                </td>

                            </tr>
                            <?php
                                }
                            }else{
                            ?>
                            <tr><td colspan="6" align="center">No hay datos en el sistema</td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

@endsection

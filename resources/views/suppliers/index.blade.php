@extends('theme.default')



@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Tiendas o negocios</h1>
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
                    <div class="card-header">Registro<a href="suppliers/create" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Agregar</a></div>
                    <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Id</th>
                                <th class="text-center">Avatar</th>
                                <th width="160px">RUC</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Descripcion</th>
                                <th class="text-center">Direccion</th>
                                <th class="text-center">Productos</th>
                                <th class="text-center">Guarniciones</th>
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
                                <td><img src="{{ asset($val['logo']) }}" alt="" title="" width="150px"></td>
                                <td><?php echo $val['ruc'];?></td>
                                <td><?php echo $val['name'];?></td>
                                <td><?php echo $val['category_id'];?></td>
                                <td><?php if($val['estado'] == 1) echo "activo"; else echo "inhabilitado"?></td>
                                <td><?php echo $val['descripcion'];?></td>
                                <td><?php echo $val['direccion'];?></td>
                                <td align="center">
                                    <form action="{{ route('products.lista',$val['id']) }}" method="GET">
                                        <a class="btn btn-info" href="{{ route('products.lista',$val['id']) }}">Productos</a>
                                        @csrf
                                    </form>
                                </td>
                                <td align="center">
                                    <form action="{{ route('guarniciones.lista',$val['id']) }}" method="GET">
                                        <a class="btn btn-info" href="{{ route('guarniciones.lista',$val['id']) }}">Guarniciones</a>
                                        @csrf
                                    </form>
                                </td>
                                <td align="center">
                                    <form action="{{ route('suppliers.destroy',$val['id']) }}" method="POST">


                                        <a class="btn btn-primary" href="{{ route('suppliers.edit',$val['id']) }}">Editar</a>

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

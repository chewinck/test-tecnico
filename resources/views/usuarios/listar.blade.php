<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>Listar usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table_striped table-ligth mt-5">
                    <thead>
                        <th>Id</th>
                        <th>Program Id</th>
                        <th>Fecha nacimiento</th>
                        <th>Telefono</th>
                        <th>Status</th>
                        <th>Creación</th>
                        <th>Accion</th>
                    </thead>
                    <tbody>
                         
                        @foreach($data->items() as $usuario)
                        <tr>

                      <!--   {{dump($usuario['id'])}} -->

                            <td>{{$usuario['user_id']}}</td>
                            <td>{{$usuario['program_id']}}</td>
                            <td>{{$usuario['birth_date']}}</td>
                            <td>{{$usuario['mobile_number']}}</td>
                            <td>{{$usuario['active']}}</td>
                            <td>{{ $usuario['created_at']}}</td>
                            <td><a href="{{  url('transacciones', [$usuario['user_id']])}}  " class="btn btn-info" data-method="get" data-confirm="Are you sure?">Transactions</a></td>
                            <!-- <td> <button  formaction="transacciones/{$usuario['user_id']}" type="button" class="btn btn-info">Transacctions</button></td> -->
                        </tr>
                        @endforeach

                        {{$data->links()}}
                        <!-- {!! $data->render() !!} -->
                    </tbody>

                </table>

            </div>
        </div>
    </div>
  </body>
</html>
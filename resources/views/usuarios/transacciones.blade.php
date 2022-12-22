<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>Transacciones usuario  </h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table_striped table-light mt-5">
                    <thead>
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Segmentación</th>
                        <th>Status</th>
                        <th>monto</th>
                        <th>detalles</th>
                        <th>Año</th>
                        <th>Mes</th>
                        <th>creación</th>
                    </thead>
                    <tbody>
                      @if(!empty($data->items()))
                         
                        @foreach($data->items() as $transaction)
                        <tr>

                      <!--   {{dump($transaction['id'])}} -->

                            <td>{{$transaction['id']}}</td>
                            <td>{{$transaction['transaction_type_id']}}</td>
                            <td>{{$transaction['segmentation_id']}}</td>
                            <td>{{$transaction['segmentation_id']}}</td>
                            <td>{{$transaction['amount']}}</td>
                            <td>{{$transaction['transaction_detail']}}</td>
                            <td>{{$transaction['year']}}</td>
                            <td>{{$transaction['month']}}</td>
                            <td>{{$transaction['created_at']}}</td>
                        </tr>
                        @endforeach
                        {{$data->links()}}
                      
                        @else
                        <div class="alert alert-danger">
                          <p><strong>El usuario Seleccionado no tiene aún transacciones</strong></p>
                      </div>
                      @endif
                    </tbody>

                </table>

            </div>
        </div>
    </div>
  </body>
</html>
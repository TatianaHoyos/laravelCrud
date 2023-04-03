<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #212529;
          color: white;
        }
        </style>
</head>
<body>
    <h3>Reporte de usuarios</h3>
    <table  id="customers">
        <thead >
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Correo</th>
             
            </tr>
        </thead>
        <tbody style="background-color: rgba(131, 144, 144, 0.14)">
            @foreach( $colaboradores as $colaborador )
            <tr>
                <td>{{ $colaborador->id }}</td>
                <td>{{ $colaborador->Nombres }}</td>
                <td>{{ $colaborador->Apellidos }}</td>
                <td>{{ $colaborador->Cedula }}</td>
                <td>{{ $colaborador->Correo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
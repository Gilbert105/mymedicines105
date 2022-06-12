<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>List medicines!</h1>
    @if($message)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Generic Name</th>
                <th scope="col">Form</th>
                <th scope="col">Restriction Formula</th>
                <th scope="col">Description</th>
                <th scope="col">Category Name</th>
                <th scope="col">Faskes TK1</th>
                <th scope="col">Faskes TK2</th>
                <th scope="col">Faskes TK3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$message->id}}</td>
                <td>{{$message->generic_name}}</td>
                <td>{{$message->form}}</td>
                <td>{{$message->restriction_formula}}</td>
                <td>{{$message->description}}</td>
                <td>{{$message->getcategory->name}}</td>
                <td>{{$message->faskes_tk1}}</td>
                <td>{{$message->faskes_tk2}}</td>
                <td>{{$message->faskes_tk3}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <h1>tidak ada data</h1>
    @endif

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <main class="container mt-5">
        <div class="row text-center">
            <div class="col">
                <h1>NOTAS ADMINISTRATIVAS</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>Estudiante con id {{$id}}</h4>
            </div>
        </div>
        <div class="row">
            <form class="col" method="post" action="{{ route('add_administrative_notes') }}">
                @csrf
                <input type="hidden" name="id_student" value="{{$id}}">
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="notes" required></textarea>
                    <button class="input-group-text btn btn-success" type="submit">Nueva Nota</button>
                </div>
            </form>
        </div>


        <div class="row mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <th scope="row">{{ $note->id }}</th>
                            <td>{{ $note->notes }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('modify_student') }}" class="me-2" method="post"> 
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id}}">
                                        <button class="btn btn-warning" type="submit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('delete_student_db') }}" class="me-2" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <main class="container mt-5">
        <div class="row text-center">
            <div class="col">
                <h1>NOTAS ADMINISTRATIVAS</h1>
            </div>
            <div class="col">
                <a class="btn btn-success" href="add_student">
                    Agregar
                </a>
            </div>
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
                            <td>{{ $note->description }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('modify_student') }}" class="me-2" method="post"> 
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $student->id }}">
                                        <button class="btn btn-warning" type="submit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('delete_student_db') }}" class="me-2" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $student->id }}">
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
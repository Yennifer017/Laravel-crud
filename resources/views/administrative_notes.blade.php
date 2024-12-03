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
                <h4>Estudiante con id {{ $id }}</h4>
            </div>
        </div>
        <div class="row">
            <form class="col" method="post" action="{{ route('add_administrative_notes') }}">
                @csrf
                <input type="hidden" name="id_student" value="{{ $id }}">
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
                                    <div>
                                        <button class="btn btn-warning" type="button"
                                            onclick="prepareModifyModal({{$note->id}})">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('delete_note_db') }}" class="me-2" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $note->id }}">
                                        <input type="hidden" name="id_student" value="{{ $id }}">
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

    <section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="post" action="{{ route('modify_note_db') }}">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar nota</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_note" value="-1" id="modifyIdNote">
                        <input type="hidden" name="id_student" value="{{$id}}">
                        <textarea class="form-control" aria-label="With textarea" name="notes" 
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    <script>
        function prepareModifyModal($idNote){
            const $idElement = document.getElementById('modifyIdNote');
            $idElement.value = $idNote;

            const modalElement = document.getElementById('exampleModal');
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    </script>
</body>

</html>

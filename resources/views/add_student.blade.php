<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-1">
                    <a class="btn btn-secondary" href="students">Regresar</a>
                </div>
                <div class="col-11">
                    <h1 class="text-center">Agregar estudiante</h1>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6 mx-auto">
                    <form class="mt-4" method="POST" action="{{ route('add_student_db') }}">
                        @csrf
                        <!-- Name -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                            <label for="name">Nombre</label>
                        </div>
                        <!-- Lastname -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lastname" name="lastname" 
                                placeholder="Apellido" required>
                            <label for="lastname">Apellido</label>
                        </div>
                        <!-- Address -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" name="address" 
                                placeholder="Dirección" required>
                            <label for="address">Dirección</label>
                        </div>
                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" 
                                placeholder="Correo electrónico" required>
                            <label for="email">Correo electrónico</label>
                        </div>
                        <!-- Phone -->
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                placeholder="Teléfono" required>
                            <label for="phone">Teléfono</label>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
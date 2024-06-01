<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Cita</title>
</head>
<body>

    <main class="main_date">
                    
        <form class="custom-form">
            <h2>Pedir cita</h2>
            <div>
                <div>
                <div>
                    <div class="card">
                    
                    <div class="card-body">
                        <form>
                        <div>
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div>
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos" required>
                        </div>
                        <div>
                            <label for="dia" class="form-label">Día de la Cita</label>
                            <input type="date" class="form-control" id="dia" required>
                        </div>
                        <div>
                            <label for="hora" class="form-label">Hora de la Cita</label>
                            <input type="time" class="form-control" id="hora" required>
                        </div>
                        <div>
                            <label for="seleccion" class="form-label">Elige un tatuador</label>
                            <select class="form-select" id="seleccion" required>
                            <option value="">Selecciona una tatuador:</option>
                            <option value="tatuador1">Paula Hernández "Encre"</option> 
                            <option value="tatuador2">Señora Lu</option>
                            <option value="tatuador3">Sam "El Nerdodivergente"</option>
                            </select>
                        </div>
                        <div>
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" rows="3" placeholder="Ingresa una descripción" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn">Enviar</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </main>

</body>
</html>

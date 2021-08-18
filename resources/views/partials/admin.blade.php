<!-- Información para los administradores. Requieren de ese permiso -->

    <h3 class="text-center">Información para administradores</h3>
    <br>
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                  <h3>150</h3>
                  <p>Intentos de reconocimiento fallidos</p>
                </div>
                <div class="icon">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-success">
                <div class="inner">
                  <h3>73%</h3>
                  <p>Reconocimientos correctos</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>Nuevas jornadas registradas</p>
                </div>
                <div class="icon">
                  <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{ $empleados }}</h3>
                  <p>Empleados totales</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{ url('empleados/') }}" class="small-box-footer">
                  Ver empleados <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $diario }}</h3>
                  <p>Entradas en el diario</p>
                </div>
                <div class="icon">
                  <i class="fas fa-copy"></i>
                </div>
                <a href="{{ url('diarios/') }}" class="small-box-footer">
                  Ir al log <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
    </div>


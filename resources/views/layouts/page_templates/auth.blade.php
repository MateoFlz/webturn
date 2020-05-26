@if ($class ?? ''  == 'off-canvas-sidebar')
@else
<div class="wrapper">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @inject('turnos', 'App\Http\Controllers\TurnoController')
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="false" >
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
              <div class="tab-content" id="nav-tabContent">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Turnos del dia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Asignacion del limite</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lista de turnos</a>
                      <a class="nav-item nav-link disabled" id="nav-contact-tab " data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-disabled="true">Ediar limite</a>
                    </div>
                </nav>
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form id="formturno" method="post">
                        @csrf
                        <div class="modal-body">
                            <div id="alertmodal"></div>
                            <div class="form-group">
                                <label for="deturnos">Asignacion de numero de turnos</label>
                                <input id="deturnos" class="form-control" type="number" name="deturnos" style="font-size: 3rem; height: 70px;" pattern="[1-9]"" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="card card-plain">
                            <div class="card-header card-header-success">
                              <h4 class="card-title mt-0"> Tabla de ficho </h4>
                              <p class="card-category"> Aqui puede consultar los fichos establecidos</p>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive " style="max-height: 300px;">
                                <table class="paginated table table-hover">
                                  <thead class="text-center">
                                    <th>
                                      N°
                                    </th>
                                    <th>
                                      Fecha
                                    </th>
                                    <th>
                                      Turnos del dia
                                    </th>
                                    <th>
                                      Limite de turno
                                    </th>
                                    <th>
                                      Horario
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                  </thead>
                                  <tbody class=" tablescrol text-center" data-spy="scroll">
                                      @foreach ($turnos->getFichos() as $item)
                                      <tr>
                                        <td>
                                          {{ $loop->iteration }}
                                        </td>
                                        <td >
                                            <div class="badge badge-primary text-wrap" style="width: 6rem; font-size: 15px;">
                                                {{$item->fecha}}
                                            </div>
                                        </td>
                                        <td>
                                          {{ $item->turnosdeldia }}
                                        </td>
                                        <td>
                                           {{ $item->numerodeturnos }}
                                        </td>
                                        <td>
                                          {{ $item->horario }}
                                        </td>
                                        <td>
                                            <a rel="tooltip" class="Editlimite btn btn-success btn-link" href="#"
                                                data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
              </div>
        </div>
    </div>
    </div>
    @include('layouts.footers.auth')
  </div>
  @endif
</div>


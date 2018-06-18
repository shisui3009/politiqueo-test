<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="section-politico">
    <div class="container">
        <h2>Informacion Personal</h2>
        <hr>
        <div class="row">
            <div class="col-md-2" align="center">
                <figure class="figure">
                    <img src="<?php echo $dataPolitico['imagen']?>" height="100" width="100">
                </figure>
            </div>
            <div class="col-md-10">
                <form>
                    <div class="form-group row">
                        <label for="nombreP" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nombreP" value="<?php echo $dataPolitico['nombres']." ".$dataPolitico['apellidos']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edadP" class="col-sm-2 col-form-label">Edad</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="edadP" value="<?php echo $diff = abs(date('Y-m-d') - $dataPolitico['fec_nacimiento']);?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bancadaP" class="col-sm-2 col-form-label">Bancada</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="bancadaP" value="<?php echo $dataPolitico['nombre']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="representaP" class="col-sm-2 col-form-label">Representa</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="representaP" value="<?php echo $dataPolitico['representa']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="condicionP" class="col-sm-2 col-form-label">Condicion</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="condicionP" value="<?php echo $dataPolitico['condicion']?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <h2>Formación academica</h2>
            <?php for ($i=0; $i < count($data_academica); $i++) {?>
            <table class="table tarjeta table-sm">
                <thead class="btn-peru">
                    <tr>
                        <th>Estudios </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <th>Grado</th>
                        <td><?php  echo $data_academica[$i]['nombre'];?></td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td><?php  echo $data_academica[$i]['descripcion'];?></td>
                    </tr>
                    <tr>
                        <th>Año de inicio</th>
                        <td><?php echo $data_academica[$i]['fec_inicio']; ?></td>
                    </tr>
                    <tr>
                        <th>Año de finalización</th>
                        <td><?php echo $data_academica[$i]['fec_fin']; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <?php } ?>
        </div>
        <hr>
        <div class="row">
            <h2>Historial de cargos públicos</h2>
            <?php for ($i=0; $i < count($data_cargos); $i++) {?>
            <table class="table tarjeta table-sm">
                <thead class="btn-peru">
                    <tr>
                        <th>Cargo Ocupado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <th>Descripción</th>
                        <td><?php echo $data_cargos[$i]['descripcion']; ?></td>
                    </tr>
                    <tr>
                        <th>Año de inicio</th>
                        <td><?php echo $data_cargos[$i]['fec_inicio']; ?></td>
                    </tr>
                    <tr>
                        <th>Año de finalización</th>
                        <td><?php echo $data_cargos[$i]['fec_fin']; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <?php } ?>
        </div>
        <hr>
        <h2>Casos de corrupcion implicados</h2>
            <?php for ($i=0; $i < count($data_delitos); $i++) {
                    if(($i%4) == 0){?>
                        <div class="row"><?php } ?>
                            <div class="col-md-3">
                                <div class="card mb-3 border-default btn-peru" style="max-width: 18rem;">
                                    <div class="card-header border-default">Caso N° <?php echo $i+1; ?></div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $data_delitos[$i]['nombre'];?></h5>
                                        <p class="card-text"><?php echo $data_delitos[$i]['descripcion']; ?></p>
                                    </div>
                                    <div class="card-footer border-default">
                                        <h5 class="card-text">Fecha Registrada:</h5>
                                        <h5 class="card-text"><?php echo $data_delitos[$i]['fec']; ?></h5>
                                    </div>
                                </div>
                            </div>
                    <?php if(($i%4) == 3) {?></div>
            <hr>
             <?php }} ?>
        <hr>
    </div>
</section>

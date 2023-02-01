<?php
if (isset($_POST['envio'])) {
  include "servicios/datoscorreo.php";
  if($correo != null){
    include "servicios/correos.php";
  }
}
include "servicios/cargarinvernaderos.php";
header("Refresh:5");


?>

<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
<table class="table table-striped">
<thead>
<tr>
    <th scope="col">N°</th>
    <th scope="col">Cultivo</th>
    <th scope="col">Temperatura Mínima</th>
    <th scope="col">Temperatura Máxima</th>
    <th scope="col">Humedad Mínima</th>
    <th scope="col">Humedad Máxima</th>
    <th scope="col">Fecha de Registro</th>
    <th scope="col">Temperatura Actual</th>
    <th scope="col">Humedad Actual</th>
</tr>
</thead>
  <tbody>
      <?php
      
        if($result != null){
            $obj = json_decode($resultJSON);
            $val = json_decode(json_encode($obj),true);
        
        for ($i=0; $i <sizeof($val) ; $i++) { 
      ?>
    <tr>
        <td><?php echo $val[$i]['numero']; ?></td>
        <td><?php echo $val[$i]['cultivo']; ?></td>
        <td><?php echo $val[$i]['min_temp']." °C"; ?></td>
        <td><?php echo $val[$i]['max_temp']." °C"; ?></td>
        <td><?php echo $val[$i]['min_hum']." %"; ?></td>
        <td><?php echo $val[$i]['max_hum']." %"; ?></td>
        <td><?php if ($val[$i]['fecha'] == null){echo "0000-00-00 00:00:00";}else{echo $val[$i]['fecha'];}?></td>
        <td><?php if ($val[$i]['temperaturamedida'] == null){echo "0.0 °C";}else{echo $val[$i]['temperaturamedida']." °C";} ?></td>
        <td><?php if ($val[$i]['humedadmedida'] == null){echo "0.0 %";}else{echo $val[$i]['humedadmedida']." %";} ?></td>
        <td><form  method="POST">
        <input type="text" class="form-control" name="creador" id="creador" value="<?php echo $val[$i]['creador']; ?>" hidden>
                <button type="submit" class="form-control" id="envio" name="envio" style="background-color:green; color:white">Notificar</button>
              </form>
        </td>
        
        </tr>
    <?php   
    }}else{
    ?>
    <tr>
        <td colspan="3">No existen invernaderos registrados</td>
    </tr>
    <?php
    }?>
</tbody>
</table>

</div>

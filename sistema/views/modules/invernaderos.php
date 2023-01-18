<?php
include "servicios/cargarinvernaderos.php";
header("Refresh:15");
?>
<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">

<table class="table table-striped">
<thead>
<tr>
    <th scope="col">N°</th>
    <th scope="col">Cultivo</th>
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
        <td><?php echo $val[$i]['temperatura']; ?></td>
        <td><?php echo $val[$i]['humedad']; ?></td>
        
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

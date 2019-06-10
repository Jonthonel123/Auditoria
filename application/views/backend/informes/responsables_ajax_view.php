<?php
foreach ($responsables as $responsable) {
  ?>
  <option value="<?php echo $responsable->responsable; ?>"><?php echo $responsable->responsable; ?></option>
<?php
}
?>
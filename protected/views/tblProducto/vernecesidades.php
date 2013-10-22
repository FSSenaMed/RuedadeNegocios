<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $dataProvider=new CActiveDataProvider('TblProductos');
 
       $this->widget('zii.widgets.grid.CGridView', array(
       'dataProvider'=>$dataProvider,
 )); ?>
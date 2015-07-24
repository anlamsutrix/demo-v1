
<?php if (isset($message) && !empty($message)) { ?>
<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php }?>
<?php echo form_label('Cate Name :'); ?> <?php echo form_error('name'); ?><br />
<?php echo form_input(array('id' => 'name', 'name' => 'name', 'value' => isset($query) ? $query->name:'')); ?><br />

<?php echo form_submit(array('id' => 'submit','name' => 'submit', 'value' => 'Submit')); ?>

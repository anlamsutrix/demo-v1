<?php if (isset($message) && !empty($message)) { ?>
<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php } ?>
<!--<div id="gallery">
	<?php// if (isset($images)):
                //foreach($images as $image):	?>
                <div class="thumb">
                        <a href="<?php //echo $image['url']; ?>">
                                <img src="<?php //echo $image['thumb_url']; ?>" />
                        </a>
                </div>
        <?php //endforeach; else: ?>
                <div id="blank_gallery">Please Upload an Image</div>
        <?php //endif; ?>
</div>-->
<?php
foreach ($query_cate as $item_cate):
    $options[$item_cate->id] = $item_cate->name;
endforeach;
?>
<?php echo form_label('Cate Name :'); ?> <?php echo form_error('cate_id'); ?><br />
<p><?php echo form_dropdown('cate',$options, $query->cate_id); ?></p>

<?php echo form_label('Product Name :'); ?> <?php echo form_error('name'); ?><br />
<?php echo form_input(array('id' => 'name', 'name' => 'name', 'value' => isset($query) ? $query->name:'')); ?><br />
<?php if(isset($query) && !empty($query) && !empty($query->image)){ ?>
<p><img src="<?php echo isset($query) ? $query->image:'' ?>" /></p>
<?php }?>
<p><?php //echo form_hidden('img', $fetch->img); ?></p>
<p><?php echo form_upload(array('id' => 'img', 'name' => 'img')); ?></p>
<?php echo form_label('Product Content :'); ?> <?php echo form_error('content'); ?><br />
<p><?php echo form_textarea(array('id' => 'content', 'name' => 'content', 'value'=> isset($query) ? $query->content:'')); ?></p>
<?php echo form_submit(array('id' => 'submit','name'=>'submit', 'value' => 'Submit')); ?>



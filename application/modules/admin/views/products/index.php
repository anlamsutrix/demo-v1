<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>List cate</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<?php $this->load->helper('date'); ?>
<div id="container">

	<h1>List Category:</h1>
        <?php if (isset($message) && !empty($message)) { ?>
        <CENTER><h3 style="color:green;"><?php echo $message; ?></h3></CENTER><br>
        <?php } ?>
        <p><a href="http://localhost/testcode/index.php/admin/products/add">Add Product</a></p>
	<div id="body">
            <table width="100%">
                <tr>
                    <td>ID</td>
                    <td>IMAGE</td>
                    <td>CATE NAME</td>
                    <td>NAME</td>
                    <td>DATE</td>
                    <td></td>
                </tr>
                <?php foreach ($query as $pro_items) :
                    $datestring = '%Y-%m-%d : %h:%i %a';
                    $time = $pro_items->date;
                ?>
                <tr>
                    <td><?php echo $pro_items->id;?></td>
                    <td><img src="<?php echo $pro_items->image;?>" width="70" height="50"/></td>
                    <td><?php echo $pro_items->cate_name;?></td>
                    <td><?php echo $pro_items->pro_name;?></td>
                    <td><?php echo mdate($datestring, $time);?></td>
                    <td><a href="http://localhost/testcode/index.php/admin/products/update/<?php echo $pro_items->id; ?>">Edit</a></td>
                </tr>
                <?php endforeach ?>
            </table>
            <p><?php echo $links; ?></p>
	</div>
</div>

</body>
</html>
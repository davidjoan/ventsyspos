<?php $__env->startSection('title', __('barcode.print_labels')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
<br>
    <h1><?php echo e(app('translator')->getFromJson('barcode.print_labels')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.print_label') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content no-print">
	<?php echo Form::open(['url' => '#', 'method' => 'post', 'id' => 'preview_setting_form', 'onsubmit' => 'return false']); ?>

	<div class="box box-solid">
		<div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('product.add_product_for_labels')); ?></h3>
       	</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-search"></i>
							</span>
							<?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product_for_label', 'placeholder' => __('lang_v1.enter_product_name_to_print_labels'), 'autofocus']);; ?>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<table class="table table-bordered table-striped table-condensed" id="product_table">
						<thead>
							<tr>
								<th class="col-sm-8"><?php echo e(app('translator')->getFromJson( 'barcode.products' )); ?></th>
								<th class="col-sm-4"><?php echo e(app('translator')->getFromJson( 'barcode.no_of_labels' )); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php echo $__env->make('labels.partials.show_table_rows', ['index' => 0], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div> <!--box end-->
	
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'barcode.info_in_labels' )); ?></h3>
        </div>

		<div class="box-body">
			<div class="row">
				<div class="col-sm-3">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" checked name="print[name]" value="1"> <b><?php echo e(app('translator')->getFromJson( 'barcode.print_name' )); ?></b>
					    </label>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" checked name="print[price]" value="1" id="is_show_price"> <b><?php echo e(app('translator')->getFromJson( 'barcode.print_price' )); ?></b>
					    </label>
					</div>
				</div>

				<div class="col-sm-3" id="price_type_div">
					<div class="form-group">
						<?php echo Form::label('print[price_type]', @trans( 'barcode.show_price' ) . ':'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-info"></i>
							</span>
							<?php echo Form::select('print[price_type]', ['inclusive' => __('product.inc_of_tax'), 'exclusive' => __('product.exc_of_tax')], 'inclusive', ['class' => 'form-control']);; ?>

						</div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" checked name="print[business_name]" value="1"> <b><?php echo e(app('translator')->getFromJson( 'barcode.print_business_name' )); ?></b>
					    </label>
					</div>
				</div>

				<div class="col-sm-12">
					<hr/>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('price_type', @trans( 'barcode.barcode_setting' ) . ':'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-cog"></i>
							</span>
							<?php echo Form::select('barcode_setting', $barcode_settings, null, ['class' => 'form-control']);; ?>

						</div>
					</div>
				</div>

				<div class="clearfix"></div>
				
				<div class="col-sm-4 col-sm-offset-8">
					<button type="button" id="labels_preview" class="btn btn-primary pull-right btn-flat btn-block"><?php echo e(app('translator')->getFromJson( 'barcode.preview' )); ?></button>
				</div>
			</div>
		</div>

	</div><!--box end-->
	<?php echo Form::close(); ?>


	<div class="col-sm-8 hide display_label_div">
		<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'barcode.preview' )); ?></h3>
		<button type="button" class="col-sm-offset-2 btn btn-success btn-block" id="print_label">Print</button>
	</div>
	<div class="clearfix"></div>
</section>

<!-- Preview section-->
<div id="preview_box">
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/labels.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('GroupTaxController@update', [$tax_rate->id]), 'method' => 'PUT', 'id' => 'tax_group_edit_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'tax_rate.edit_tax_group' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'tax_rate.name' ) . ':*'); ?>

          <?php echo Form::text('name', $tax_rate->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'tax_rate.name' )]);; ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('taxes[]', __( 'tax_rate.sub_taxes' ) . ':*'); ?>

          <?php echo Form::select('taxes[]', $taxes, $sub_taxes, ['class' => 'form-control select2', 'required', 'multiple']);; ?>

      </div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.update' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modification d'une agence</h3>
            </div>
			<?php echo form_open('agence/edit/'.$tb_am_agence['agence_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="agence_nom" class="control-label"><span class="text-danger">*</span>Nom Agence </label>
						<div class="form-group">
							<input type="text" name="agence_nom" value="<?php echo ($this->input->post('agence_nom') ? $this->input->post('agence_nom') : $tb_am_agence['agence_nom']); ?>" class="form-control" id="agence_nom" />
							<span class="text-danger"><?php echo form_error('agence_nom');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="agence_responsable" class="control-label">Nom Responsable agence</label>
						<div class="form-group">
							<input type="text" name="agence_responsable" value="<?php echo ($this->input->post('agence_responsable') ? $this->input->post('agence_responsable') : $tb_am_agence['agence_responsable']); ?>" class="form-control" id="agence_responsable" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="agence_code" class="control-label"><span class="text-danger">*</span>Code Agence </label>
						<div class="form-group">
							<input type="text" name="agence_code" value="<?php echo ($this->input->post('agence_code') ? $this->input->post('agence_code') : $tb_am_agence['agence_code']); ?>" class="form-control" id="agence_code" />
							<span class="text-danger"><?php echo form_error('agence_code');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="agence_adresse" class="control-label"><span class="text-danger">*</span>Adresse Agence </label>
						<div class="form-group">
							<textarea name="agence_adresse" class="form-control" id="agence_adresse"><?php echo ($this->input->post('agence_adresse') ? $this->input->post('agence_adresse') : $tb_am_agence['agence_adresse']); ?></textarea>
							<span class="text-danger"><?php echo form_error('agence_adresse');?></span>
						</div>
					</div>
					
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
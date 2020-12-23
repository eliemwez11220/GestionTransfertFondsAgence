<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ajouter un nouveau Client</h3>
            </div>
            <?php echo form_open('client/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="client_fullname" class="control-label"><span class="text-danger">*</span>Nom complet</label>
						<div class="form-group">
							<input type="text" name="client_fullname" value="<?php echo $this->input->post('client_fullname'); ?>" class="form-control" id="client_fullname" />
							<span class="text-danger"><?php echo form_error('client_fullname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="client_email" class="control-label">Adresse Email</label>
						<div class="form-group">
							<input type="text" name="client_email" value="<?php echo $this->input->post('client_email'); ?>" class="form-control" id="client_email" />
							<span class="text-danger"><?php echo form_error('client_email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="client_profession" class="control-label">Profession</label>
						<div class="form-group">
							<input type="text" name="client_profession" value="<?php echo $this->input->post('client_profession'); ?>" class="form-control" id="client_profession" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="client_type" class="control-label">Type client</label>
						<div class="form-group">
							<select name="client_type" class="form-control">
								<option value="">Selectionnez le type client</option>
								<?php 
								$agence_type_values = array(
									'Expediteur'=>'Client Expediteur',
									'Beneficiaire'=>'Client  Beneficiaire',
								);

								foreach($agence_type_values as $value => $display_text)
								{
									$selected = ($value == $tb_am_client['client_type']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('client_type');?></span>

						</div>
					</div>

					<div class="col-md-6">
						<label for="client_phone" class="control-label">Client Phone</label>
						<div class="form-group">
							<input type="text" name="client_phone" value="<?php echo $this->input->post('client_phone'); ?>" class="form-control" id="client_phone" />
							<span class="text-danger"><?php echo form_error('client_phone');?></span>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="client_adresse" class="control-label">Client Adresse</label>
						<div class="form-group">
							<textarea name="client_adresse" class="form-control" id="client_adresse"><?php echo $this->input->post('client_adresse'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Enregistrer client
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
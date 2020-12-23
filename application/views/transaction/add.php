<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Creation d'une Transaction</h3>
              	<div class="box-tools">
                    <a href="<?php echo site_url('transaction/index'); ?>" class="btn btn-success btn-sm">
                    Liste transactions</a> 
                </div>
            </div>

            <?php echo form_open('transaction/add'); ?>
          	<div class="box-body">
          		<div class="text-center ">
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger"><?= $error; ?></div>
                        <?php } elseif (isset($success)) { ?>
                            <div class="alert alert-success"><?= $success; ?></div>
                        <?php } else { ?>
                            <b>Educazad Application</b>!
                            <p>Connectez-vous pour démarrer votre session.</p>
                        <?php } ?>
                    </div>
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="transac_monnaie" class="control-label">Monnaie Transaction </label>
						<div class="form-group">
							<select name="transac_monnaie" class="form-control">
								<option value="">Selectionnez monnaie</option>
								<?php 
								$transac_monnaie_values = array(
									'USD'=>'Dollars Américains USD',
									'CDF'=>'Francs Congolais CDF',
								);

								foreach($transac_monnaie_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('transac_monnaie')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_type" class="control-label">Type Transaction </label>
						<div class="form-group">
							<select name="transac_type" class="form-control">
								<option value="">Selectionnez type</option>
								<?php 
								$transac_type_values = array(
									'Envoie'=>'Envoie Argent',
									'Retrait'=>'Retrait Argent',
								);

								foreach($transac_type_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('transac_type')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="provenance" class="control-label"><span class="text-danger">*</span>Agence Provenance</label>
						<div class="form-group">
							<select name="provenance" class="form-control">
								<option value="">Selectionnez Provenance</option>
								<?php 
								foreach($all_tb_am_agences as $tb_am_agence)
								{
									$selected = ($tb_am_agence['agence_id'] == $this->input->post('provenance')) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_agence['agence_id'].'" '.$selected.'>'.$tb_am_agence['agence_nom'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('provenance');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="destination" class="control-label"><span class="text-danger">*</span>Agence Destination</label>
						<div class="form-group">
							<select name="destination" class="form-control">
								<option value="">Selectionnez une destination</option>
								<?php 
								foreach($all_tb_am_agences as $tb_am_agence)
								{
									$selected = ($tb_am_agence['agence_id'] == $this->input->post('destination')) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_agence['agence_id'].'" '.$selected.'>'.$tb_am_agence['agence_nom'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('destination');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="client_sid" class="control-label"><span class="text-danger">*</span>Client Expediteur</label>
						<div class="form-group">
							<select name="client_sid" class="form-control">
								<option value="">Selectionnez expediteur</option>
								<?php 
								foreach($all_tb_am_clients as $tb_am_client)
								{
									$selected = ($tb_am_client['client_id'] == $this->input->post('client_sid')) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_client['client_id'].'" '.$selected.'>'.$tb_am_client['client_fullname'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('client_sid');?></span>
						</div>
					</div>
					
				<div class="col-md-6">
						<label for="client_benef" class="control-label"><span class="text-danger">*</span>Client Beneficiaire</label>
						<div class="form-group">
							<select name="client_benef" class="form-control">
								<option value="">Selectionnez Beneficiaire</option>
								<?php 
								foreach($all_tb_am_clients as $client_benef)
								{
									$selected = ($client_benef['client_id'] == $this->input->post('client_sid')) ? ' selected="selected"' : "";

									echo '<option value="'.$client_benef['client_id'].'" '.$selected.'>'.$client_benef['client_fullname'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('client_sid');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_code" class="control-label"><span class="text-danger">*</span>Code Transaction</label>
						<div class="form-group">
							<input type="text" name="transac_code" value="<?php echo $this->input->post('transac_code'); ?>" class="form-control" id="transac_code" />
							<span class="text-danger"><?php echo form_error('transac_code');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_montant" class="control-label">Montant Depose par client </label>
						<div class="form-group">
							<input type="number" name="transac_montant" value="<?php echo $this->input->post('transac_montant'); ?>" class="form-control" id="transac_montant" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_pourc" class="control-label"> Pourcentage de la Transaction</label>
						<div class="form-group">
							<input type="number" name="transac_pourc" value="<?php echo $this->input->post('transac_pourc'); ?>" class="form-control" id="transac_pourc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_taux" class="control-label">Taux de la Transaction</label>
						<div class="form-group">
							<input type="number" name="transac_taux" value="<?php echo $this->input->post('transac_taux'); ?>" class="form-control" id="transac_taux" />
						</div>
					</div>
					
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Enregistrer transaction
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
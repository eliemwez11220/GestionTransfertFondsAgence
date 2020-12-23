<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modification Transaction</h3>
              	<div class="box-tools">
                    <a href="<?php echo site_url('transaction/index'); ?>" class="btn btn-success btn-sm">
                    Liste transactions</a> 
                </div>
            </div>
			<?php echo form_open('transaction/edit/'.$tb_am_transaction['transac_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="transac_monnaie" class="control-label">Transac Monnaie</label>
						<div class="form-group">
							<select name="transac_monnaie" class="form-control">
								<option value="">Selectionnez la monnaie</option>
								<?php 
								$transac_monnaie_values = array(
									'USD'=>'Dollars Américains USD',
									'CDF'=>'Francs Congolais CDF',
								);

								foreach($transac_monnaie_values as $value => $display_text)
								{
									$selected = ($value == $tb_am_transaction['transac_monnaie']) ? ' selected="selected"' : "";

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
								<option value="">Selectionnez un type</option>
								<?php 
								$transac_type_values = array(
									'Envoie'=>'Envoie Argent',
									'Retrait'=>'Retrait Argent',
								);

								foreach($transac_type_values as $value => $display_text)
								{
									$selected = ($value == $tb_am_transaction['transac_type']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="provenance" class="control-label"><span class="text-danger">*</span>Agence de provenance</label>
						<div class="form-group">
							<select name="provenance" class="form-control">
								<option value="">Selectionnez une provenance</option>
								<?php 
								foreach($all_tb_am_agences as $tb_am_agence)
								{
									$selected = ($tb_am_agence['agence_id'] == $tb_am_transaction['provenance']) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_agence['agence_id'].'" '.$selected.'>'.$tb_am_agence['agence_nom'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('provenance');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="destination" class="control-label"><span class="text-danger">*</span>Agence destination</label>
						<div class="form-group">
							<select name="destination" class="form-control">
								<option value="">Selectionnez une destination</option>
								<?php 
								foreach($all_tb_am_agences as $tb_am_agence)
								{
									$selected = ($tb_am_agence['agence_id'] == $tb_am_transaction['destination']) ? ' selected="selected"' : "";

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
								<option value="">Selectionnez un expediteur</option>
								<?php 
								foreach($all_tb_am_clients as $tb_am_client)
								{
									$selected = ($tb_am_client['client_id'] == $tb_am_transaction['client_sid']) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_client['client_id'].'" '.$selected.'>'.$tb_am_client['client_fullname'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('client_sid');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="beneficiaire_sid" class="control-label"><span class="text-danger">*</span>Client Beneficiaire</label>
						<div class="form-group">
							<select name="beneficiaire_sid" class="form-control">
								<option value="">Selectionnez un Beneficiaire</option>
								<?php 
								foreach($all_tb_am_clients as $tb_am_client)
								{
									$selected = ($tb_am_client['client_id'] == $tb_am_transaction['beneficiaire_sid']) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_client['client_id'].'" '.$selected.'>'.$tb_am_client['client_fullname'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('beneficiaire_sid');?></span>
						</div>
					</div>

					<div class="col-md-6">
						<label for="agent_sid" class="control-label">Agent</label>
						<div class="form-group">
							<select name="agent_sid" class="form-control">
								<option value="">select tb_am_user</option>
								<?php 
								foreach($all_tb_am_users as $tb_am_user)
								{
									$selected = ($tb_am_user['id_asset'] == $tb_am_transaction['agent_sid']) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_user['id_asset'].'" '.$selected.'>'.$tb_am_user['asset_fullname'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_code" class="control-label"><span class="text-danger">*</span>Code Transaction </label>
						<div class="form-group">
							<input type="text" name="transac_code" value="<?php echo ($this->input->post('transac_code') ? $this->input->post('transac_code') : $tb_am_transaction['transac_code']); ?>" class="form-control" id="transac_code" readonly/>
							<span class="text-danger"><?php echo form_error('transac_code');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_montant" class="control-label">Montant Transaction </label>
						<div class="form-group">
							<input type="text" name="transac_montant" value="<?php echo ($this->input->post('transac_montant') ? $this->input->post('transac_montant') : $tb_am_transaction['transac_montant']); ?>" class="form-control" id="transac_montant" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_pourc" class="control-label">Transac Pourc</label>
						<div class="form-group">
							<input type="text" name="transac_pourc" value="<?php echo ($this->input->post('transac_pourc') ? $this->input->post('transac_pourc') : $tb_am_transaction['transac_pourc']); ?>" class="form-control" id="transac_pourc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="transac_taux" class="control-label">Transac Taux</label>
						<div class="form-group">
							<input type="text" name="transac_taux" value="<?php echo ($this->input->post('transac_taux') ? $this->input->post('transac_taux') : $tb_am_transaction['transac_taux']); ?>" class="form-control" id="transac_taux" />
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="montant_caisse" class="control-label">Montant Caisse</label>
						<div class="form-group">
							<input type="text" name="montant_caisse" value="<?php echo ($this->input->post('montant_caisse') ? $this->input->post('montant_caisse') : $tb_am_transaction['montant_caisse']); ?>" class="form-control" id="montant_caisse" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="date_created" class="control-label">Date d'envoie</label>
						<div class="form-group">
							<input type="text" name="date_created" value="<?php echo ($this->input->post('date_created') ? $this->input->post('date_created') : $tb_am_transaction['date_created']); ?>" class="form-control" id="date_created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_retrait" class="control-label">Date de retrait</label>
						<div class="form-group">
							<input type="date" name="date_retrait" value="<?php echo ($this->input->post('date_retrait') ? $this->input->post('date_retrait') : $tb_am_transaction['date_retrait']); ?>" class="form-control" id="date_retrait" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Enregistrer modifications
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
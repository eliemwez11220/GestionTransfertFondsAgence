<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Creation bon de transaction</h3>
            </div>
            <?php echo form_open('bons/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="code_sid" class="control-label">Code Transaction</label>
						<div class="form-group">
							<select name="code_sid" class="form-control">
								<option value="">Selectionnez une transaction</option>
								<?php 
								foreach($all_tb_am_transactions as $tb_am_transaction)
								{
									$selected = ($tb_am_transaction['transac_id'] == $this->input->post('code_sid')) ? ' selected="selected"' : "";

									echo '<option value="'.$tb_am_transaction['transac_id'].'" '.$selected.'>'.$tb_am_transaction['transac_code'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="bon_type" class="control-label">Bon Type</label>
						<div class="form-group">
							<select name="bon_type" class="form-control">
								<option value="">Selectionnez type bon</option>
								<?php 
								$bon_type_values = array(
									'Envoie'=>'Bon d\'envoie',
									'Retrait'=>'Bon de retrait',
								);

								foreach($bon_type_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('bon_type')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					<div class="col-md-12">
						<label for="bon_comments" class="control-label">Bon Comments</label>
						<div class="form-group">
							<textarea name="bon_comments" class="form-control" id="bon_comments"><?php echo $this->input->post('bon_comments'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Creer bon
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tb Am Bon Edit</h3>
            </div>
			<?php echo form_open('bons/edit/'.$tb_am_bon['bon_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="code_sid" class="control-label">Tb Am Transaction</label>
						<div class="form-group">
							<select name="code_sid" class="form-control">
								<option value="">select tb_am_transaction</option>
								<?php 
								foreach($all_tb_am_transactions as $tb_am_transaction)
								{
									$selected = ($tb_am_transaction['transac_id'] == $tb_am_bon['code_sid']) ? ' selected="selected"' : "";

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
								<option value="">select</option>
								<?php 
								$bon_type_values = array(
									'Envoie'=>'Bon d'envoie',
									'Retrait'=>'Bon de retrait',
								);

								foreach($bon_type_values as $value => $display_text)
								{
									$selected = ($value == $tb_am_bon['bon_type']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="bon_created" class="control-label">Bon Created</label>
						<div class="form-group">
							<input type="text" name="bon_created" value="<?php echo ($this->input->post('bon_created') ? $this->input->post('bon_created') : $tb_am_bon['bon_created']); ?>" class="form-control" id="bon_created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="bon_comments" class="control-label">Bon Comments</label>
						<div class="form-group">
							<textarea name="bon_comments" class="form-control" id="bon_comments"><?php echo ($this->input->post('bon_comments') ? $this->input->post('bon_comments') : $tb_am_bon['bon_comments']); ?></textarea>
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
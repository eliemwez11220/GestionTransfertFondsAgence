<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listing Clients </h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('client/add'); ?>" class="btn btn-success btn-sm">Creer un nouveau client</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-sm table-responsive">
                    <tr>
						<th>ID</th>
						<th>Nom complet</th>
						<th>Email</th>
						<th>Profession</th>
						<th>Type</th>
						<th>Telephone</th>
						<th>Adresse</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tb_am_clients as $t){ ?>
                    <tr>
						<td><?php echo $t['client_id']; ?></td>
						<td><?php echo $t['client_fullname']; ?></td>
						<td><?php echo $t['client_email']; ?></td>
						<td><?php echo $t['client_profession']; ?></td>
						<td><?php echo $t['client_type']; ?></td>
						<td><?php echo $t['client_phone']; ?></td>
						<td><?php echo $t['client_adresse']; ?></td>
						<td>
                            <a href="<?php echo site_url('client/edit/'.$t['client_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modifier</a> 

                             <?php if($this->session->fonction !== "guichetier"){ ?>
                             <a href="<?php echo site_url('client/remove/'.$t['client_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Supprimer</a>
                             <?php } ?>
                             
                           
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>

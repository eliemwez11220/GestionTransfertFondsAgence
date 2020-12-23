<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listing des Agences</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('agence/add'); ?>" class="btn btn-success btn-sm">Creer une nouvelle agence</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-sm table-responsive">
                    <tr>
						<th>ID</th>
						<th>Nom Agence </th>
						<th>Code Agence </th>
						<th>Adresse Agence </th>
                        <th>Responsable</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tb_am_agences as $t){ ?>
                    <tr>
						<td><?php echo $t['agence_id']; ?></td>
						<td><?php echo $t['agence_nom']; ?></td>
						
						<td><?php echo $t['agence_code']; ?></td>
						<td><?php echo $t['agence_adresse']; ?></td>
                        <td><?php echo $t['agence_responsable']; ?></td>
						<td>
                            <a href="<?php echo site_url('agence/edit/'.$t['agence_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modifier</a> 

                             <?php if($this->session->fonction !== "guichetier"){ ?>
                            <a href="<?php echo site_url('agence/remove/'.$t['agence_id']); ?>" class="btn btn-danger btn-xs mt-1"><span class="fa fa-trash"></span> Supprimer</a>
                           
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

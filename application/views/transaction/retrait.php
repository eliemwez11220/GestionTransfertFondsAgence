<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listing Transactions Retraits</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('transaction/index'); ?>" class="btn btn-success btn-sm">
                    Liste transactions</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Destination</th>
                        <th>Beneficiaire</th>
                        <th>Montant</th>
                        <th>Date Retrait</th>
                        <th>Statut</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    <?php foreach($tb_am_transactions as $t){ 
                        //if($t->transac_statut !== 'encours')
                        ?>
                    <tr>
                        <td><?php echo $t->transac_id; ?></td>
                        <td><?php echo $t->transac_code; ?></td>
                        <td><?php echo $t->agence_nom; ?></td>
                        <td><?php echo $t->client_fullname; ?></td>
                        <td><?php echo $t->transac_montant; ?></td>
                        <td><?php echo $t->date_retrait; ?></td>
                        <td><?php echo $t->transac_statut; ?></td>
                        <td class="text-right">
                            <?php if($t->transac_statut == "encours") { ?>
                                <a href="<?php echo site_url('transaction/edit/'.$t->transac_id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Valider</a>
                            <?php } ?>
                         
                            <?php if($this->session->fonction !== "guichetier"){ ?>
                            <a href="<?php echo site_url('transaction/remove/'.$t->transac_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Supprimer</a>
                             <?php } ?>
                            <a href="<?php echo site_url('transaction/view/'.$t->transac_id); ?>" class="btn btn-primary btn-xs"><span class="fa fa-eye"></span> Details</a>
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

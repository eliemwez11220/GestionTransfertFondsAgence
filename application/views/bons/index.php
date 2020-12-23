<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tb Am Bons Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('bons/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Bon Id</th>
						<th>Code Sid</th>
						<th>Bon Type</th>
						<th>Bon Created</th>
						<th>Bon Comments</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tb_am_bons as $t){ ?>
                    <tr>
						<td><?php echo $t['bon_id']; ?></td>
						<td><?php echo $t['code_sid']; ?></td>
						<td><?php echo $t['bon_type']; ?></td>
						<td><?php echo $t['bon_created']; ?></td>
						<td><?php echo $t['bon_comments']; ?></td>
						<td>
                            <a href="<?php echo site_url('bons/edit/'.$t['bon_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('bons/remove/'.$t['bon_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

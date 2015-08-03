<div class="user-panel">
	<div class="pull-left image">
		<img src="<?php echo base_url(); ?>Images/users/<?php echo $this->session->userdata("imagen"); ?>" class="img-circle" alt="User Image" />
	</div>
	<div class="pull-left info">
		<p><?php echo $this->session->userdata('nombres'); ?></p>

		<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	</div>
</div>

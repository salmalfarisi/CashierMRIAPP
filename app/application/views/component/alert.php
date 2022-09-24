			<?php if($this->session->flashdata('color') == 'success') { ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'danger') { ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'primary') { ?>
			<div class="alert alert-primary" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'secondary') { ?>
			<div class="alert alert-secondary" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'success') { ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'danger') { ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'warning') { ?>
			<div class="alert alert-warning" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'info') { ?>
			<div class="alert alert-info" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'light') { ?>
			<div class="alert alert-light" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } elseif($this->session->flashdata('color') == 'dark') { ?>
			<div class="alert alert-dark" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } ?>
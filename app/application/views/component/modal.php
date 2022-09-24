	<!-- Modal -->
	<div class="modal fade" id="<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $id; ?>" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content <?php echo $color; ?> <?php if($color == '' or $color == 'bg-warning') { echo 'text-black'; } else { echo 'text-white'; }?>">
		  <div class="modal-header">
			<h5 class="modal-title" id="<?php echo $judulmodal; ?>">Modal</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<?php 
				if($body != []) 
				{ 
					foreach($body as $bodyform) {
						$setbodyform['form'] = $bodyform;
						$this->view('component/form', $setbodyform);
					}
				} 
			?>
		  </div>
		  <div class="modal-footer">
			<?php 
				if($is_link == true)
				{
					$button = [];
					$button['href'] = '#';
					$button['color'] = 'bg-info';
					$button['command'] = 'Yes';
					$button['type'] = 'link';
					$button['data'] = [];
					$button['jquery'] = '';
					$button['id'] = 'linkmodal';
					$this->view('component/button', $button);
				} 
			?>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
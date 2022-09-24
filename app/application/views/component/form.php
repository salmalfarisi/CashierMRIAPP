				<?php if($form['type'] == 'text') { ?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="text" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php echo $form['data']; ?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'number') { ?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="number" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php echo $form['data']; ?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'textarea') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<textarea class="form-control" rows="6" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> ><?php if($form['data'] != '') { echo $form['data']; } ?></textarea>
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'checkbox') {?>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
					<label class="form-check-label" for="<?php echo $form['name']?>">
						<?php 
							if($form['label'] == '') 
							{ 
								echo ucwords($form['name']); 
							} 
							else 
							{ 
								echo ucwords($form['label']); 
							} 
						?>
					</label>
				</div>
				<?php } elseif($form['type'] == 'date') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="date" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php $date=date_create($form['data']); echo date_format($date,"Y-m-d");?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'datetime-local') { // masih bermasalah ?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="datetime-local" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php echo strtotime($form['data']);?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'email') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="email" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php echo $form['data']; ?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'file') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="set<?php echo $form['name']?>">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'hidden') {?>
				<input type="hidden" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php echo $form['data']; ?>" <?php } ?> >
				<?php } elseif($form['type'] == 'month') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="month" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php $date=date_create($form['data']); echo date_format($date,"Y-m");?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'password') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">Password</label>
					<input type="password" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'radio') {?>
				<div class="form-inline my-2">
					<label class="form-group" for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<?php if($form['option'] != []) { $i = 0; foreach($form['option'] as $datapilihan) { ?>
					<div class=" mx-5 custom-control custom-radio custom-control-inline">
						<input type="radio" id="set<?php echo $form['name'].$i; ?>" name="<?php echo $form['name']; ?>" class="custom-control-input" value="<?php echo $datapilihan['id']; ?>" <?php if ($datapilihan['id'] != [] and $datapilihan['id'] == $form['data']) { ?> checked <?php } ?> >
						<label class="custom-control-label" for="set<?php echo $form['name'].$i; ?>" ><?php echo $datapilihan['value']; ?></label>
					</div>
					<?php $i++; } } ?>
				</div>
				<?php } elseif($form['type'] == 'range') {?>
				<?php } elseif($form['type'] == 'reset') {?>
				<input type="reset" class="btn btn-md btn-dark" value="<?php echo $form['label']; ?>" id="set<?php echo $form['name']?>">
				<?php } elseif($form['type'] == 'time') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="time" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php $date=date_create($form['data']); echo date_format($date,"H:i");?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'url') {?>
				<div class="form-group">
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<input type="url" class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>" <?php echo $form['attribute']; ?> <?php if($form['data'] != '') { ?> value="<?php echo $form['data']; ?>" <?php } ?> >
					<small class="text-danger"><?php echo $form['message']; ?></small>
				</div>
				<?php } elseif($form['type'] == 'select') { ?>
				<div class="form-group">	
					<label for="<?php echo $form['name']; ?>">
					<?php 
						if($form['label'] == '') 
						{ 
							echo ucwords($form['name']); 
						} 
						else 
						{ 
							echo ucwords($form['label']); 
						} 
					?>
					</label>
					<select class="form-control" id="set<?php echo $form['name']?>" name="<?php echo $form['name']; ?>">
					<?php if($form['option'] != []) { foreach($form['option'] as $datapilihan) { ?>
						<option value="<?php echo $datapilihan['id']; ?>" <?php echo ($datapilihan['id'] != [] and $datapilihan['id'] == $form['data']) ? 'selected' : '' ;?> ><?php echo $datapilihan['value']; ?></option>
					<?php } } ?>
					</select>
				</div>
				<?php } elseif($form['type'] == 'confirmation') {?>
				<div class="form-group">
					<label id="show<?php echo $form['name']; ?>"><?php echo $form['data']; ?></label>
				</div>
				<?php } ?>
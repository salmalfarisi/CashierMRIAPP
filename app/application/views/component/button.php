					 <?php
						if($color == '' or $color == 'bg-warning') 
						{
							$color = $color.' text-black'; 
						} 
						else 
						{ 
							$color = $color.' text-white'; 
						} 
					?>
					
					<?php if($type == 'button') { ?>
					<button <?php if($id != null) { ?>id="<?php echo $id; ?>"<?php } ?> class="btn btn-small mx-2 <?php echo $color; ?>" type="button" <?php echo $jquery; ?>><?php echo $command; ?></button>
					<?php } elseif($type == 'submit') { ?>
					<button <?php if($id != null) { ?>id="<?php echo $id; ?>"<?php } ?> class="btn btn-small mx-2 <?php echo $color; ?>" type="submit"><?php echo $command; ?></button>
					<?php } elseif($type == 'modal') { ?>
					<button <?php if($id != null) { ?>id="<?php echo $id; ?>"<?php } ?> class="btn btn-small mx-2 <?php echo $color; ?>" type="button" data-toggle="modal" data-perintah="<?php echo $command; ?>" <?php echo $jquery; ?> <?php foreach ($data as $key => $value) { if($key != '_id') { $inserthtml = 'data-'.$key.'="'.$value.'"'; echo $inserthtml; }} ?>><?php echo $command; ?></button>
					<?php } elseif($type == 'link') { ?>
					<a <?php if($id != null) { ?>id="<?php echo $id; ?>"<?php } ?> href="<?php echo $href; ?>" class="btn btn-small mx-2 <?php echo $color; ?>" <?php echo $jquery; ?>><?php echo $command; ?></a>
					<?php } ?>
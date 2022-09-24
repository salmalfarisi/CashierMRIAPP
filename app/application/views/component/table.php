				<table class="table table-sm table-bordered">
					<thead>
						<tr>
							<th scope="col" class="text-center">No</th>
							<?php foreach($title as $showtitle){?>
								<th><?php echo $showtitle; ?></th>
							<?php } ?>
							<?php if($url != []){?>
							<th scope="col" class="text-center">Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody style="min-height:200px; max-height:80vh; overflow-y:auto; overflow-x:auto;">
						<?php 
							if($tbody != []){
								$i = 1;
								foreach($tbody as $data)
								{
						?><tr>
							<td class="text-center"><?php echo $i; ?></td>
							<?php 
								foreach($set_data as $showheader){
									foreach($data as $key => $value) {
										if($key == $showheader){
							?>
									<td class="text-center"><?php echo $value; ?></td>
							<?php 
										} 
									} 
								} 
							?>
							<?php if($url != []){?>
							<td class="d-flex justify-content-center">
								<?php 
									if(in_array('show' , $url))
									{
										$link = base_url();
										$button = [];
										$button['href'] = $link.$controller.'/Show/'.$data['id'];
										$button['color'] = 'bg-info';
										$button['command'] = 'Lihat';
										$button['type'] = 'link';
										$button['data'] = [];
										$button['jquery'] = '';
										$button['id'] = '';
										$this->view('component/button', $button);
									}
								?>
								<?php 
									if(in_array('edit' , $url))
									{
										$link = base_url();
										$button = [];
										$button['href'] = $link.$controller.'/Edit/'.$data['id'];
										$button['color'] = 'bg-warning';
										$button['command'] = 'Edit';
										$button['type'] = 'link';
										$button['data'] = [];
										$button['jquery'] = '';
										$button['id'] = '';
										$this->view('component/button', $button);
									}
								?>
								<?php
									if(in_array('destroy' , $url))
									{ 
										$link = base_url();
										$button = [];
										$button['href'] = $link.$controller.'/Destroy/'.$data['id'];
										$button['color'] = 'bg-danger hapusdata';
										$button['command'] = 'Hapus';
										$button['type'] = 'link';
										$button['data'] = $data;
										$button['jquery'] = '';
										$button['id'] = '';
										$this->view('component/button', $button);
									}
								?>
							</td>
							<?php } ?>
						</tr>
						<?php	
									$i++;
								}
							}
						?>
				</tbody></table>
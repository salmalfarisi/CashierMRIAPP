				<?php // disini hanya butuh image, title, dan text dalam bentuk object array ?>
				<div class="card">
					<?php if($data['image'] != null){ ?>
					<img class="card-img-top" src="<?php echo $data['image']; ?>" alt="Card image cap">
					<?php } ?>
					<div class="card-body">
						<h5 class="card-title"><?php echo $data['title']; ?></h5>
						<p class="card-text"><?php echo $data['text']; ?></p>
					</div>
				</div>
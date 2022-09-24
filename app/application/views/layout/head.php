<!DOCTYPE html>
<html>
	<head>
		<title>Cashier APP</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

		<style>
			@media only screen and (max-width: 575px) {
				#dropdown{
					display:block;
				}
				#togglebutton{
					display:none;
				}
			}
			@media only screen and (min-width: 576px) {
				#dropdown{
					display:none;
				}
				#togglebutton{
					display:block;
				}
			}
		</style>

	</head>
	<body>

		<?php if($this->session->userdata('id')){ ?>
			<nav class="navbar navbar-expand-sm navbar-light bg-light">
				<a class="navbar-brand" href="#">Cashier App</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<?php if($this->session->userdata('level_id') == 1){?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url().'Users/Index'; ?>">Users</a>
						</li>
						<?php } ?>
						<?php if($this->session->userdata('level_id') == 1 or $this->session->userdata('level_id') == 2){?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url().'Menus/Index'; ?>">Menus</a>
						</li>
						<?php } ?>
						<?php if($this->session->userdata('level_id') != 2){?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url().'Orders/Index'; ?>">Orders</a>
						</li>
						<?php } ?>
						<div id="dropdown">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('Account/Logout'); ?>">Logout</a>
							</li>
						</div>
					</ul>
					<ul class="navbar-nav mr-0" id="togglebutton">
						<li class="nav-item">
							<?php 
								$link = base_url().'Account/Logout';
								$button = [];
								$button['href'] = $link;
								$button['color'] = 'bg-primary';
								$button['command'] = 'Logout';
								$button['type'] = 'link';
								$button['data'] = [];
								$button['jquery'] = '';
								$button['id'] = '';
								$this->view('component/button', $button);
							?>
						</li>
					</ul>
				</div>
				</nav>
				<?php } ?>

		<div class="container my-4">
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;min-height: 80vh;">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-center">
                    Cashier App
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url(); ?>Account/Login" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
                    <?php 
                        $form['form'] = ['name' => 'username', 'label' => 'Username', 'type' => 'text', 'data' => '', 'attribute' => '', 'option' => [], 'message' => ''];
                        $this->load->view('component/form', $form);
                        
                        $form['form'] = ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'data' => '', 'attribute' => '', 'option' => [], 'message' => ''];
                        $this->load->view('component/form', $form);
                    ?>
                    <div class="d-flex justify-content-end py-2">
                    <?php 
                        $link = base_url();
                        $button = [];
                        $button['href'] = '';
                        $button['color'] = 'bg-primary';
                        $button['command'] = 'Login';
                        $button['type'] = 'submit';
                        $button['data'] = [];
                        $button['jquery'] = '';
                        $button['id'] = '';
                        $this->view('component/button', $button);
                    ?>
                    </div>
                </form>
            </div>
        </div>
	</div>
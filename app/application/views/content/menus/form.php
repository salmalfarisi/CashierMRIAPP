
    <div class="h4">
        <?php echo ($data == []) ? 'Tambah Data Baru' : 'Edit Data : '.$data->name; ?>
        
        <form method="POST" action="<?php echo ($data == [] ? base_url().'Menus/Store' : base_url().'Menus/Update/'.$data->id ); ?>">
            <?php 
                $form['form'] = ['name' => 'name', 'label' => 'Nama', 'type' => 'text', 'data' => (($data == []) ? $id : $data->name), 'attribute' => '', 'option' => [], 'message' => ''];
                $this->load->view('component/form', $form);

                $form['form'] = ['name' => 'qty_ready', 'label' => 'Total saat ini', 'type' => 'number', 'data' => (($data == []) ? $id : $data->qty_ready), 'attribute' => '', 'option' => [], 'message' => ''];
                $this->load->view('component/form', $form);
                
                $form['form'] = ['name' => 'price', 'label' => 'Harga', 'type' => 'number', 'data' => (($data == []) ? $id : $data->price), 'attribute' => '', 'option' => [], 'message' => ''];
                $this->load->view('component/form', $form);
                
                $form['form'] = ['name' => 'is_food', 'label' => 'Jenis Makanan', 'type' => 'radio', 'data' => (($data == []) ? $id : $data->is_food), 'attribute' => '', 'option' => [['id' => 0, 'value' => 'Minuman'], ['id' => 1, 'value' => 'Makanan']], 'message' => ''];
                $this->load->view('component/form', $form);
            ?>

            <?php
                $button = [];
                $button['href'] = base_url().'Menus/Index';
                $button['color'] = 'bg-danger';
                $button['command'] = 'Kembali';
                $button['type'] = 'link';
                $button['data'] = [];
                $button['jquery'] = '';
                $button['id'] = '';
                $this->view('component/button', $button);
            ?>

            <?php
                $button = [];
                $button['href'] = '';
                $button['color'] = 'bg-primary';
                $button['command'] = 'Save';
                $button['type'] = 'submit';
                $button['data'] = [];
                $button['jquery'] = '';
                $button['id'] = '';
                $this->view('component/button', $button);
            ?>
        </form>
    </div>


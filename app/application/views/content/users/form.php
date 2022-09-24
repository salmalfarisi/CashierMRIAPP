
    <div class="h4">
        <?php echo ($data == []) ? 'Tambah Data Baru' : 'Edit Data : '.$data['name']; ?>

        <form method="POST" action="<?php echo base_url().'Users/Store'; ?>">
            <?php 
                $form['form'] = ['name' => 'name', 'label' => 'Nama', 'type' => 'text', 'data' => (($data == []) ? $id : $data['name']), 'attribute' => '', 'option' => [], 'message' => ''];
                $this->load->view('component/form', $form);
                
                $form['form'] = ['name' => 'level_id', 'label' => 'Jabatan', 'type' => 'select', 'data' => (($data == []) ? '' : $data['level_id']), 'attribute' => '', 'option' => $pilihan, 'message' => ''];
                $this->load->view('component/form', $form);
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


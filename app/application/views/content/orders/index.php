<div class="d-flex justify-content-between">
    <div class="h4">
        Order List
    </div>
    <div>
        <?php
            if($this->session->userdata('level_id') == 4)
            {
                $link = base_url();
                $button = [];
                $button['href'] = $link.'Orders/Create';
                $button['color'] = 'bg-primary';
                $button['command'] = 'Tambah';
                $button['type'] = 'link';
                $button['data'] = [];
                $button['jquery'] = '';
                $button['id'] = '';
                $this->view('component/button', $button);
            } 
        ?>
    </div>
</div>
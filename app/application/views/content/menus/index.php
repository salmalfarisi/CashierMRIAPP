<div class="d-flex justify-content-between">
    <div class="h4">
        Menu List
    </div>
    <div>
        <?php 
            $link = base_url();
            $button = [];
            $button['href'] = $link.'Menus/Create';
            $button['color'] = 'bg-primary';
            $button['command'] = 'Tambah';
            $button['type'] = 'link';
            $button['data'] = [];
            $button['jquery'] = '';
            $button['id'] = '';
            $this->view('component/button', $button);
        ?>
    </div>
</div>
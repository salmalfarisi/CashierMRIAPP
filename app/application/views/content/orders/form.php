
    <div class="h4">
        <?php echo ($order == []) ? 'Tambah Data Baru' : 'Edit Data : '.$order->name; ?>
    
        <div class="h4 mt-3">
            Data Pemesanan
        </div>
        <?php 
            if($order != [])
            {
                $form['form'] = ['name' => 'name', 'label' => 'Nomor Transaksi', 'type' => 'text', 'data' => (($order == []) ? '' : $order->name), 'attribute' => 'readonly', 'option' => [], 'message' => ''];
                $this->load->view('component/form', $form);
            }
            
            $form['form'] = ['name' => 'input_number_of_table', 'label' => 'Nomor Meja', 'type' => 'text', 'data' => (($order == []) ? '' : $order->number_of_table), 'attribute' => (($this->session->userdata('level') == 1) ? 'readonly' : (($order == []) ? 'required' : ($order->is_finish == true ? 'readonly' : 'required'))), 'option' => [], 'message' => ''];
            $this->load->view('component/form', $form);

            $form['form'] = ['name' => 'set_result', 'label' => 'Total', 'type' => 'number', 'data' => (($order == []) ? 0 : $order->harga), 'attribute' => 'readonly', 'option' => [], 'message' => ''];
            $this->load->view('component/form', $form);
        ?>

        <?php if($status_order == true){ ?>
                
            <form class="border p-4">
                
                <div class="h5">
                    Input Pemesanan
                </div>
                
                <?php
                    $form['form'] = ['name' => 'menu_id', 'label' => 'Produk', 'type' => 'select', 'data' => '', 'attribute' => '', 'option' => $pilihan, 'message' => ''];
                    $this->load->view('component/form', $form);
                    
                    $form['form'] = ['name' => 'total', 'label' => 'Qty', 'type' => 'number', 'data' => '', 'attribute' => '', 'option' => [], 'message' => ''];
                    $this->load->view('component/form', $form);
                    
                    $form['form'] = ['name' => 'price', 'label' => 'Harga', 'type' => 'number', 'data' => $pilihan[0]['price'], 'attribute' => 'readonly', 'option' => [], 'message' => ''];
                    $this->load->view('component/form', $form);
                    
                    $form['form'] = ['name' => 'realtotal', 'label' => 'Total', 'type' => 'number', 'data' => '0', 'attribute' => 'readonly', 'option' => [], 'message' => ''];
                    $this->load->view('component/form', $form);
                ?>
                <div class="d-flex justify-content-between">
                    <div>
                        <?php
                            $form['form'] = ['name' => 'reset', 'label' => 'Batal', 'type' => 'reset', 'data' => '', 'attribute' => '', 'option' => [], 'message' => ''];
                            $this->load->view('component/form', $form);
                        ?>
                    </div>
                    <div>
                        <?php 
                            $form['form'] = ['name' => 'simpan', 'label' => 'Simpan', 'type' => 'reset', 'data' => '', 'attribute' => '', 'option' => [], 'message' => ''];
                            $this->load->view('component/form', $form);
                        ?>
                    </div>
                </div>

            </form>
        <?php } ?>


        <form method="POST" action="<?php echo ($order == [] ? base_url().'Orders/Store' : base_url().'Orders/Update/'.$order->id ); ?>">

            <table class="mt-3 table table-sm table-bordered h6">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="listdata">
                    <?php 
                        if($order != []){
                            foreach($order_list as $datatable){
                    ?>
                                <tr id="rows<?php echo $datatable['menu_id'] ?>">
                                    <td><input type="hidden" name="menu_id[]" id="menu_table<?php echo $datatable['menu_id'] ?>" class="menu_table" value="<?php echo $datatable['menu_id'] ?>"><?php echo $datatable['menu_name'] ?></td>
                                    <td><input type="hidden" name="total[]" id="qty_table<?php echo $datatable['menu_id'] ?>" class="qty_table" value="<?php echo $datatable['total'] ?>"><?php echo $datatable['total'] ?></td>
                                    <td><input type="hidden" name="harga[]" id="price_table<?php echo $datatable['menu_id'] ?>" class="price_table" value="<?php echo $datatable['price'] ?>"><?php echo $datatable['price'] ?></td>
                                    <td><?php echo $datatable['finalharga'] ?></td>
                                    <?php if($status_order == true){ ?>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-sm btn-warning" onclick="editdata('<?php echo $datatable['menu_id'] ?>')">Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="hapusdata('<?php echo $datatable['menu_id'] ?>')">Hapus</button>
                                        </div>
                                    </td>
                                    <?php } ?>
                                </tr>
                    <?php }} ?>
                </tbody>
            </table>

            <?php
                $form['form'] = ['name' => 'number_of_table', 'label' => '', 'type' => 'hidden', 'data' => ($order == [] ? '' : $order->number_of_table), 'attribute' => '', 'option' => [], 'message' => ''];
                $this->load->view('component/form', $form);

                $button = [];
                $button['href'] = base_url().'/Orders/Index';
                $button['color'] = 'bg-danger';
                $button['command'] = 'Batal';
                $button['type'] = 'link';
                $button['data'] = [];
                $button['jquery'] = '';
                $button['id'] = '';
                $this->view('component/button', $button);

                if($status_order == true){
                    $button = [];
                    $button['href'] = '';
                    $button['color'] = 'bg-primary';
                    $button['command'] = ($order == [] ? 'Save' : 'Update' );
                    $button['type'] = 'submit';
                    $button['data'] = [];
                    $button['jquery'] = '';
                    $button['id'] = '';
                    $this->view('component/button', $button);
                }

                if($order != [] and $status_order == false)
                {
                    $button = [];
                    $button['href'] = base_url().'/Orders/Approval';
                    $button['color'] = 'bg-danger';
                    $button['command'] = 'Batal';
                    $button['type'] = 'link';
                    $button['data'] = [];
                    $button['jquery'] = '';
                    $button['id'] = '';
                    $this->view('component/button', $button);
                }
            ?>
        </form>
    </div>


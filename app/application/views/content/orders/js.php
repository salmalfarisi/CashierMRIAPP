

    <script>
        var listproduk = [<?php foreach($pilihan as $data){ echo "'".$data['id']."', "; } ?>];
        var listtotal = [<?php foreach($pilihan as $data){ echo "'".$data['qty_ready']."', "; } ?>];
        var price = [<?php foreach($pilihan as $data){ echo "'".$data['price']."', "; } ?>];
    </script>

    <script>
        function sinkronisasi()
        {
            total = 0;
            getqty = document.getElementsByClassName('qty_table');
            for(var i = 0; i < getqty.length; i++)
            {
                getprice = document.getElementsByClassName('price_table');
                total = total + (parseInt(getqty[i].value) * parseInt(getprice[i].value));
            }

            document.getElementById('setset_result').value = parseInt(total);
        }

        function editdata(id)
        {
            listclass = ['menu_table', 'qty_table', 'price_table'];
            listtarget = ['setmenu_id', 'settotal', 'setprice'];
            getvar = document.getElementsByClassName('menu_table');
            for(j = 0; j < listtarget.length; j++)
            {
                for(k = 0; k < listtarget.length; k++)
                {
                    if(k == j)
                    {
                        name = '#' + listtarget[k];
                        name2 = listclass[k] + id;
                        $(name).val(document.getElementById(name2).value); 
                    }
                }
            }

            document.getElementById('setrealtotal').value = document.getElementById('settotal').value * document.getElementById('setprice').value;
        }

        function hapusdata(id)
        {
            getname = '#rows' + id;
            $(getname).remove();
            sinkronisasi();
        }
    </script>
        
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#setinput_number_of_table').change(function() {
                $('#setnumber_of_table').val(this.value);
            });

            $('#setmenu_id').change(function() {
                var value = this.value;
                for(var i = 0; i < listproduk.length; i++){
                    var getdata = listproduk[i];
                    if(getdata == value)
                    {
                        $('#setprice').val(price[i]);
                    }
                }
            });

            $('#settotal').change(function() {
                document.getElementById('setrealtotal').value = document.getElementById('settotal').value * document.getElementById('setprice').value;
            });

            $('#setsimpan').click(function() {
                //var total = document.getElementById('setset_result').value;

                checkvalue = document.getElementById('settotal').value;
                if(checkvalue.length == 0)
                {
                    alert('Harap untuk mengisi total data yang diinginkan');
                }
                else
                {

                    if(parseInt(checkvalue) <= parseInt('0'))
                    {
                        alert('Harap untuk mengisi total qty lebih dari 0');
                    }
                    else
                    {
                        var e = document.getElementById("setmenu_id");
                        var value = e.options[e.selectedIndex].value;
                        var text = e.options[e.selectedIndex].text;
                        cekexist = false;
                        cektrue = true;
                        total = parseInt(document.getElementById('settotal').value) * parseInt(document.getElementById('setprice').value);
                        for(var i = 0; i < listproduk.length; i++){
                            var getdata = listproduk[i];
                            if(getdata == value)
                            {
                                cekexist = true;
                                var getnilai = listtotal[i];
                                if(parseInt(getnilai) < parseInt(checkvalue))
                                {
                                    cektrue = false;
                                    alert('Harap untuk mengisi total qty tidak lebih dari stok saat ini')
                                }
                            }
                        }  
    
                        
                        if(cektrue == true)
                        {
                            if(cekexist == true)
                            {
                                var sethapusname = "#rows" + value;
                                $(sethapusname).remove();
                            }

                            $("#listdata").append('<tr id="rows'+value+'">'
                                                    +'<td><input type="hidden" name="menu_id[]" id="menu_table'+value+'" class="menu_table" value="'+value+'">'+text+'</td>'
                                                    +'<td><input type="hidden" name="total[]" id="qty_table'+value+'" class="qty_table" value="'+document.getElementById('settotal').value+'">'+document.getElementById('settotal').value+'</td>'
                                                    +'<td><input type="hidden" name="harga[]" id="price_table'+value+'" class="price_table" value="'+document.getElementById('setprice').value+'">'+document.getElementById('setprice').value+'</td>'
                                                    +'<td>'+total+'</td>'
                                                    +'<td>'
                                                        +'<div class="d-flex justify-content-between">'
                                                            +'<button type="button" class="btn btn-sm btn-warning" onclick="editdata('+value+')">Edit</button>'
                                                            +'<button type="button" class="btn btn-sm btn-danger" onclick="hapusdata('+value+')">Hapus</button>'
                                                        +'</div>'
                                                    +'</td>'
                                                +'</tr>');
                            
                            sinkronisasi();
                        }
                    }
                }
            });
        });
    </script>
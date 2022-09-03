</body>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/flickity.pkgd.min.js') ?>"></script>
<script src="<?= base_url('assets/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('assets/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/fontawesome.js') ?>"></script>
<script src="<?= base_url('assets/chart.js') ?>"></script>
<script src="<?= base_url('assets/multiselect-20/js/chosen.jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/multiselect-20/js/main.js') ?>"></script>
<script src="<?= base_url('assets/chosen.jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/script.js') ?>"></script>
<script>
  console.log=function(){};
  console.error=function(){};
  window.onerror=function(){
    console=null;
    return true;
  }
  
  function sidebar (){
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('sidebar2');
  }
  
  $(document).ready(function () {
    $("#example").DataTable({
      "bPaginate": false,
      "bLengthChange": true,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": true,
      "fixedHeader": true,
    });
  });
  
  function side_drop (){
    const side_drop = document.getElementById('side_drop');
    side_drop.classList.toggle('side_drop1');
    const caret = document.getElementById('caret');
    caret.classList.toggle('caret1');
  }
  
  function side_caret (){
    const side_caret = document.getElementById('side_caret');
    side_caret.classList.toggle('side_caret1');
    const caret_laporan = document.getElementById('caret_laporan');
    caret_laporan.classList.toggle('caret_laporan1');
  }
  
  function side_caret_s (){
    const side_caret_s = document.getElementById('side_caret_s');
    side_caret_s.classList.toggle('side_caret_s1');
    const caret_laporan_s = document.getElementById('caret_laporan_s');
    caret_laporan_s.classList.toggle('caret_laporan_s1');
  }
  
  const cari = document.getElementById('cari');
  cari.addEventListener('keyup', () => {
    const searchString = cari.value;
    const content = document.querySelectorAll('#content');
    const contentL = content.length;
    console.log(searchString);
    
    for(i = 0; i < contentL; i++){
      const nama = document.querySelectorAll('.nama_produk')[i].innerText.toLowerCase();
      const content = document.querySelectorAll('#content')[i];
      if(nama.includes(searchString)){
        content.style.display = 'flex';
      } else {
        content.style.display = 'none';
      }
    }
  });
  
  $(document).ready(function(){
    $('#modal-finish').modal('show');
    
    $('.add_cart').click(function(){
      var id_produk    = $(this).data("produkid");
			var nama_produk  = $(this).data("produknama");
			var harga_produk = $(this).data("produkharga");
			var jumlah_produk     = $('#' + id_produk).val();
			$.ajax({
        url : "<?php echo site_url();?>kasir/pesanan/add_to_cart",
				method : "POST",
				data : {id_produk: id_produk, nama_produk: nama_produk, harga_produk: harga_produk, jumlah_produk: jumlah_produk},
				success: function(data){
          $('#show_cart').load("<?= site_url('kasir/pesanan/load_cart') ?>");
          $('#modal').load("<?= site_url('kasir/pesanan/load_modal') ?>", () =>{
            const button_add = document.querySelectorAll('.add_cart');
            const cart_table = document.querySelectorAll('#cart_table');
            const content_card = document.querySelectorAll('#content');
            for (let num = 0; num < cart_table.length; num++) {
              for (let yum = 0; yum < content_card.length; yum++) {
                if(cart_table[num].children[0].innerText == content_card[yum].children[0].innerText){
                  if(parseInt(cart_table[num].children[2].innerText) >= parseInt(content_card[yum].children[1].children[0].children[0].children[0].innerText)){
                    content_card[yum].children[2].children[2].children[0].classList.add('disabled', 'bg-danger');
                  } else {
                    ''
                  }
                } else {
                  console.log('no');
                }
              }
            }
            input_bayar = document.getElementById('input_bayar');
            total = document.getElementById('total');
            kembalian = document.getElementById('kembalian');
            a = total.value;
            b = input_bayar.value;
            c = b - a;
            kembalian.setAttribute("value", c); 
            input_bayar.addEventListener('keyup', () =>{
              
              console.log(input_bayar.value);
              a = total.value;
              b = input_bayar.value;
              c = b - a;
              btn_submit = document.getElementById('btn-submit');
              kembalian.setAttribute("value", c); 
              if(c <= -1){
                btn_submit.classList.add('disabled');
              } else {
                btn_submit.classList.remove('disabled');
              }
            });
          });
          $('#btn-bayar').removeClass('disabled');
        }
			});
		});
    
    $('#show_cart').load("<?= site_url('kasir/pesanan/load_cart') ?>", () => {
      const cart_table = document.querySelectorAll('#cart_table');
      const content_card = document.querySelectorAll('#content');
      for (let num = 0; num < cart_table.length; num++) {
        for (let yum = 0; yum < content_card.length; yum++) {
          if(cart_table[num].children[0].innerText == content_card[yum].children[0].innerText){
            if(parseInt(cart_table[num].children[2].innerText) >= parseInt(content_card[yum].children[1].children[0].children[0].children[0].innerText)){
              content_card[yum].children[2].children[2].children[0].classList.add('disabled', 'bg-danger');
            } else {
              console.log('yes');
            }
          } else {
            console.log('no');
          }
        }
      }
      if(cart_table[0] !== undefined){
        $('#btn-bayar').removeClass('disabled');
      } else {
        console.log('asd')
      }
    });
    
    $('#modal').load("<?= site_url('kasir/pesanan/load_modal') ?>", () => {
      input_bayar = document.getElementById('input_bayar');
      total = document.getElementById('total');
      kembalian = document.getElementById('kembalian');
      a = total.value;
      b = input_bayar.value;
      c = b - a;
      kembalian.setAttribute("value", c); 
      input_bayar.addEventListener('keyup', () =>{
        console.log(input_bayar.value);
        a = total.value;
        b = input_bayar.value;
        c = b - a;
        kembalian.setAttribute("value", c); 
        btn_submit = document.getElementById('btn-submit');
        kembalian.setAttribute("value", c); 
        if(c <= -1){
          btn_submit.classList.add('disabled');
        } else {
          btn_submit.classList.remove('disabled');
        }
      });
    });
    
    $(document).on('click','.delete_cart',function(){
      var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
      const name = $(this).attr("name"); 
      const element_id = document.getElementById(row_id);
      var gett = document.querySelectorAll('.add_cart');
      console.log(element_id.attributes[1].value);
      for(var j =0 ; j < gett.length; j++){
        if(element_id.attributes[1].value == gett[j].attributes[2].value){
          gett[j].classList.remove('disabled', 'bg-danger');
        }
      }
      
			$.ajax({
        url : "<?php echo site_url();?>kasir/pesanan/hapus_cart",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
          $('#show_cart').load("<?= site_url('kasir/pesanan/load_cart') ?>", () => {
          });
          $('#modal').load("<?= site_url('kasir/pesanan/load_modal') ?>");
          if(<?= $this->cart->total()?> == 0){
            $('#btn-bayar').addClass('disabled');
          }
				}
			});
		});
    
    $(document).on('click','.reset_cart',function(){
      $.ajax({
        url : "<?php echo site_url();?>kasir/pesanan/reset_cart", 
        success :function(data){
          $('#show_cart').load("<?= site_url('kasir/pesanan/load_cart') ?>");
          $('#modal').load("<?= site_url('kasir/pesanan/load_modal') ?>");
          const content_card = document.querySelectorAll('#content');
          var gett = document.querySelectorAll('.add_cart');
          for(var j =0 ; j < gett.length; j++){
            if (parseInt(content_card[j].children[1].children[0].children[0].children[0].innerText) == 0) {
            } else {
              gett[j].classList.remove('disabled', 'bg-danger');
            }
          } 
          $('#btn-bayar').addClass('disabled');
        }
			});
		});
    
    $('.tab-class').click(function(){
      const button_add = document.querySelectorAll('.add_cart');
      const cart_table = document.querySelectorAll('#cart_table');
      const content_card = document.querySelectorAll('#content');
      for (let num = 0; num < cart_table.length; num++) {
        for (let yum = 0; yum < content_card.length; yum++) {
          if(cart_table[num].children[0].innerText.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim() == content_card[yum].children[0].innerText.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim()){
            if(cart_table[num].children[2].innerText >= content_card[yum].children[1].children[0].children[0].children[0].innerText){
              content_card[yum].children[2].children[2].children[0].classList.add('disabled', 'bg-danger');
              console.log('1');
            } else {
              console.log('2');
            }
          } else {
            console.log('3');
            console.log(cart_table[num].children[0].innerText);
            console.log(content_card[yum].children[0].innerText.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim());
          }
        }
      }
    });
  });
  
  $('.modal-dialog-after').click(() => {
    location.href = "<?= site_url("kasir/pesanan") ?>";
  });
  </script>
</html>
<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3">
    LOG
</div>
<div class="card shadow-box fw-bold">
    <div class="card-header bg-primary text-light">
      FILTER :
        <select class="btn btn-sm mt-1 btn-light text-start asd" onchange="filter()" id="filter">
            <option value="true" hidden>PILIH</option>
            <option value="true" >SEMUA</option>
            <?php foreach($get_akun as $ak): ?>
            <option value="<?= $ak->id_user ?>"><?= $ak->nama ?></option>
            <?php endforeach; ?>
        </select>
        min :
          <input class="btn btn-sm mt-1 btn-light" type="date" name="" id="mindate" value="" max="" min="" onchange="filter()" >
        max :
          <input class="btn btn-sm mt-1 btn-light" type="date" name="" id="maxdate" value="" max="" min="" onchange="filter()">
          <div class="float-end">
          <a href="<?= site_url('admin/log/cetak/true/true/true') ?>" id="pdf" class="btn btn-sm mt-1 btn-light" target="_blank">CETAK PDF</a>
          <a href="<?= site_url('admin/log/export/true/true/true') ?>" id="excel" class="btn btn-sm mt-1 btn-light">CETAK XLSX</a>
          <a class="btn btn-sm mt-1 btn-light" href="<?= site_url('admin/log/print/true/true/true') ?>" id="print" target="_blank">PRINT</a>
        </div>
    </div>
    <div class="card-body">
      <div class="card overflow-auto">

        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">KODE</th>
                    <th scope="col">USER</th>
                    <th scope="col">KEGIATAN</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">JAM</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($get_log as $l): ?>
                <tr id="tbody">
                    <td><?= $i++ ?></td>
                    <td><?= $l->kode_log ?></td>
                    <td><?= $l->nama ?></td>
                    <td><?= $l->kegiatan ?></td>
                    <td><?= $l->tanggal ?></td>
                    <td><?= $l->waktu ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
      </div>
    </div>
</div>

<?php $i=1; foreach ($get_log as $s): ?>
  <p class="d-none" id="nama"><?= $s->id_user ?></p>
  <p class="d-none" id="tanggal"><?= $s->tanggal ?></p>
  <?php endforeach; ?>
<!-- adasdadsa -->

<script>

  window.onload = function(){

  const mindate = document.getElementById('mindate');
  const maxdate = document.getElementById('maxdate');
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  mindate.max = today;
  maxdate.max = today;
  maxdate.value = today;
  }
  function filter(){
    a();
    b();
    c();
  }
      
function a(){
  const filter = document.getElementById('filter').value;
  const nama = document.querySelectorAll('#nama');
  const tanggal = document.querySelectorAll('#tanggal');
  const tbody = document.querySelectorAll('#tbody');
  const excel = document.getElementById('excel');
  const pdf = document.getElementById('pdf');
  const print = document.getElementById('print');
  const mindate = document.getElementById('mindate');
  const maxdate = document.getElementById('maxdate');
  for(i = 0 ; i < nama.length; i++){
    if(filter == "true"){
      if(mindate.value == '' && maxdate.value == ''){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else if(tanggal[i].innerText >= mindate.value && maxdate.value == ''){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else if(tanggal[i].innerText == '' && tanggal[i].innerText <= maxdate.value){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else if(tanggal[i].innerText >= mindate.value && tanggal[i].innerText <= maxdate.value){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else {
        tbody[i].classList.add('d-none');
        tbody[i].classList.remove('a1');
      }
    } else if(filter == nama[i].innerText){
      if(mindate.value == '' && maxdate.value == ''){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else if(tanggal[i].innerText >= mindate.value && maxdate.value == ''){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else if(mindate.value == '' && tanggal[i].innerText <= maxdate.value){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else if(tanggal[i].innerText >= mindate.value && tanggal[i].innerText <= maxdate.value){
        tbody[i].classList.remove('d-none');
        tbody[i].classList.add('a1');        
      }else {
        tbody[i].classList.add('d-none');
        tbody[i].classList.remove('a1');
      }
    } else {
      tbody[i].classList.add('d-none');
      tbody[i].classList.remove('a1');
    }
  }


//     if(filter == "true"){
//       if(mindate.value == ''){
//         tbody[i].classList.remove('d-none');
//         tbody[i].classList.add('a1');        
//       } else {
//         if(tanggal[i].innerText >= mindate.value){
//           tbody[i].classList.remove('d-none');
//           tbody[i].classList.add('a1');
//         } else {
//           tbody[i].classList.add('d-none');
//           tbody[i].classList.remove('a1');
//         }
//       }
//   } else {
//     if(filter == nama[i].innerText){
//       if(mindate.value == ''){
//         tbody[i].classList.remove('d-none');
//         tbody[i].classList.add('a1');
//       } else {
//         if(tanggal[i].innerText >= mindate.value){
//           tbody[i].classList.remove('d-none');
//           tbody[i].classList.add('a1');
//         } else {
//           tbody[i].classList.add('d-none');
//           tbody[i].classList.remove('a1');
//         }
//       }
//     } else {
//       tbody[i].classList.add('d-none');
//       tbody[i].classList.remove('a1');
//     }
//   }
// }
      
  // for(i=0; i<nama.length; i++){
  //   if(filter == "true"){
  //     tbody[i].classList.remove('d-none');
  //   } else {
  //     if(filter == nama[i].innerText){
  //       tbody[i].classList.remove('d-none');
  //       tbody[i].classList.add('a1');
  //       } else {
  //         tbody[i].classList.add('d-none');
  //         tbody[i].classList.remove('a1');
  //       }
  //     }
  //   }
  
  if(filter == 'true'){
    if(mindate.value == '' && maxdate.value == ''){
      pdf.href= "log/cetak/" + 'true' + '/' + 'true' + '/' + 'true';
        excel.href= "log/export/" + 'true' + '/' + 'true' + '/' + 'true';
        print.href= "log/print/" + 'true' + '/' + 'true' + '/' + 'true';
      } else if(mindate.value == ''){
        pdf.href= "log/cetak/" + 'true' + '/' + 'true' + '/' + maxdate.value;
        excel.href= "log/export/" + 'true' + '/' + 'true' + '/' + maxdate.value;
        print.href= "log/print/" + 'true' + '/' + 'true' + '/' + maxdate.value;
      } else if(maxdate.value == ''){
        pdf.href= "log/cetak/" + 'true'+ '/' + mindate.value + '/' + 'true';
        excel.href= "log/export/" + 'true'+ '/' + mindate.value + '/' + 'true';
        print.href= "log/print/" + 'true'+ '/' + mindate.value + '/' + 'true';
      } else {
        pdf.href= "log/cetak/" + 'true' + '/' + mindate.value + '/' + maxdate.value;
        excel.href= "log/export/" + 'true' + '/' + mindate.value + '/' + maxdate.value;
        print.href= "log/print/" + 'true' + '/' + mindate.value + '/' + maxdate.value;
      }
    } else {
      if(mindate.value == '' && maxdate.value == ''){
        pdf.href= "log/cetak/" + filter + '/' + 'true' + '/' + 'true';
          excel.href= "log/export/" + filter + '/' + 'true' + '/' + 'true';
          print.href= "log/print/" + filter + '/' + 'true' + '/' + 'true';
        } else if(mindate.value == ''){
          pdf.href= "log/cetak/" + filter + '/' + 'true' + '/' + maxdate.value;
          excel.href= "log/export/" + filter + '/' + 'true' + '/' + maxdate.value;
          print.href= "log/print/" + filter + '/' + 'true' + '/' + maxdate.value;
        } else if(maxdate.value == ''){
          pdf.href= "log/cetak/" + filter+ '/' + mindate.value + '/' + 'true';
          excel.href= "log/export/" + filter+ '/' + mindate.value + '/' + 'true';
          print.href= "log/print/" + filter+ '/' + mindate.value + '/' + 'true';
        } else {
          pdf.href= "log/cetak/" + filter + '/' + mindate.value + '/' + maxdate.value;
          excel.href= "log/export/" + filter + '/' + mindate.value + '/' + maxdate.value;
          print.href= "log/print/" + filter + '/' + mindate.value + '/' + maxdate.value;
        }
      
    }

    // if(mindate.value == ''){
    //   pdf.href= "log/cetak/" + filter + '/' + 'true' + '/' + maxdate.value;
    //   excel.href= "log/export/" + filter + '/' + 'true' + '/' + maxdate.value;
    //   print.href= "log/print/" + filter + '/' + 'true' + '/' + maxdate.value;
    // } else if(maxdate.value == ''){
    //   pdf.href= "log/cetak/" + filter + '/' + mindate.value + '/' + 'true';
    //   excel.href= "log/export/" + filter + '/' + mindate.value + '/' + 'true';
    //   print.href= "log/print/" + filter + '/' + mindate.value + '/' + 'true';
    // } else if(filter == 'true'){
    //   pdf.href= "log/cetak/" + 'true' + '/' + mindate.value + '/' + maxdate.value;
    //   excel.href= "log/export/" + 'true' + '/' + mindate.value + '/' + maxdate.value;
    //   print.href= "log/print/" + 'true' + '/' + mindate.value + '/' + maxdate.value;
    // } else if(filter == 'true' && mindate == ''){
    //   pdf.href= "log/cetak/" + 'true' + '/' + 'true' + '/' + maxdate.value;
    //   excel.href= "log/export/" + 'true' + '/' + 'true' + '/' + maxdate.value;
    //   print.href= "log/print/" + 'true' + '/' + 'true' + '/' + maxdate.value;
    // } else if(filter == 'true' && maxdate == ''){
    //   pdf.href= "log/cetak/" + 'true'+ '/' + mindate.value + '/' + 'true';
    //   excel.href= "log/export/" + 'true'+ '/' + mindate.value + '/' + 'true';
    //   print.href= "log/print/" + 'true'+ '/' + mindate.value + '/' + 'true';
    // } else if(mindate == '' && maxdate == ''){
    //   pdf.href= "log/cetak/" + filter + '/' + 'true' + '/' + 'true';
    //   excel.href= "log/export/" + filter + '/' + 'true' + '/' + 'true';
    //   print.href= "log/print/" + filter + '/' + 'true' + '/' + 'true';
    // } else if((filter == 'true' && mindate == '') || (filter == 'true' && maxdate == '')){
    //   pdf.href= "log/cetak/" + 'true' + '/' + 'true' + '/' + 'true';
    //   excel.href= "log/export/" + 'true' + '/' + 'true' + '/' + 'true';
    //   print.href= "log/print/" + 'true' + '/' + 'true' + '/' + 'true';
    // } else{
    //   pdf.href= "log/cetak/" + filter + '/' + mindate.value + '/' + maxdate.value;
    //   excel.href= "log/export/" + filter + '/' + mindate.value + '/' + maxdate.value;
    //   print.href= "log/print/" + filter + '/' + mindate.value + '/' + maxdate.value;
    // }

    console.log(filter);
    
  }

  function b(){
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd;
  const mindate = document.getElementById('mindate');
  const maxdate = document.getElementById('maxdate');
  maxdate.min = mindate.value;
  mindate.max = maxdate.value;
  }

  function c(){
    const count = document.querySelectorAll('.a1');
    const excel = document.getElementById('excel');
    const pdf = document.getElementById('pdf');
    const print = document.getElementById('print');
  if(count.length == 0){
    pdf.classList.add('disabled');
    excel.classList.add('disabled');
    print.classList.add('disabled');
  } else if(count.length >= 0){
    pdf.classList.remove('disabled');
    excel.classList.remove('disabled');
    print.classList.remove('disabled');
  }

}
</script>
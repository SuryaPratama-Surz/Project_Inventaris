<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet">
  <script src="assets/js/pace.min.js"></script>

   <!-- SweetAlert2 CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/simplebar/css/simplebar.css">
  <!--bootstrap css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="sass/main.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/blue-theme.css" rel="stylesheet">
  <link href="sass/semi-dark.css" rel="stylesheet">
  <link href="sass/bordered-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">

</head>

<body>


    <div class="wrapper">
        <!-- Sidebar -->
            <div class="sidebar sidebar-style-2">
                 @include('layouts.kerangka.sidebar')
            </div>
        <!-- End Sidebar -->
  
        <div class="main-panel">
          <div class="main-header">
               
            <!-- Navbar Header -->
                @include('layouts.kerangka.navbar')
            <!-- End Navbar -->
          </div>



        {{-- Table --}}
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Halaman Data Pengembalian</h3>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Data Pengembalian</div>
                  </div>
                  @if (session('success'))
                  <script>
                      Swal.fire({
                          icon: 'success',
                          title: 'Berhasil!',
                          text: '{{ session('success') }}',
                          showConfirmButton: true, // Menghilangkan tombol "OK"
                          timer: 3000 // alert hilang otomatis setelah 3 detik
                      });
                   </script>
                   @endif       
                  <div class="card-body">
                    <div class="panel-body">
                      <div class="table-responsive"> 
                          <table class="table">
                              <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Pengembalian</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Nama Peminjam</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                  </tr>
                              </thead>
                              @php $no = 1; @endphp
                              @foreach ($pengembalian as $data)
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $no++ }}</th>
                                  <td>{{ $data->kode_barang }}</td>
                                  <td>{{ $data->jumlah }}</td>
                                  <td>{{ $data->nama_peminjam }}</td>
                                  <td>{{ $data->tglpinjam }}</td>
                                  <td>{{ $data->tglkembali }}</td>
                                  <td><span class="badge {{ $data->status == 'Sedang Dipinjam' ? 'bg-danger' : 'bg-success' }}">
                                    {{ $data->status }}
                                  </span> </td>
                                  <td>{{ $data->barang->nama }}</td>
          

                                  <td class="text-center col-4">
                                    <form action="{{ route('pengembalian.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Anda ingin menghapus data tersebut?');">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                      </button>
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                      <!-- /.table-responsive -->
                  </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        {{-- Akhir Table --}}

  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/js/main.js"></script>


</body>

</html>
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
              <h3 class="fw-bold mb-3">Halaman Data Barang Masuk</h3>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Data Barang Masuk</div>
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
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">ID_BARANG</th>
                                    <th scope="col" class="text-center">Action</th>
                                  </tr>
                              </thead>
                              @php $no = 1; @endphp
                              @foreach ($barangmasuk as $data)
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $no++ }}</th>
                                  <td>{{ $data->kode_barang }}</td>
                                  <td>{{ $data->jumlah }}</td>
                                  <td>{{ $data->tglmasuk }}</td>
                                  <td>{{ $data->ket }}</td>
                                  <td>{{ $data->barang->nama }}</td>


                                  <td class="text-center col-4">
                                    <form action="{{ route('barangmasuk.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Anda ingin menghapus data tersebut?');">
                                      <a href="{{ route('barangmasuk.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                            <div class="ms-2 mt-3">
                            <a href="{{ route('barangmasuk.create') }}" class="btn btn-sm btn-success">Add</a>
                            </div>
                      </div>
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
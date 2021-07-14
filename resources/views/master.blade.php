<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('judul_halaman', $title)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
</head>


<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">@yield('judul_konten', $titleContent)</span>
      </a>

    </header>
  </div>

  <main>
    <div class="container">
      @yield('konten')
      <div class="card-body">
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
      </div>
    </div>

  </main>


  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">Thank you for visiting</span>
    </div>
  </footer>

</body>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>


<script>
  $(function() {


    $('#example1').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        "url": "/json",
      },
      columns: [{
          data: ['id'],
          name: ['id']
        },
        {
          data: ['name'],
          name: ['name']
        },
        {
          data: ['username'],
          name: ['username']
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });
  });
</script>



</html>

<script>
  function popUpDelete() {
    window.alert("Data Has Been Deleted");
  };
</script>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
        <div class="container">
            <a href="{{ url('/add-data') }}" class="btn btn-sm btn-primary my-3">Add Data</a>
            @if (Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($showData as $item)
                  <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                      <a href="{{ url('/edit-data/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                      <form class="d-inline" method="GET">
                      @csrf
                      <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                    
                  @endforelse
                </tbody>
              </table>
              {{ $showData->links() }}
        </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/custom/crud.js') }}"></script>
  
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employe </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @toastr_css
</head>
<body>

   <div class="header">

   </div>


<main>
<section>



    <section>
        <div class="container">
         <div class="card">
             <div class="card-header">
                 <h3 class="text-center"> Employe Information </h3>
                 <button class="btn btn-success" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Employe Add</button>
             </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Epassword</th>
                        <th scope="col">Erepassword</th>
                        <th scope="col">Edept</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($employes as $employe)
                         
                  
                     <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{$employe->ename}}</td>
                        <td>{{ $employe->email }}</td> 
                        <td>
                            <img class="img-fluid rounded" style="width: 20%;" src="{{asset('images/employe')}}/{{$employe->image}}" alt="Student">
                        </td> 
                        <td>{{ $employe->ephone }}</td>
                        <td>{{ $employe->epassword }}</td>
                        <td>{{ $employe->erepassword }}</td>
                        <td>{{ $employe->edept }}</td>   
                         <td>
                            <button class="btn btn-info" type="submit" data-bs-toggle="modal" data-bs-target="#editModal{{$employe->id}}"> Edit</button>
                           
                        </td>
                        <td> <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$employe->id}}"> Delete</button></td>


                       
 {{-- Employe delete modal --}}                                         
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{$employe->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('employe.destroy', $employe->id)}}" method="POST">
                            @csrf

                            @method('DELETE')

                            <div class="modal-body">
                                <input type="hidden" value="{{$employe->id}}">
                                <p class="text-danger text-center">Are you sure to delete??</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>

                {{-- Employe delete modal end--}}



  {{-- Employe edit modal --}}
  <div class="container ">
    <div class="modal fade" id="editModal{{$employe->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Employe Edit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('employe.update', $employe->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{$employe->id}}">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Employe Name:</label>
                <input type="text" class="form-control @error('ename') is-invalid @enderror" id="recipient-name" name="ename" value="{{$employe->ename}}">
                @error('ename')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Employe Mail:</label>
                <input type="email" class="form-control @error('email') is-invalid  @enderror" id="recipient-name" name="email"value="{{$employe->email}}">
                @error('email')
                <small class="text-danger"> {{ $message }}</small>
            @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Employe Image:</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="recipient-name" name="image">
                @error('image')
                <small class="text-danger"> {{ $message }}</small>
            @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Old Image:</label>
                <img class="img-fluid rounded" style="width: 20%;" src="{{asset('images/employe')}}/{{$employe->image}}" alt="employe">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Phone:</label>
                <input type="number" class="form-control @error('ephone') is-invalid @enderror" id="recipient-name" name="ephone"value="{{$employe->ephone}}">
                @error('ephone')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="password" class="form-control @error('epassword') is-invalid @enderror" id="recipient-name" name="epassword"value="{{$employe->epassword}}">
                @error('epassword')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Repassword:</label>
                <input type="password" class="form-control @error('erepassword') is-invalid @enderror" id="recipient-name" name="erepassword"value="{{$employe->erepassword}}">
                @error('erepassword')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
               <select class="form-select" id="edept" name="edept"value="{{$employe->edept}}">
                    <option>CEO</option>
                    <option>HR</option>
                    <option>Markerting</option>
                    <option>Technical</option>
                </select>
                <label for="edept" class="form-label">Select One:</label>
            </div>

            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
        </div>
    </div>
    </div>
</div>

{{-- Employe edit modal end--}}
                        @endforeach 
                        
                    </tbody>
                  </table>
             </div>
         </div>
        </div>
    </section>








    {{-- Employe create modal --}}
    <div class="container ">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employe add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('employe.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Employe Name:</label>
                    <input type="text" class="form-control @error('ename') is-invalid @enderror" id="recipient-name" name="ename">
                    @error('ename')
                        <small class="text-danger"> {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Employe Mail:</label>
                    <input type="email" class="form-control @error('email') is-invalid  @enderror" id="recipient-name" name="email">
                    @error('email')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Employe Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="recipient-name" name="image">
                    @error('image')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Phone:</label>
                    <input type="number" class="form-control @error('ephone') is-invalid @enderror" id="recipient-name" name="ephone">
                    @error('ephone')
                    <small class="text-danger"> {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Password:</label>
                    <input type="password" class="form-control @error('epassword') is-invalid @enderror" id="recipient-name" name="epassword">
                    @error('epassword')
                    <small class="text-danger"> {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Repassword:</label>
                    <input type="password" class="form-control @error('erepassword') is-invalid @enderror" id="recipient-name" name="erepassword">
                    @error('erepassword')
                    <small class="text-danger"> {{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                   <select class="form-select" id="edept" name="edept">
                        <option>CEO</option>
                        <option>HR</option>
                        <option>Markerting</option>
                        <option>Technical</option>
                    </select>
                    <label for="edept" class="form-label">Select One:</label>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
            </div>
        </div>
        </div>
    </div>

    {{-- Employe create modal end--}}
</section>

</main>


<footer>

</footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    @jquery
    @toastr_js
    @toastr_render
</body>
</html>   
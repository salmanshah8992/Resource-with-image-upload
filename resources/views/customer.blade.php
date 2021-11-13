<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Info </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- @toastr_css --}}
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
                 <h3 class="text-center"> Customer Information </h3>
                 <button class="btn btn-info" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Employe Add</button>
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
                        <th scope="col">password</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                         
                  
                        <tr>
                           <th scope="row">{{ $loop->index + 1}}</th>
                           <td>{{$customer->cname}}</td>
                           <td>{{ $customer->email }}</td> 
                           <td>
                               <img class="img-fluid rounded" style="width: 25%;" src="{{asset('images/customer')}}/{{$customer->image}}" alt="customer">
                           </td> 
                           <td>{{ $customer->phone }}</td>
                           <td>{{ $customer->psw }}</td>
                           <td>{{ $customer->mess }}</td>
                          
                            <td>
                               <button class="btn btn-info" type="submit" data-bs-toggle="modal" data-bs-target="#editModal{{$customer->id}}">Update</button>
                              
                           </td>
                           <td> <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$customer->id}}"> Delete</button></td>
   
                           @endforeach 
                        
                        </tbody>
                        
                        </table>
         </div>
        </div>
        </Section>


 {{-- Customer create modal --}}
 <div class="container ">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Customer Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('customer.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Customer Name:</label>
                <input type="text" class="form-control @error('cname') is-invalid @enderror" id="recipient-name" name="cname">
                @error('cname')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Cutomer eMail:</label>
                <input type="email" class="form-control @error('email') is-invalid  @enderror" id="recipient-name" name="email">
                @error('email')
                <small class="text-danger"> {{ $message }}</small>
            @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Customer Image:</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="recipient-name" name="image">
                @error('image')
                <small class="text-danger"> {{ $message }}</small>
            @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Phone:</label>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="recipient-name" name="phone">
                @error('phone')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="password" class="form-control @error('psw') is-invalid @enderror" id="recipient-name" name="psw">
                @error('psw')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Message:</label>
                <textarea  rows="4" cols="50"class="form-control @error('mess') is-invalid @enderror" id="recipient-name" name="mess" >
                 Write ...
                </textarea>
                @error('mess')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>

           

            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
        </div>
    </div>
    </div>
</div>

{{-- Customer create modal end--}}





</section>

</main>


<footer>

</footer>

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    {{-- @jquery
    @toastr_js
    @toastr_render --}}
</body>
</html>   





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create</title>
</head>
<body class="p-5">
    <h1 class="text-center">Add Product</h1>
   <table class="table table-bordered">
        <form action="{{route('create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>

                <label>Image</label>
                <input type="text" name="image" class="form-control" required>

                <label>Description</label>
                <input type="text" name="description" class="form-control" required>

                <label>Price</label>
                <input type="number" name="price" class="form-control" required>
                
                <input type="submit" name="submit" class="btn btn-primary mt-3 shadow">
                <a href="{{route('dashboard')}}" class="btn btn-primary mt-3 shadow">Back</a>
            </div>
        </form>
    
   </table>
</body>
</html>
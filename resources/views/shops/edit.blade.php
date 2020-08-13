@extends('layouts.app')

@section('content')
<form action='{{ route("products.store")}}' method="POST" class='form' style="margin:auto;" style='border:solid grey;border-radius:25px' >
    @csrf
    <div class='form-group'>
        <label>Title</label>
        <input type='text' name="title" placeholder="title" class='form-control col-lg-4'></input>
    </div>
    <div class='form-group'>
        <label>Description</label>
        <textarea class="form-control col-lg-4" name='description' placeholder='Description'></textarea>
    </div>
    <div class='form-group'>
        <label>Price</label>
        <input type="number" class='form-control col-lg-4' name="price"></input>
    </div>        
    <button class='btn btn-primary' type='submit'> Edit</button>
</form>
@endsection
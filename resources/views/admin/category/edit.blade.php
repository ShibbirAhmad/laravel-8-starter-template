<form action="{{ route('category.update', $category->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Category Name</label>
        <input class="form-control" type="text" value="{{ $category->name }}" name="name" placeholder="EX:blogs">
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>

</form>



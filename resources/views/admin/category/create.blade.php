<form action="{{route('category.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">Category Name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:blogs">
    </div>
  
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>


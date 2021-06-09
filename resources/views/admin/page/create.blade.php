<form action="{{route('page.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">Page Name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:blogs">
    </div>
    <div class="form-group">
        <label for="">Page Content</label>
        <textarea name="content" id="demo1" placeholder="page content" class="form-control"></textarea>
    </div>
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

<script>
new SimpleMDE({
    element: document.getElementById("demo1"),
    spellChecker: false,
});
</script>
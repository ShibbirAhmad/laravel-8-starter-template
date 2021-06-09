<form action="{{ route('page.update', $page->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Page Name</label>
        <input class="form-control" type="text" value="{{ $page->name }}" name="name" placeholder="EX:blogs">
    </div>
    <div class="form-group">
        <label for="">Page Content</label>
        <textarea name="content" id="demo1" placeholder="page content" class="form-control">

            {!! $page->content !!}
        </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<script>
    new SimpleMDE({
        element: document.getElementById("demo1"),
        spellChecker: false,
    });

</script>

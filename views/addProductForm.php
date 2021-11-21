<form action="/save_product" method="post" enctype="multipart/form-data">
    <input type="text" name="name">
    <input name="images[]" type="file" multiple="multiple" />
    <textarea type="text" name="description"></textarea>
    <button type="submit">Save</button>
</form>

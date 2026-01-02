<script src="{{ asset('js/tinymce/tinymce/tinymce.min.js') }}" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
  tinymce.init({
    selector: 'textarea#editor_wrapper',
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    license_key: 'gpl'
  });
</script>
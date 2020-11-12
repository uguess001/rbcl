<script src="https://cdn.tiny.cloud/1/utarad8euaixodxs7j5km6a4znkl3ctjrlbzziyq0jdxupqs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">





 // DatePicker();





  function DatePicker() {

    $('.datepick').datepicker({

         autoclose: true,
         startDate: '2017',

         format: 'yyyy-mm-dd',

    });

  }




tinymce.init({
  selector: '.tsm-editor',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});



</script>
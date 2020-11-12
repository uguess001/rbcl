<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">


<p>
  This is the most minimal example of Dropzone. The upload in this example
  doesn't work, because there is no actual server to handle the file upload.
</p>

<!-- Change /upload-target to your upload address -->
<form id="upload-widget" action="<?=base_url().'admin/gallery/do_upload'?>" class="dropzone" enctype="multipart/form-data">
    
<div class="fallback">
    <input name="file" type="file" />
  </div>

</form>


<!-- 
<script type="text/javascript">
    
    $(".dropzone").dropzone({
    url: "<?=base_url().'admin/gallery/do_upload'?>",
    addRemoveLinks : true,
    maxFilesize: 500,
 
    headers: {
        'X-CSRFToken': '<?php echo $this->security->get_csrf_hash(); ?>'
    }


});
</script> -->

<script>
   var serverresponse={};
    Dropzone.options.uploadWidget = {
  paramName: 'file',
  maxFilesize:10, // MB
  maxFiles: 100,
  dictDefaultMessage: 'Drag an image here to upload, or click to select one',
 
 //acceptedFiles: 'image/*',

 
  init: function() {
    this.on('success', function( file, resp ){
        resp=JSON.parse(resp);
         console.log( file );
      console.log( resp );
       alert(typeof(resp.status));
       if(resp.status=='success'){

        console.log(resp.message);
       }
       //file.previewTemplate.appendChild(document.createTextNode('ss'));
      //  file.previewTemplate='div.dz-preview.dz-processing.dz-error';

       // this.emit('thumbnail', file, serverResponse.imageUrl);

        // if(!(resp.status=='success')){
        //     //done(resp.message);
        //     // file.rejectDimensions

        // } 
        //  else{

        //    // done('File Uploaded Successfully');
        // }     
     
    });
//     this.on('thumbnail', function(file) {
//       // if ( file.width < 640 || file.height < 480 ) {
//       //   file.rejectDimensions();
//       // }
//       // else {
//       //   file.acceptDimensions();
//       // }alert()
// //       alert(as);
// //       alert(assaas);
// //       alert(file);
// // alert(serverresponse.status);
//      if(serverresponse.status=='success'){

//             file.acceptDimensions();
//      }else{

//          file.rejectDimensions();
//      }
      
//      // file.acceptDimensions();
//     });
  }
  //,
  // accept: function(file, done) {
  //   file.acceptDimensions = done;
  //   file.rejectDimensions = function() {
  //     done('error')
  //   };
  // }
};
</script>
                 
 

	<!-- script for ensglish datepicker -->
 

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?=$this->Version?>
    </div>
    <strong>Copyright &copy; <?=$SiteDetails->copyright_year?> <a href="<?=base_url()?>"> <?php echo (isset($SiteDetails) && !empty($SiteDetails))? $SiteDetails->site_name : ''; ?></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


<script type="text/javascript">
  $(document).ready(function(){
    
    var option = '';
    $("#District").change(function(){
      var _data={District:$("#District").val()}
      $.ajax({
        url:'<?=base_url()?>Admin/GetVDCByDist',
        success: function(response){
          var data = JSON.parse(response)          
          
          option='';
          $.each( data.VDC, function( key, value ) {
            option+='<option value="'+value.DistVdcID+'" >'+value.VDCDesc+'</option>';
          });
          $("#SelectVDC").empty();
          $("#SelectVDC").append(option);
        },
        data:_data,
        type:'post'
      })
    })

/*RemovedAndAjax*/

          $('.remove_row').click(function () {
          $.ajax({
          url: $(this).attr('ajax_url'),
          data: {key_field: $(this).attr('key_field'),post_method:'ajax',key_value:$(this).attr('id'),table_name:$(this).attr('table_name')}, 
          dataType: 'json',
          type: 'post',
          contentType: "application/x-www-form-urlencoded",
          success: function (response) {
            if(response.status=='success') {
              $('#'+response.id).closest("tr").remove();    
            }
          }
          }); 

          });
/*RemovedAndAjax*/
  })



</script>


 

<script type="text/javascript">
  
  $(document).ready(function(){
  $(document).delegate(".disable-member", "click", function(event){
    $.ajax({
            url:'<?=base_url()?>admin/trainingregistration/DisableSchedule',
            data:{ScheduleID:$(this).attr('event-key')},
            type:'post',
            success:function(response){
              //console.log(JSON.parse(response).data)
              //.console.log()
              //$(this).remove();
              //$('#myTableRow').remove();
              $('#row_event_'+JSON.parse(response).data).remove()

                console.log($('#ManageMembertable tr').length);
              if($('#ManageMembertable tr').length==1){
                var table = document.getElementById("ManageMembertable");
                var thead='<thead class="bg-primary"><tr><th width="1%">SN</th><th>TrainingStartDate</th><th>TrainingDuration</th><th>TrainingCost</th><th>Action'+
                '</th></thead>';
                var row="<tbody>";

                while(table.rows.length > 0) {
                  table.deleteRow(0);
                }

                row+=('<tr><td colspan="5">No Record Available.')
                row+=('</body>')
                $('#ManageMembertable').append(thead+row)
              }



              //console.log($('#ManageMembertable').length)
              /*console.log(JSON.parse(response).data);
              if(JSON.parse(response).data==null){
                row+=('<tr><td colspan="5">No Record Available.')
                //$('#ManageMembertable').append(row);
              
            }*/
 
            //row+='</tbody>';

              
            },
            error: function(response){

            }
    })
  });

    $(".viewEvent").click(function(){
      //alert($("#viewEvent").attr('training-code'))
      //console.log($(this).attr('training-code'))
      var table = document.getElementById("ManageMembertable");
      var thead='<thead class="bg-primary"><tr><th width="1%">SN</th><th>TrainingStartDate</th><th>TrainingDuration</th><th>TrainingCost</th><th>Action'+
      '</th></thead>';
      var row="<tbody>";

      while(table.rows.length > 0) {
        table.deleteRow(0);
      }

      var form_data = {TrainingRegistrationID:$(this).attr('training-code')}
      $.ajax({
          data: form_data,
          url:'<?=base_url()?>admin/trainingregistration/ViewEventsByTrainingRegistraionID',
          type:'post',
          success: function(response){
            data = JSON.parse(response)

      /*      var counter=1;
            $.each(data.table_data,function(key,value){ 

              row+=('<tr id=row_event_'+value.TrainingParticipantsRegistrationFormId+'><td>'+(counter++)+'<td>'+value.TrainingStartDate+'<td>'+value.TrainingDuration+'<td>'+value.TrainingCost+'<td>'+
                '<a rel="tooltip" class="btn btn-success btn-sm RemoveEvent"  href="'+data.url+'admin/trainingregistration/MemberManagement/'+value.TrainingParticipantsRegistrationFormId+'">'+
                '<i class="fa fa-user-plus" aria-hidden="true" title="Add Member"></i></a>'+    
                '<a rel="tooltip" class="disable-member btn btn-success btn-sm" event-key="'+value.TrainingParticipantsRegistrationFormId+'">'+ 
                '<i class="fa fa-times" aria-hidden="true" title="Disable"></i></a>'
              )
              //value.TrainingParticipantsRegistrationFormId
            })
*/
if(data.table_data.length==0){
  row+=('<tr><td colspan="5">No Record Available.')
}else{
      var counter=1;
            $.each(data.table_data,function(key,value){               
              //console.log(value.length);

              row+=('<tr id=row_event_'+value.TrainingParticipantsRegistrationFormId+'><td>'+(counter++)+'<td>'+(value.TrainingStartDate!=null?value.TrainingStartDate:'')+'<td>'+(value.TrainingDuration!=null?value.TrainingDuration:'')+'<td>'+(value.TrainingCost!=null?value.TrainingCost:'')+'<td>'+
                '<a  class="btn btn-success btn-xs RemoveEvent"  href="'+data.url+'admin/trainingregistration/MemberManagement/'+value.TrainingParticipantsRegistrationFormId+'">'+
                '<i class="fa fa-user-plus" aria-hidden="true" data-toggle="tooltip"  data-original-title="Add Member"></i></a>'+    
                '<a class="disable-member btn btn-success btn-xs" event-key="'+value.TrainingParticipantsRegistrationFormId+'">'+ 
                '<i class="fa fa-times" aria-hidden="true" data-toggle="tooltip"  data-original-title="Disable"></i></a>'
              )
              //value.TrainingParticipantsRegistrationFormId
            }) //loopEndHere
    }

            row+='</tbody>';
            $('#ManageMembertable').append(thead+row);
          },
          error: function(response){

          }

      })
      /*for(var i=0;i<5;i++) {
        row+='<tr><td>'+i;        
      }*/

    });


  });


</script>



<script>
	$(document).ready(function(){
		$('.nepali-calendar').nepaliDatePicker();
    $('.sidebar-toggle').click(function(){
      var bodylength = $("body")[0].classList.value.split(' ').length;
/*      $.ajax({
        type:"post",
        url:"<?=base_url()?>"
      })*/

      console.log($("body")[0].classList.value.split(' ').length)
      if(bodylength==4){
       $("body").removeClass("page"); 
      }
      else
      {
      $('body').addClass("page");  
      }
      //$("body").removeClass("page");
      
      //alert("clicked");

    })
	});

</script>

<!-- databtal -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">  -->
<link rel="stylesheet" type="text/css" href="<?=ADMIN_RESOURCE_PATH?>plugins/datatables/dataTables.bootstrap.css"> 
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.0.0/css/dataTables.responsive.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">  -->
<link rel="stylesheet" type="text/css" href="<?=ADMIN_RESOURCE_PATH?>plugins/datatables/jquery.dataTables.min.css"> 



<!-- <script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.0/js/dataTables.responsive.min.js"></script> -->
<!-- <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" language="javascript" src="<?=ADMIN_RESOURCE_PATH?>plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();

});
</script>
<!-- databtal -->




<!-- Type of Organization,District,Organization Name,NameOfMember Cascade -->
<script type="text/javascript">
$('#TypeOfOrganization').change(function(){
    var option = '';
    option += "<option value=''>--Select District--</option>";
    if(TypeCascadeDst().length>0) {
        $.each(TypeCascadeDst(), function(i, item) {
            option += "<option value='" + item.id + "'>" + item.district_name + "</option>";
        });
    }
    $('#DistrictOrgan').html(option);

});

$('#DistrictOrgan').change(function(){

    var option = '';
    option += "<option value=''>--Select Organization--</option>"; 
    if(DstCascadeOrgan().length>0) {
        $.each(DstCascadeOrgan(), function(i, item) {
            option += "<option value='" + item.OrganizationRegistrationID + "'>" + item.GroupCoopCompanyAgroVetName + "</option>";
        });
    }
    $('#OrganizationName').html(option);

}); 

$('#OrganizationName').change(function(){
    var option = '';
    option += "<option value=''>--Select Member--</option>";
    if(OrganCascadeMem().length>0) {
        $.each(OrganCascadeMem(), function(i, item) {
            option += "<option value='" + item.OrganizationMemberRegistrationId + "'>" + item.Name + "</option>";
        });
    }
    $('#NameOfMember').html(option);

});
 


</script>
  <!-- iCheck 1.0.1 -->
<script src="<?=ADMIN_RESOURCE_PATH?>plugins/iCheck/icheck.js"></script>

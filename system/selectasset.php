<?php 
include ('dbcon.php');

if($_POST['id']){
	$loc=$_POST['id'];
	if($loc==1){?>

  <form class="form-horizontal" action="" method="post">
                     
                      <div class="form-group row">
                        

                         <div class="col-4">
                          <lable>Faculty :</lable>
                          <select class="form-control" id="facnm" name="facnm" size="" value="">
                            <option value="">Select Faculty</option>
<!-- //including database connection   -->                          
<?php 
          $query=mysqli_query($con,"SELECT * FROM faculty ");
          while($row=mysqli_fetch_array($query)){
            $id=$row['Id'];
            $facnm=$row['FacultyName'];
            echo '<option value="'.$id.'">'.$facnm.'</option>';

}


           ?>
                            
                           
                          </select>
                        </div>
                        <div class="col-4">
                        <button type="button" name="add" id="add" class="btn btn-warning fa fa-plus btn-sm">Add Item</button>
                         
                        </div>
                        </div><br>
                         <div class="table-resposive col-12">
                        <table class="table table-striped table bordered" id="user_data">
                          <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Qty</th>
                            
                            <th>details</th>
                            <th>Remove</th>
                            <th></th>
                          </tr>
                        </table>
                        <div align="center">
                          <input type="submit" name="insert" id="insert" class="btn btn-primary btn-sm" value="insert">
                        </div>
                       
                      
                         
                          </form>	
                           <div id="user_dialog" title="Add Data">
                          <div class="form_group">
                            <label for="spptype" >Item Type</label>
                    	<select class="form-control" id="itemty" name="itemty" size="" value="">
                            <option value="">Select Type</option>
<?php 
          $query2=mysqli_query($con,"SELECT * FROM itemtype ");
          while($row3=mysqli_fetch_array($query2)){
            $sid=$row3['Id'];
            $spptype=$row3['ItemName'];
            echo '<option value="'.$sid.'">'.$spptype.'</option>';//string concatination php, string, php, string

}


?>
                            
                           
                          </select>
                          <span id="error_sptype" class="text-danger"></span>
                          
                          </div>
                          <div class="form_group" >
                            <label for="sp">Items</label>
                            <input type="text" name="item" id="item" class="form-control">
                             <span id="error_spitem" class="text-danger"></span>
                          </div>
                          <div class="form_group">
                            <label for="qty">Qty</label>
                            <input type="text" class="form-control" name="qty"  id="qty">
                            <span id="error_qty" class="text_danger"></span>
                            <span id="abl_qty" class="text_danger"></span>
                          </div>
                          <div class="form_group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price">
                            <span id="error_price" class="text_danger"></span>
                          </div>
                          <div class="form-group" align="center">
                           <br>
                            <input type="hidden" name="row_id" id="hidden_row_id">
                            <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                          </div>

                  		</div>
                  		<div id="action_alert" title="Action">
                  		 </div>
<?php include 'scripts.php'; ?>
 <script>
  $(document).ready(function(){
    $('#user_dialog').dialog({
      autoOpen:false,
      width:400
    });
    $('#add').click(function(){
      $('#user_dialog').dialog('option','title','Add Data');
      $('#spptype').val('');
      $('#spnm').val('');
      $('#qty').val('');
      $('#price').val('');
      $('#error_qty').text('');
      $('#error_price').text('');
      $('#error_spptype').text('');
      $('#error_spitem').text('');
      $('#spptype').css('border-color','');
      $('#sp').css('border-color','');
      $('#save').text('Save');

      $('#user_dialog').dialog('open');

    });
    $('#save').click(function(){

      var spptype='';
      var spnm='';
      var qty='';
      var price='';
      var unit='';
      var tot='';
      var apcode=$('#apcode').val();
      var error_spptype='';
      var error_spnm='';
      var error_qtynm='';
      var error_price='';
      if(!$('#spptype').val()){
        error_spptype='spptype required';
        $('#error_spptype').text(error_spptype);
        $('#spptype').css('border-color','#cc0000');
        spptype='';
      }else{
          error_spptype='';
           $('#error_spptype').text(error_spptype);
           $('#spptype').css('border-color','');
           spptype=$('#spptype').val();
      }
       if(!$('#spnm').val()){
        error_spnm='spnm required';
        $('#error_spitem').text(error_spnm);
        $('#spnm').css('border-color','#cc0000');
        spnm='';
      }else{
          error_spnm='';
           $('#error_spitem').text(error_spnm);
           $('#spnm').css('border-color','');
           spnm=$('#spnm').val();
      }

       if($('#qty').val()==""){
        error_qtynm='qty required';
        $('#error_qty').text(error_qtynm);
        $('#qty').css('border-color','#cc0000');
        qty='';
      }else{
          error_qtynm='';
           $('#error_qty').text(error_qtynm);
           $('#qty').css('border-color','');
           qty=$('#qty').val();
      }
       if($('#price').val()==""){
        error_price='price required';
        $('#error_price').text(error_price);
        $('#price').css('border-color','#cc0000');
        price='';
      }else{
          error_price='';
           $('#error_price').text(error_price);
           $('#price').css('border-color','');
           price=$('#price').val();
           unit=price*qty;
           
      }
           if(error_price!='' || error_qtynm!='' || error_spptype!='' || error_spnm!=''){
        return false;
      }else{
        if($('#save').text()=='Save'){
          // alert($('#save').text());
          

          var count=count+1;
        
          var output='<tr id="row_'+count+'">';
          output+='<td>'+spptype+'<input type="hidden" name="hidden_spptype[]" id="spptype'+count+'" class="spptype" value="'+spptype+'"> </td>';
          output+='<td>'+spnm+'<input type="hidden" name="hidden_spnm[]" id="spnm'+count+'" value="'+spnm+'"> </td>';
          output+='<td>'+qty+'<input type="hidden" name="hidden_qty[]" id="qty'+count+'" value="'+qty+'"> </td>';
          output+='<td>'+unit+'<input type="hidden" name="hidden_price[]" id="price'+count+'" value="'+unit+'"> </td>';
          output+='<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'" > View</button></td>';
          output+='<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'" > Remove</button></td>';

          output += '</tr>';
           tot+=unit;
         
         
          $('#user_data').append(output);

        }else{
          var row_id=$('#hidden_row_id').val();
           output+='<td>'+spptype+'<input type="hidden" name="hidden_spptype[]" id="spptype'+row_id+'" value="'+spptype+'"> </td>';
          output+='<td>'+spnm+'<input type="hidden" name="hidden_spnm[]" id="spnm'+row_id+'" value="'+spnm+'"> </td>';
          output+='<td>'+qty+'<input type="hidden" name="hidden_qty[]" id="qty'+row_id+'" value="'+qty+'"> </td>';
          output+='<td>'+price+'<input type="hidden" name="hidden_price[]" id="price'+row_id+'" value="'+price+'"> </td>';
          output+='<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'" > View</button></td>';
          output+='<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'" > Remove</button></td>';
          $('#row_'+row_id+'').html(output);
        }
        $('#user_dialog').dialog('close');
      }


    });
    $(document).on('click', '.view_details', function(){
        var row_id = $(this).attr("id");
        var spptype = $('#spptype'+row_id+'').val();
        var spnm = $('#spnm'+row_id+'').val();
        var qty = $('#qty'+row_id+'').val();
        $('#spptype').val(spptype);
        $('#spnm').val(spnm);
        $('#qty').val(qty);
        $('#save').text('Edit');
        $('#hidden_row_id').val(row_id);
        $('#user_dialog').dialog('option', 'title', 'Edit Data');
        $('#user_dialog').dialog('open');
    });

    $(document).on('click', '.remove_details', function(){
        var row_id = $(this).attr("id");
        if(confirm("Are you sure you want to remove this row data?"))
        {
            $('#row_'+row_id+'').remove();
        }
        else
        {
            return false;
        }
    });

    $('#action_alert').dialog({
        autoOpen:false
    });

    $('#user_form').on('submit', function(event){
        event.preventDefault();
        var count_data = 0;
        $('.spptype').each(function(){
            count_data = count_data + 1;
        });
        if(count_data > 0)
        {
            var form_data = $(this).serialize();
            $.ajax({
                url:"sppinsert.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    $('#user_data').find("tr:gt(0)").remove();
                    $('#action_alert').html('<p>Data Inserted Successfully</p>');
                    $('#action_alert').dialog('open');
                }
            })
        }
        else
        {
            $('#action_alert').html('<p>Please Add atleast one data</p>');
            $('#action_alert').dialog('open');
        }
    });

  });
</script>	
 <script>
    
    $(document).ready(function(){
      $('#spptype').change(function(){
        var stype1=$(this).val(); //$(#utype).val()
        $.ajax({
          type:"POST",
          url:"ss.php",//path.filename
          data:{id:stype1},//assign utype into id-id:ut2, id2:ut3
          cache:false,
          success:function(rdata){ //return data
            $('#spnm').html(rdata);
          }
        });
      });
        $('#spnm').change(function(){
        var stype1=$(this).val(); //$(#utype).val()
        $.ajax({
          type:"POST",
          url:"sss.php",//path.filename
          data:{id:stype1},//assign utype into id-id:ut2, id2:ut3
          dataType:"json",
          // cache:false,
          success:function(data){ //return data
            $('#price').val(data[0]["amount"]);
            $('#abl_qty').text('Avaliable Qty : '+data[0]["qty"]);
            $('#abl_qty').addClass('bg-warning');
          }
        });
      });
    });
  </script>
	<?php }
	
		
		
	}


 ?>
<x-app-layout>
<div class="container">
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Akses Program</h6>
              </div>
            </div>
          </div>
          <div class="card-body  px-0 pt-0 pb-2">
    {{-- <button style="margin-bottom: 10px" class="btn btn-primary success_all" data-url="{{ url('tambahSemuaAksesProgram') }}">Tambahkan semua yang dipilih</button> --}}
    <table id="datatable-search" class="table align-items-center mb-0">
        <tr>
            {{-- <th width="50px"><input type="checkbox" id="master"></th> --}}
            <th width="80px">No</th>
            <th>Nama Mahasiswa</th>
            <th width="100px">Action</th>
        </tr>
        @if($user->count())
            @foreach($user as $key => $i)
                <tr id="tr_{{$i->id}}">
                    {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$i->id}}"></td> --}}
                    <td>{{ ++$key }}</td>
                    <td>{{ $i->name }}</td>
                    <form action="{{url('storeAksesProgram')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$i->id}}">
                    <input type="hidden" name="program_id" value="{{$program->id}}">
                    <td>
                        <button type="submit" class="btn btn-success btn-sm" >Tambah</button>
                    </td>
                    </form>
                </tr>
            @endforeach
        @endif
    </table>
</div> <!-- container / end -->

{{-- 
<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var user_id = $("input[name=user_id]").val();
        var program_id = $("input[name=program_id]").val();
        var url = '{{ url('storeAksesProgram') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                  Code:user_id, 
                  Chief:program_id
                },
           success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});

</script>
<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to add this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script> --}}
<script>    
const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    searchable: true,
    fixedHeight: true
  });
  </script>

</x-app-layout>
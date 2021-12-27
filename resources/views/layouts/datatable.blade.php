<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
  } );
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  function getCustomSearch()
  {
   var url = '{{env('APP_URL')}}';	  
//   alert(url);
  }	  
  function sendInvite(id)
  {
	  var url="http://3.83.106.130/index.php/invite";//{{env('APP_URL')}}+'/invite'
  emailId=$('#invite_email_'+id).val();
	  alert(emailId);
   $.ajax({
    url : url,
    type : 'POST',
    data : {
    'event_id' : id,
    'email_id':	emailId  
    },
    dataType:'json',
    success : function(data) {              
	   // alert('Data: '+data);
	    display="<table>";
	    for(let i=0;i<data.length;i++)
	    {  display =display+"<tr><td>"+data[i]['event_id']+"</td><td>"+data[i]['email_id']+"</td></tr>";
	       
		    //$('#modalBody_'+id).append($display);
	    }
	    display = display + "</table>";
	    $('#modalBody_'+id).append(display);
	    
	    // modalBody_
		    //$('#modalBody_'+id).append('<p>Test</p>');
    },
    error : function(request,error)
    {
        alert("Request: "+JSON.stringify(request));
    }
})
  }
 </script>

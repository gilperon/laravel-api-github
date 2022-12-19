
@if($_GET['token']==$_COOKIE['token'])
{"Commodity": "{{ ucfirst($_GET['tipo']) }}","Data": "{{ date('d/m/Y') }}","Status": "200","Message": "Success"}
@else
{"State":403,"Message":"Access Denied"}
@endif

<!DOCTPE html>
<html>
<head>
    <title>View Student Records</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<center><body>
    <input type="text" class="form-controller" id="search" name="search">
    <table border = "1">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Department</td>
            <td>Designation</td>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->name }}</td>

            </tr>
        @endforeach
    </table>
    </body></center>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
                $('tbody').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
</html>
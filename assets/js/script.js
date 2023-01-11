$(document).ready(function(){
    fetch_all();
    $('#search_bar').keyup(function(){
        let name=$('#search_bar').val();
        if(name){
            $.ajax({
                type:'POST',
                url:'php_scripts/ajax_search.php',
                data:{name},
                success:function(e){
                    let employees=JSON.parse(e);
                    let template='';
                    employees.forEach(emp => {
                        template+=
                        '<tr>'+
                        '<td>'+emp.id+'</td>'+
                        '<td>'+emp.username+'</td>'+
                        '<td>'+emp.firstname+'</td>'+
                        '<td>'+emp.lastname+'</td>'+
                        '<td>'+emp.email+'</td>'+
                        '<td>'+emp.password+'</td>'+
                        '<td><img src="assets/images/['+emp.image+']" alt="" style="width: 64px;"></td>'+
                        '<td>'+emp.role+'</td>'+
                        '<td>'+
                            '<a href="update_employee.php?id='+emp.id+'" class="btn btn-primary">Edit</a>'+
                            '<a href="?delete_id=='+emp.id+'" class="btn btn-danger">Delete</a>'+
                        +'</td>'+
                        +'</tr>';

                    });
                    $('#main_table').html(template);
                }
            });
        }else{
            fetch_all();
        }
    });
    function fetch_all(){
        let action='fetch_all';
        $.ajax({
            type:'POST',
            url:'php_scripts/ajax_search.php',
            data:{action},
            success:function(e){
                let employees=JSON.parse(e);
                let template='';
                console.log(employees);
                employees.forEach(emp => {
                    template+=
                    '<tr>'+
                    '<td>'+emp.id+'</td>'+
                    '<td>'+emp.username+'</td>'+
                    '<td>'+emp.firstname+'</td>'+
                    '<td>'+emp.lastname+'</td>'+
                    '<td>'+emp.email+'</td>'+
                    '<td>'+emp.password+'</td>'+
                    '<td><img src="assets/images/'+emp.image+'" alt="" style="width: 64px;"></td>'+
                    '<td>'+emp.role+'</td>'+
                    '<td>'+
                        '<a href="update_employee.php?id='+emp.id+'" class="btn btn-primary">Edit</a>'+
                        '<a href="?delete_id=='+emp.id+'" class="btn btn-danger">Delete</a>'+
                    +'</td>'+
                    +'</tr>';

                });
                $('#main_table').html(template);
            }
        });
    }
});
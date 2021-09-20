
    $(document).ready(function(){
        $("#search").keyup(function(){
            $.ajax({
                url:'search/backend.php',
                type:'post',
                data: {search:$(this).val()},
                success:function(result){
                    $("#result").html(result);
                    let rows= document.querySelectorAll("tr[data-href]");

                    rows.forEach(row=>{
                        console.log("p");
                        row.addEventListener("click",()=>{
                            window.location.href= row.dataset.href;
                        });
                    });
                }
            });
        });
      });

      

$(document).ready(function(){
    $.ajax({
        url: "cartManage.php",
        type:"get",
        data: {
            type: "checkSess"
        },success: function(x){
            console.log(x);
        }
    });
    $(".logout").click(function(x){
        $.ajax({
            url: "cartManage.php",
            type: "post",
            data:{
                type: "logout"
            },
            success: function(data){
                if(data == "success"){
                    window.location = "index.php";
                }
            }
        })
    });
    $(".add").click(function(el){
        let temp1 = $(el.currentTarget);
        let price = temp1.parent().parent().find("#price").text();
        let name = temp1.parent().parent().find("#name").text()
        let itemId = temp1.parent().parent().find("#itemId").text()
        let type="add";
        $.ajax({
            url: "cartManage.php",
            type: "post",
            data:{
                name,
                price,
                itemId,
                type
            },
            success: function(data){
                if(data){
                    data = JSON.parse(data);
                    $(".cart-total").text(data.total);
                    
                    let current  = temp1.parent().find(".number").text();
                    temp1.parent().find(".number").text(Number(current)+1);
                }
            }
        })
    });
    $(".minus").click(function(el){
        let temp1 = $(el.currentTarget);
        let price = temp1.parent().parent().find("#price").text();
        let name = temp1.parent().parent().find("#name").text()
        let itemId = temp1.parent().parent().find("#itemId").text()
        let type="minus";
        $.ajax({
            url: "cartManage.php",
            type: "post",
            data:{
                name,
                price,
                itemId,
                type
            },
            success: function(data){
                if(data){
                    data = JSON.parse(data);
                    $(".cart-total").text(data.total);
                    let current  = temp1.parent().find(".number").text();
                    temp1.parent().find(".number").text(Number(current)-1);
                    if(data.total == 0){
                        $(".cart-total").text("");
                    }
                }
            }
        })
    });
    $(".nameSave").click(function(el){
        let userName = $("input[name='userName']").val();
        $.ajax({
            url: "cartManage.php",
            type: "post",
            data:{
                type: "login",
                userName
            },
            success: function(data){
                console.log(data);
                if(data){
                    
                    window.location = "page1.php";
                }else{
                    console.log("non");
                }
            }
        })
    });
    
});
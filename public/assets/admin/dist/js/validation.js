
$(function() {
   
    //----------------------blog category----------------------------------
    $("#addcategorymodal").on("click",()=>{
       $("#add_blog_category_modal").modal("toggle"); 
       $("#recipient-name1").val("");
    });

    $(".edit_services").on("click",function(){
        id  = $(this).data("id");
        names =$(this).data("name");
        description = $(this).data("description");
        $("#services_id").val(id);
        $("#services_name").val(names);
        $("#editservicesdescription").text(description);
        $("#edit_services_modal").modal("toggle");
    });

    $(".edit_blog_category").on("click",function(){
        id =$(this).data("id");
        $("#id").val(id);
        name =$(this).data("name");
        $("#editname").val(name);
        $("#edit_blog_category_modal").modal("toggle"); 
    });
    $("#addblogcategoryform").validate({
        rules: {
            name: {required: true,},
            },
        messages: {
            name: {required: "Please enter name",},
        },
            submitHandler: function(form) {
               var formData= new FormData(jQuery('#addblogcategoryform')[0]);
            jQuery.ajax({
                    url: "addblogcategory",
                    type: "post",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) { 
                    var obj = JSON.parse(data);
                    if(obj.status==true){
                        $('#add_blog_category_modal').modal("toggle");

                        jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                        setTimeout(function(){
                            jQuery('.result').html('');
                            window.location = "blogcategory_list";
                        }, 2000);
                    }
                    else
                    {
                        $('#add_blog_category_modal').modal("toggle");
                        
                        if(obj.status==false){
                            jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                      
                        }
                    }
                    }
                });
            }
    });
    
    $("#editblogcategoryform").validate({
            rules: {
                name: {required: true,},
                },
            messages: {
                name: {required: "Please enter name",},
            },
                submitHandler: function(form) {
                   var formData= new FormData(jQuery('#editblogcategoryform')[0]);
                jQuery.ajax({
                        url: "editblogcategory",
                        type: "post",
                        cache: false,
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data) { 
                        var obj = JSON.parse(data);
                        if(obj.status==true){
                            $('#edit_blog_category_modal').modal("toggle");
    
                            jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                            setTimeout(function(){
                                jQuery('.result').html('');
                                window.location = "blogcategory_list";
                            }, 2000);
                        }
                        else
                        {
                            $('#edit_blog_category_modal').modal("toggle");
                            
                            if(obj.status==false){
                                jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                          
                            }
                        }
                        }
                    });
                }
    });
//-------------------------------blog ---------------------------------------
    $("#blog_add_form").validate({
        rules: {
            blogimage: {required: true,},
            blog_category_id:{required:true},
            blog_title:{required:true},
            author_name:{required:true,},
            blog_public_date:{required:true},
            blog_description:{required:true}
            },
        messages: {
            blogimage: {required: "Please select blog image",},
            blog_category_id: {required: "Please select blog category",},
            blog_title: {required: "Please enter blog title",},
            author_name:{required:"Please enter author name",},
            blog_public_date:{required:"Please enter blog public date"},
            blog_description:{required:"please enter blog description"}
        },
            submitHandler: function(form) {
               var formData= new FormData(jQuery('#blog_add_form')[0]);
            jQuery.ajax({
                    url: "addblog",
                    type: "post",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) { 
                    var obj = JSON.parse(data);
                    if(obj.status==true){
                        jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                        setTimeout(function(){
                            jQuery('.result').html('');
                            window.location = "blog_list";
                        }, 2000);
                    }
                    else
                    {
                        if(obj.status==false){
                            jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                      
                        }
                    }
                    }
                });
            }
    });
    $("#blog_edit_form").validate({
        rules: {
         
            blog_category_id:{required:true},
            blog_title:{required:true},
            author_name:{required:true,},
            blog_public_date:{required:true},
            blog_description:{required:true}
            },
        messages: {
           
            blog_category_id: {required: "Please select blog category",},
            blog_title: {required: "Please enter blog title",},
            author_name:{required:"Please enter author name",},
            blog_public_date:{required:"Please enter blog public date"},
            blog_description:{required:"please enter blog description"}
        },
            submitHandler: function(form) {
               var formData= new FormData(jQuery('#blog_edit_form')[0]);
            jQuery.ajax({
                    url: "editblog",
                    type: "post",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) { 
                    var obj = JSON.parse(data);
                    if(obj.status==true){
                        jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                        setTimeout(function(){
                            jQuery('.result').html('');
                            window.location = "blog_list";
                        }, 2000);
                    }
                    else
                    {
                        if(obj.status==false){
                            jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                      
                        }
                    }
                    }
                });
            }
    });
    //========================services===================================
    $("#Services_add_form").validate({
        rules: {
         
            name:{required:true},
            description:{required:true}
            },
        messages: {
           name: {required: "Please enter services title",},
            description:{required:"please enter services description"}
        },
            submitHandler: function(form) {
               var formData= new FormData(jQuery('#Services_add_form')[0]);
            jQuery.ajax({
                    url: "manage_services",
                    type: "post",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) { 
                    var obj = JSON.parse(data);
                    if(obj.status==true){
                        jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                        setTimeout(function(){
                            jQuery('.result').html('');
                            window.location = "services_list";
                        }, 2000);
                    }
                    else
                    {
                        if(obj.status==false){
                            jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                      
                        }
                    }
                    }
                });
            }
    });

    $(".edit_services").on("click",function(){
        id =$(this).data("id");
        $("#servicesid").val(id);
        
        names =$(this).data("name");
        $("#editservicesname").val(names);
        description =$(this).data("description");
        console.log(description);
        $("#servicesdescription").val(description);
        $("#edit_services_modal").modal("toggle"); 
    });

    $("#editServicesform").validate({
        rules: {
         
            name:{required:true},
            description:{required:true}
            },
        messages: {
           name: {required: "Please enter services title",},
            description:{required:"please enter services description"}
        },
            submitHandler: function(form) {
               var formData= new FormData(jQuery('#editServicesform')[0]);
            jQuery.ajax({
                    url: "manage_services",
                    type: "post",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) { 
                    var obj = JSON.parse(data);
                    if(obj.status==true){
                        jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                        setTimeout(function(){
                            jQuery('.result').html('');
                            window.location = "services_list";
                        }, 2000);
                    }
                    else
                    {
                        if(obj.status==false){
                            jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                      
                        }
                    }
                    }
                });
            }
    });
    
   });
//=============================forget password=============================================
$("#forgetpassword").validate({
     rules: {
         
            email:{required:true}
            },
        messages: {
           email: {required: "Please enter email",}
        },
        submitHandler: function(form) {
               var formData= new FormData(jQuery('#forgetpassword')[0]);
            jQuery.ajax({
                    url: "manage_services",
                    type: "post",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data) { 
                    var obj = JSON.parse(data);
                    if(obj.status==true){
                        jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                        setTimeout(function(){
                            jQuery('.result').html('');
                            window.location = "services_list";
                        }, 2000);
                    }
                    else
                    {
                        if(obj.status==false){
                            jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                      
                        }
                    }
                    }
                });
            }
});

//========================services details===================================
$("#Services_Detals_add_form").validate({
    rules: {
        services_id:{required:true},     
        name:{required:true},
        description:{required:true},
        file:{required:true}
        },
    messages: {
        services_id:{"required":"Please select service"},
        name: {required: "Please enter services title",},
        description:{required:"please enter services description"},
        file: {required: "Please select image",},
    },
        submitHandler: function(form) {
           var formData= new FormData(jQuery('#Services_Detals_add_form')[0]);
        jQuery.ajax({
                url: "manage_servicesdetails",
                type: "post",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data) { 
                var obj = JSON.parse(data);
                if(obj.status==true){
                    jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                    setTimeout(function(){
                        jQuery('.result').html('');
                        window.location = "services_details_list";
                    }, 2000);
                }
                else
                {
                    if(obj.status==false){
                        jQuery('.result').html("<div class='alert alert-danger alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+obj.message+"</div>");
                  
                    }
                }
                }
            });
        }
});
//=================================profile update========================================

$("#update_admin_profile").validate({
    rules: {
        name:{required:true}
    
    },
        
    messages: {
    
        name: {required: "Please enter name",},
    },
        submitHandler: function(form) {
           var formData= new FormData(jQuery('#update_admin_profile')[0]);
        jQuery.ajax({
                url: "update_admin_profile",
                type: "post",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                
                success:function(data) { 
                
                var obj = JSON.parse(data);
                
                if(obj.status==true){
                    jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>"+obj.message+"</strong></div>");
                setTimeout(function(){
                        jQuery('.result').html('');
                            location.reload();
                        window.location = "my_profile";
                    }, 2000);
                }
                else{
                    if(obj.status==false){
                        jQuery('.result').html(obj.message);
                        jQuery('#name_error').css("display", "block");
                    }
                    
                }
                }
            });
        }
    });



patten ="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$";


      jQuery.validator.addMethod("passwordcheck", function(value, element, param) {
    return value.match(patten);
},'Please enter valid password');

$("#user_change_password").validate({
    rules: {
        old_password: {required: true,passwordcheck:true,},
        
        new_password: {required: true,passwordcheck:true,},
        
        confirm_password : {
            required: true,
            equalTo : "#new_password"
        }
    },
        
    messages: {

        old_password: {required: "Please enter old password",},
        new_password:{required:"please enter new password",},

    
    confirm_password:{required:"Please enter confirm password", equalTo:"Password and confirm password must be same"},
    },
        submitHandler: function(form) {
           var formData= new FormData(jQuery('#user_change_password')[0]);
        jQuery.ajax({
                url: "user_change_password",
                type: "post",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                
                success:function(data) { 
                
                var obj = JSON.parse(data);
                
                if(obj.status==true){
                    jQuery('#name_error').html('');
                    jQuery('#email_error').html('');
                    jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Change Password Successfully.</strong> </div>");
                    setTimeout(function(){
                        jQuery('.result').html('');
                        window.location = host_url+"user_list";
                    }, 2000);
                }
                else{
                    if(obj.status==false){
                        jQuery('.result').html(obj.message);
                        jQuery('#name_error').css("display", "block");
                    }
                    
                }
                }
            });
        }
    });
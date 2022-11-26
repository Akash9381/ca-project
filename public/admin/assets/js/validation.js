$("#userform").validate({
    rules:{
        name:{
            required:true,
            minlength: 2
        },
        email:{
            required:true,
            email:true
        },
        number:{
            required:true,
            minlength:10,
            maxlength:10
        },
        pan_card:{
            required:true
        },
        city:{
            required:true,
            minlength: 2
        }
    }

});

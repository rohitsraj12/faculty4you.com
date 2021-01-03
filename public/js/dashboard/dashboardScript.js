$(document).ready(function(){
    // alert('hi');
    // student email submission with ajex
    $("form.form-submit").on('submit', function(){

        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};

            that.find('[name]').each(function(index, value){
                // console.log(value);

                var that = $(this),
                name = that.attr('name'),
                value = that.val();

                data[name] = value;

                // console.log(name + " " + value);
            });

            $.ajax({
                url  : 'http://facultyforyou.com/dashboard/student/email/reminder_email.php',
                type : type,
                data : data,
                success: function(data){
                    alert(data);
                }
            });

            // console.log(data);
       return false;
    });

    // teacher membership reminder email submission with ajex
    $("form.teacher__form__submit").on('submit', function(){

        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};

            that.find('[name]').each(function(index, value){
                // console.log(value);

                var that = $(this),
                name = that.attr('name'),
                value = that.val();

                data[name] = value;

                // console.log(name + " " + value);
            });

            $.ajax({
                url  : url,
                type : type,
                data : data,
                success: function(data){
                    alert(data);
                }
            });

            // console.log(data);
        return false;
    });

    // teacher create profile info email submission with ajex
    $("form.teacher__ceate__profile").on('submit', function(){

        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};

            that.find('[name]').each(function(index, value){
                // console.log(value);

                var that = $(this),
                name = that.attr('name'),
                value = that.val();

                data[name] = value;

                // console.log(name + " " + value);
            });

            $.ajax({
                url  : url,
                type : type,
                data : data,
                success: function(data){
                    alert(data);
                }
            });

            // console.log(data);
        return false;
    })

    

    // expired teacher membership reminder email submission with ajex
    $("form.expired__member").on('submit', function(){

        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};

            that.find('[name]').each(function(index, value){
                // console.log(value);

                var that = $(this),
                name = that.attr('name'),
                value = that.val();

                data[name] = value;

                // console.log(name + " " + value);
            });

            $.ajax({
                url  : url,
                type : type,
                data : data,
                success: function(data){
                    alert(data);
                }
            });

            // console.log(data);
        return false;
    })
})
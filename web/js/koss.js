$('button.btn.btn-warning:not(:disabled)').click(function(e){



    	 console.log($(this).data( "ii" ));
    if (confirm('Вы уверенны, что хотите удалить файл, это действие необратимо?')) {
        // Save it!
        $.ajax(

            {

                url: "index.php?r=opisi/del-files",

                //dataType: 'text',

                type: 'get',

                //contentType: 'application/json',

                data: {

                    delfile: $(this).data( "delfile" ),
                    ii: $(this).data( "ii" ),


                },

                success: function(result){
                    console.log ('rez' , result);


                    var btn = $('button.btn.btn-warning[data-ii="'+result+'"]');

                    btn.addClass('disabled');
                    btn.attr("disabled", true);
                    var div = btn.closest("div");
                    div.css( "background-color", "red" );

                },

                error: function(e){

                    console.log('Ajax error', e);

                }

            });
    } else {
        // Do nothing!
    }



});


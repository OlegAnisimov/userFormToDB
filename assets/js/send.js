function formFeed() {
    $(document).ready(function(){

        $('#btn_submit').click(function(){
            let formName  = $('#name').val()
            let formEmail = $('#email').val()
            let formPhone = $('#phone').val()

            if (formName === "" || formEmail === "" || formPhone === ""  ) {
                $('#error').text("Все поля должны быть заполнены")
            } else  {
                $.ajax({
                    method: 'POST',
                    url: "send.php",
                    dataType: 'JSON',
                    data: {
                        'formName' : formName,
                        'formEmail': formEmail,
                        'formPhone': formPhone,
                    },
                    success: (data) => {
                        $('#error').html(data.result)
                    },
                    error: (data) => {
                        console.log(data.result)
                    }
                })
            }
        });
    });
}


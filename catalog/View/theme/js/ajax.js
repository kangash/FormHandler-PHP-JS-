$(function(){
     
    // start script
    $("[data-modal]").on('click', function(event) {
        event.preventDefault();
        let formData = new FormData();

        formData.append('firstname', $('#formFirstname').val());
        formData.append('lastname', $('#formLastname').val());
        formData.append('email', $('#formEmail').val());
        formData.append('password', $('#formPassword').val());
        formData.append('repeatPassword', $('#formRepeatPassword').val());

        $.ajax({
            type: 'POST',
            data: formData,
            url: '/ajaxRegistrationUser/',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            
            success: function(result) {
                const modalResult  = $('.result'); 
                const modalDialog  = $('.result__dialog');
                const modalTitle   = $('.result__title--modal');
                const modalContent = $('.result__content');
                const dataFormAtr  = $('[data-form]');
                const introBody    = $('.intro__body');
                // create Element
                var resultTitle = document.createElement('h2');

                //Error
                if (typeof result.error === 'object') {
                    resultTitle.classList.add('result__title--modal');

                    if (modalTitle.length == 0) {
                        modalDialog[0].appendChild(resultTitle);
                        resultTitle.textContent = 'Внимание!'
                    }

                    if (modalContent.length >= 1) {
                        $.each( modalContent, (key, val) => {
                            val.remove();
                        });
                    }

                    for (let key in result.error) {
                        let resultContent = document.createElement('p');
                        resultContent.classList.add('result__content');
                        resultContent.textContent = result.error[key];
                        modalDialog[0].appendChild(resultContent);
                    }
                
                    /* Open modal */
                    modalResult.addClass('show');
                } else if (typeof result.error === 'undefined') {
                     //Success
                    if (typeof result.success === 'string') {
                        /* Close form */
                        dataFormAtr.addClass('hide');
                        /* Close modal */
                        modalResult.removeClass('show');

                        //add body title
                        resultTitle.classList.add('result__title--body');
                        resultTitle.textContent = 'Поздравляем!'
                        introBody[0].appendChild(resultTitle);

                        //create element p
                        let resultContent = document.createElement('p');
                        resultContent.classList.add('result__content');
                        resultContent.textContent = result.success;
                        introBody[0].appendChild(resultContent);

                    } else if (typeof result.success === 'undefined') {

                    }
                }
                
            }
        });     

    });

    /* Close modal */
    $("[data-close]").on('click', function(event) {
        event.preventDefault();
        $('[data-result]').removeClass('show');

    });


});

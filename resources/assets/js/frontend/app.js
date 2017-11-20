/*Frontend App scripting */
$(function(){


    /**
     * This will call the Bootstrap DateTime Picker for release date
     */
    $('.form_dateonly').datetimepicker({
        useCurrent : true,
        defaultDate : 'now',
        ignoreReadonly : true, //enabled for readOnly fields
        format : 'YYYY-MM-DD'
    });

    /**
     * Bootstrap select2 for selecting multiple genres
     */
    $('#film_genres').select2({ minimumInputLength: 3, placeholder: "Pick/Create Genres", allowClear: true, multiple : true, tags: true, tokenSeparators: [","],
        createTag: function (film_genre) { return { id: film_genre.term, text: film_genre.term, isNew : true }; },
        createSearchChoice: function(params, data) {
            if ($(data).filter(function() {
                    return this.text.localeCompare(params.term) === 0;
                }).length === 0) {
                return { id: $.trim(params.term), text: $.trim(params.term) };
            }
        },
        escapeMarkup: function (markup) { return markup; },
        ajax: { url: "/films/genres", dataType: 'json', type: 'POST', delay: 250, cache: true, data: function (params, page) { return { query: params.term }; },
            processResults: function (data, page) { return { results: data }; }
        }
    });

    //syncing the select2's Post saved Tags to look like as a tag in the Post Tags field
    //$('#film_genres > option').prop("selected","selected");
    //$('#film_genres > option').trigger("change");

    /**
     * This will save the comment
     */
    /*$('form#comment_form').submit(function(event) {

        event.preventDefault(); // Prevent the form from submitting via the browser
        var formdata = $(this).serialize();

        $.ajax({
            url: '/films/comments',
            type: "POST",
            dataType: "json",
            data: {
                // you didn't use your 'var formdata'
                formdata: formdata,
                '_token': $('input[name=_token]').val()
            },
            success: function (response) {
                console.log("Response", response);
            }
        });
    });*/

    $('#form#comment_form').ajaxForm(function(response) {
        console.log("response", response);
    });


});
'use strict' ;


function onRemoveButtonClick(event)
{
    event.preventDefault();

    if(confirm("êtes vous sûr de vouloir supprimer cet élément ?"))
    {
        let url = $(this).data('url');
        console.log(url);

        let sendData = {id: $(this).data('id')};
        console.log(sendData);

        $.getJSON(url, sendData, onRemoved.bind($(this)));
        console.log($(this));
    }

}

function onRemoved(data)
{
    console.log("hello");
    let container = $(this).parents(".removable-container");
    container.fadeOut("slow", function () {
        container.remove();
    })
}

// function onReloadButtonClick(event)
// {
//     event.preventDefault();
//
//     if(confirm("êtes vous sûr de vouloir Modifier ?"))
//     {
//         let url = $(this).data('url');
//         console.log(url);
//
//         let sendData = {id: $(this).data('id')};
//         console.log(sendData);
//
//         $.getJSON(url, sendData, onReload.bind($(this)));
//         // console.log($(this));
//     }
//
// }
//
// function onReload(data)
// {
//     console.log("hello");
//     let container = $(this).parents(".removable-container");
//     container.fadeOut("slow", function () {
//         container.fadeIn("slow");
//     })
// }



$(function () {
    $(".ajax-remove-button").on('click', onRemoveButtonClick) ;
    // $(".ajax-reload-button").on('click', onReloadButtonClick) ;
    // $('#refresh').on('click', function() {
    //     location.reload();
    // });
});

// $(function(){
//     $("#formdish").submit(function(event){
//         event.preventDefault();
        // let url = $(this).data('url');
        // console.log(url);
        //
        // let sendData = {id: $(this).data('id')};
        // console.log(sendData);
        //
        // $.getJSON(url, sendData, onReload.bind($(this)));
        // console.log(url);
        // let nameDish = $( "input[type=text][name=name]:input" ).val();
        // let description = $( "textarea[type=text][name=description]" ).val();
        // let img         = $( "input[type=file][name=img]:input" ).val();
        // let activeTime  = $( "input[type=number][name=activeTime]:input" ).val();
        // let bakingTime  = $( "input[type=number][name=bakingTime]:input" ).val();
        // let service     = $( "input[type=number][name=service]:input" ).val();
        // let state       = $( "select[name=state]" ).val();
        // let type        = $( "select[name=type]" ).val();
        // let id          = $( "input[type=text][name=id]:input" ).val();
        // $.post(url,{nameDish: nameDish},function (data) {
        //     alert(data);
        // })
//     })
// });
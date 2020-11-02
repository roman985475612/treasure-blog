
function addActive(selector) {

    const items = document.querySelectorAll(selector);

    const curLocation = window.location.protocol + '//' + window.location.host + window.location.pathname;
   
    for (let item of items) {
        if (item.href === curLocation) {
            item.classList.add('active')
            break;
        }
    }    
}

addActive('#navbarSupportedContent a')
addActive('#left-navbar a')

jQuery(function($) {
    $(".form-file-input").on('change', function() {
        const filename = $(this).val().slice(12)
        
        $('.form-file-text').html(filename)
    })

    $('.numComments').text($('.bottom-comment').length + ' comments');

    var editor = CKEDITOR.replaceAll()
    CKFinder.setupCKEditor( editor )
})

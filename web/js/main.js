
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

var el = document.getElementById('confirm');

el.addEventListener('submit', function(){
    return confirm('Are you sure you want to submit this form?');
}, false);
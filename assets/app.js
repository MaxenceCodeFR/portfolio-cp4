const $ = require('jquery');

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

<?php

//always
//init analytics buttons
//before login

echo $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
echo $this->Html->script('jquery.min.js');
echo $this->Html->script('analytics.min.js');

//after login
if (isset($_POST['user_t_id']))
{
    echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.js');
    echo $this->Html->script('custom.min.js');
    echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.10.0/mode/clike/clike.min.js');
    echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.js');
    echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js');
}



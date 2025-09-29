<?php
echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
echo $this->Html->css('font.css');
echo $this->element('fontawesome');

if (isset($_POST['user_t_id']))
{
    echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.1/codemirror.min.css');
    echo $this->Html->css('https://codemirror.net/theme/dracula.css');
    echo $this->Html->css('https://cdn.jsdelivr.net/gh/devicons/devicon@v2.14.0/devicon.min.css');
    echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css');
    echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css');
    echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.css');
}
echo $this->Html->css('custom.css');
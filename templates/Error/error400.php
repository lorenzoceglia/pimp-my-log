<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\StatementInterface $error
 * @var string $message
 * @var string $url
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

?>

<h2>Hey tu! Che ci fai qui?</h2>
<?= $this->Html->image('luke2.png', ["style" => "width : 30vh;"]);?>
<h2>Errore 400</h2>

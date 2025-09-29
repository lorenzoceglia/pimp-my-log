<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Filesystem\Folder;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');


        $this->_setTableVariables();
        $this->_setConfigVariables();
        $this->_setTranslationText();

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function getConfig($name = null, $subkey = null)
    {
        return Configure::read($name, 'config')[$subkey];
    }

    public function getLang()
    {
        $lang = 'en';

        if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
        {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $acceptLang = ['it', 'en'];

            $lang = in_array($lang, $acceptLang) ? $lang : 'en';
        }
        return $lang;
    }

    private function _setTableVariables()
    {
        $dir = new Folder('../src/Model/Table');
        $files = $dir->find('.*\.php');
        foreach ($files as $file) {
            $variable = Inflector::underscore(str_replace(".php", "", $file));
            $this->$variable = TableRegistry::getTableLocator()->get(str_replace("Table.php", "", $file));
        }
    }

    private function _setConfigVariables()
    {
        $config = $this->getConfig(null, 'custom');
        foreach ($config as $key => $value) {
            $this->$key = $value;
            $this->set($key, $value);
        }
    }

    private function _setTranslationText()
    {
        $helper = [];
        $retrieved_lang = $this->getLang();
        foreach ($this->translations as $key => $value) {
            foreach ($value as $key_t =>$value_t)
            {
                $helper[$key .'_'. $key_t] = $this->translations[$key][$key_t][$retrieved_lang];

            }
        }
        $this->set('translations', $helper);
    }
}

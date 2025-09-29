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

use Cake\Chronos\Date;
use Cake\Core\Configure;
use Cake\Http\Client;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class DashboardController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function getAuthToken()
    {
        $this->autoRender = false;


        if($this->request->is('post')){
            $data = $this->request->getData();
            $t_token = $data['t_token'];
            $response_data = [];


            $retrieved_user = $this->users_table->getByTelegramToken($t_token);


                if(isset($retrieved_user['telegram_token']) && !is_null($retrieved_user['telegram_token']))
                {
                    $new_token = bin2hex(random_bytes(24));
                    $retrieved_user->auth_code = $new_token;
                    $this->users_table->save($retrieved_user);

                    $load = [
                        'auth_code' => '09f175684b95a93af5195c6bebbc23b2f9d	',
                        'new_auth_code' => $new_token,
                        'telegram_token' => $t_token,
                        'method' => 'addAuthCode'
                    ];

                    $http = new Client();
                    $response = $http->post('https://pimpmygw.it/api/request', json_encode($load),['type' => 'json']);

                    $response = $this->response;
                    $response = $response
                        ->withStatus(200)
                        ->withType('application/json');

                    $response_data['msg'] = 'auth_code_created!';
                    $response_data['auth_code'] = $new_token;

                    $response = $response->withStringBody(json_encode($response_data, JSON_FORCE_OBJECT));

                    return $response;
                }

        }
    }

    public function logout()
    {
        $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
    }

    public function index()
    {
        if($this->request->is('post'))
        {
            $data = $this->request->getData();

            $retrieved_user = $this->users_table->getByTelegramToken($_POST['user_t_id']);

            if(is_null($retrieved_user))
            {
                $new_user = $this->users_table->newEmptyEntity();
                $new_user->name = $_POST['name'];
                $new_user->surname = $_POST['family_name'];
                $new_user->nickname = $_POST['username'];
                $new_user->telegram_token = $_POST['user_t_id'];
                $new_user->auth_code = '';
                $new_user->create = new Date();

                if($this->users_table->save($new_user))
                {
                    $load = [
                        'auth_code' => '09f175684b95a93af5195c6bebbc23b2f9d	',
                        'name' => $new_user->name,
                        'surname' => $new_user->surname,
                        'nickname' => $new_user->nickname,
                        'telegram_token' => $new_user->telegram_token,
                        'method' => 'addUser'
                    ];

                    $http = new Client();
                    $response = $http->post('https://pimpmygw.it/api/request', json_encode($load),['type' => 'json']);
                    $this->set('logged_user', $new_user);
                }
            }

            else {
                $this->set('logged_user', $retrieved_user);
            }

        }

    }
}

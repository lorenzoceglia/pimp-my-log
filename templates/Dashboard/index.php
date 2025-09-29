<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6 text-center">
            <h5 class="card-title text-white mt-2"><?=$translations['header_title'];?></h5>
            <p class="text-white"><b class="text-fluo">Pimp my log!</b> <?=$translations['header_first'];?></p>
            <p class="mb-1 text-white"><?=$translations['header_second'];?></p>
            <p class="mb-1 text-white"><?=$translations['header_third'];?></p>

            <?php if(isset($logged_user['auth_code']) && empty($logged_user['auth_code'])) : ?>
                <button data-bs-toggle="modal" data-bs-target="#termsModal" class="terms-button btn btn-light m-3"><?= $translations['header_condition_text_button'];?></button>

                <div class="modal fade" id="termsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><?= $translations['header_condition_text_header'];?></h5>
                            </div>
                            <div class="modal-body terms-modal-body">
                                <?= $translations['header_condition_text_body'];?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $translations['header_condition_text_cancel'];?></button>
                                <button data-bs-dismiss="modal" t-token ="<?= (isset($logged_user['telegram_token'])) ? $logged_user['telegram_token'] : '' ; ?>" class="btn btn-primary m-3 auth-giver"><?= $translations['header_condition_text_confirm'];?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <div class="col-md-3">
        </div>
    </div>

    <?php if(isset($_POST['user_t_id'])) : ?>

        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center text-white">
                <span class="mb-5">Legenda:</span>
                <div class="col-md-12">
                    <a href="#documentation" class="mr-4 text-fluo">Documentazione</a>
                    <?php if(false) : ?>
                    <a href="#more" class="m-1 text-fluo">Altro</a>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row mt-5">
            <div class="col-md-2 col-lg-3">

            </div>
            <div class="col-md-8 col-lg-6">
                <div class="card rounded-card text-white mb-2">
                    <div class="card-header">
                        <?=$translations['test_title'];?>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Auth Token</span>
                            <input type="text" class="form-control test-auth-token" <?= (!empty($logged_user['auth_code']) ? "value=" .$logged_user['auth_code'] . "" : " placeholder=\" " . $translations['test_auth_token'] . "\"" )?> disabled aria-label="auth_token" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><?=$translations['test_message'];?></span>
                            <input type="text" class="form-control test-t-message" placeholder="<?=$translations['test_message'];?>" aria-label="message" aria-describedby="basic-addon1">
                        </div>
                        <select class="form-select method-select mb-3" aria-label="Default select example">
                            <option value="sendMessage">Text</option>
                            <option value="sendDebug">Json</option>
                        </select>
                        <div class="error-container">
                            <div class="alert warning alert-warning d-flex align-items-center d-none" role="alert">

                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="text-center m-1 warning-alert-message">
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="alert success alert-success d-flex align-items-center d-none" role="alert">

                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div class="text-center m-1 success-alert-message">
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="alert danger alert-danger d-flex align-items-center d-none" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="text-center m-1 danger-alert-message">
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class=" btn btn-block send-test btn-primary"><?=$translations['test_send'];?></button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-3">

            </div>
        </div>
    <?php else : ?>
        <div class="row mt-5 mb-5">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <?php if(!isset($_POST['user_t_id'])) : ?>
                    <script async src="https://telegram.org/js/telegram-widget.js?15" data-telegram-login="PimpMyLogBot" data-size="large" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
                    <script type="text/javascript">
                        function onTelegramAuth(user) {

                            const url = 'https://pimpmygw.it/api/request';
                            let data = {
                                auth_code : 'always',
                                method : 'updateStats',
                                analytics : 'telegram_logins'
                            };

                            $.ajax({
                                url: url,
                                crossDomain: true,
                                headers: {
                                    "accept": "application/json",
                                    "Access-Control-Allow-Origin":"*"
                                },
                                dataType: 'json',
                                type: 'post',
                                data: data,
                                success: function( response, textStatus, jQxhr ){
                                },
                                error: function( jqXhr, textStatus, errorThrown ){
                                    console.log( errorThrown );
                                }
                            });

                            let t_form = $('.t-data');
                            let hidden_item = $('.t-element');

                            let name = user.first_name;
                            var cloned = hidden_item.clone();
                            cloned.attr("name","name");
                            cloned.removeClass('t-element');
                            cloned.attr("value",name);
                            t_form.append(cloned);


                            let family_name = user.last_name;
                            var cloned = hidden_item.clone();
                            cloned.attr("name","family_name");
                            cloned.removeClass('t-element');
                            cloned.attr("value",family_name);
                            t_form.append(cloned);

                            let user_t_id = user.id;
                            var cloned = hidden_item.clone();
                            cloned.attr("name","user_t_id");
                            cloned.removeClass('t-element');
                            cloned.attr("value",user_t_id);
                            t_form.append(cloned);

                            let username = user.username;
                            var cloned = hidden_item.clone();
                            cloned.attr("name","username");
                            cloned.removeClass('t-element');
                            cloned.attr("value",username);
                            t_form.append(cloned);

                            t_form.submit();

                        }
                    </script>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
            </div>

        </div>
        <?php if(false): ?>
        <div class="row mt-7 mb-5">
            <h5 class="card-title text-white mt-2 text-center">Per cosa potresti usarmi?</h5>
            <div class="col-md-4 mt-2">
                <p class="text-white text-center">Effettua debug On-Fly non invalidanti sul funzionamento del tuo applicativo</p>
            </div>
            <div class="col-md-4 text-center mt-2 text-white">
                <p class="text-white">Effettua debug On-Fly non invalidanti sul funzionamento del tuo applicativo</p>
            </div>
            <div class="col-md-4 mt-2 text-center">
                <p class="text-white ">...E altro ancora!</p>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($_POST['user_t_id'])) : ?>
    <div class="row mt-3 mb-5">
        <div class="col-md-2 col-lg-3">
        </div>
        <div class="col-md-8 col-lg-6 text-center">
            <p class="mb-5 text-white h1"><?=$translations['wheel_title'];?></p>
            <div class="owl-carousel owl-theme">
                    <i name="php" class="fab language-selector fa-php lang-logo"></i>
                    <i name="cakephp" class="language-selector lang-logo devicon-cakephp-plain colored"></i>
                    <i name="jquery" class="language-selector lang-logo devicon-jquery-plain colored"></i>
                    <i name="javascript" class="fab language-selector fa-js-square lang-logo"></i>
                    <i name="angular" class="devicon-angularjs-plain colored language-selector lang-logo"></i>
            </div>
            <?php if(false) : ?>
                <div class="item"><i name="nodejs" class="fab language-selector fa-node-js lang-logo"></i></div>

                <div class="item"><i name="python" class="fab language-selector lang-logo fa-python"></i></div>

                <i name="nodejs" class="fab language-selector fa-node-js lang-logo ms-4"></i>

                <i name="java" class="fab language-selector fa-java lang-logo me-4"></i>
            <i name="python" class="fab language-selector lang-logo ms-4 fa-python"></i>
            <?php endif; ?>
        </div>
        <div class="col-md-2 col-lg-3">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-2 col-lg-3">

        </div>
        <div class="col-md-8 col-lg-6">
            <div class="row">
                <div class="col-md-6 mb-3 col-12">
                    <div class="card rounded-card text-white">
                        <div class="card-header">
                            <?=$translations['configurator_tech'];?>
                        </div>
                        <div class="card-body tech-view-card text-center">
                            <i name="php" class="fab fa-php lang-logo"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card rounded-card text-white">
                        <div class="card-header">
                            <?=$translations['configurator_configurator'];?>
                        </div>
                        <div class="card-body">
                            <select class="form-select mb-2  method-selector mb-3">
                                <option value="sendMessage">sendMessage</option>
                                <option value="sendDebug">sendDebug</option>
                                <option value="sendImage">sendImage</option>
                            </select>
                            <input class="form-control configurator-t-message" type="text" placeholder="message">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-3">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-2 col-lg-3">
        </div>
        <div class="col-md-8 col-lg-6">
            <div class="card rounded-card text-white code-container">
                <div class="card-header card-header-code" lang="php">
                    Codice PHP
                </div>
                <button data-clipboard-action="copy" data-clipboard-target="#sium" class="btn btn-sm copy-all-button btn-primary shadow-sm"><i class="fas text-white-50 fa-copy"></i><span class="copy-text"> <?=$translations['configurator_paste_button'];?></span></button>

                <textarea id='snippet' class="text-left"></textarea>

            </div>
        </div>
        <div class="col-md-2 col-lg-3">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-2 col-lg-2">

        </div>
        <div class="col-md-8 col-lg-8 text-white text-center">
            <p id="documentation" class="mb-3 text-white h1"><?=$translations['methods_documentation'];?></p>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="col-md-12 m-2 h3">
                        <?=$translations['methods_available_methods'];?>
                    </div>
                    <div class="col-md-12 m-2">
                        <span class="text-fluo">sendMessage</span>
                        <div class="col-md-12">
                            <?=$translations['methods_sendMessage'];?>
                        </div>
                    </div>
                    <div class="col-md-12 m-2">
                        <span class="text-fluo">sendDebug</span>
                        <div class="col-md-12">
                            <?=$translations['methods_sendDebug'];?>
                        </div>
                    </div>
                    <div class="col-md-12 m-2">
                        <span class="text-fluo">sendImage</span>
                        <div class="col-md-12">
                            <?=$translations['methods_sendImage'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2">
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-lg-2">

        </div>
        <div class="col-md-8 col-lg-8 text-white text-center">
            <p id="more" class="mb-2 text-white h1"><?=$translations['thanks_title'];?></p>
            <div class="row mt-3 mb-3 text-center">
                <?php if(false) : ?>
                <div  class="col-md-6 mb-2 col-12">
                    <a data-bs-toggle="modal" role="button" data-bs-target="#thanksModal"><?=$translations['thanks_thanks_to'];?></a>
                </div>
                <div class="modal fade text-dark" id="thanksModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><?=$translations['thanks_thanks_to'];?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body terms-modal-body">
                                <div class="row m-3">
                                    <div class="col-md-6 mb-2">
                                        Manuel Pirone <a href="https://www.linkedin.com/in/manuel-pirone-0824b0224/"><i class="fab fa-linkedin ms-2 text-primary"></i></a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <?=$translations['thanks_angular_contribute'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div data-bs-toggle="modal" role="button" data-bs-target="#techModal" class="col-md-12 mb-2 col-12">
                    <?=$translations['thanks_tech_list'];?>
                </div>
                <div class="modal fade text-dark" id="techModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><?=$translations['thanks_tech_list'];?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body terms-modal-body">
                                <div class="row m-3">
                                    <div class="col-md-6 mb-2">
                                        <a href="https://telegram.org/">Telegram</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="https://www.php.net/">PHP</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        v. 7.3
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="https://cakephp.org/">CakePHP</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        v. 4.3
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="https://getbootstrap.com/">Bootstrap</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        v. 5.02
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="https://fontawesome.com/">FontAwesome</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        v. 5.10
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="https://jquery.com/">JQuery</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        v. 3.5.1
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="https://owlcarousel2.github.io/OwlCarousel2/">OwlCarousel</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        v. 2.3.4
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="https://codemirror.net/">CodeMirror</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        v. 5.65
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2">
        </div>
    </div>
    <textarea id="sium" style="position: absolute; left: -999em;" class="copy-code-textarea"></textarea>
    <?php endif; ?>
</div>





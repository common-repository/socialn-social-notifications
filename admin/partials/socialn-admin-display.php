<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://socialn.io
 * @since      1.0.0
 *
 * @package    Socialn
 * @subpackage Socialn/admin/partials
 */
?>
    <!-- page styles -->
    <?php foreach($styles as $style): ?>
    <link rel='stylesheet' href='<?= $style ?>' type='text/css' media='all' />
    <?php endforeach; ?>
    <!-- This file should primarily consist of HTML with a little bit of PHP. -->
    <div id="socialn-settings-page" class="wrap">
        <div class="row">
            <div class="settings-col">
                <h1>SocialN Settings</h1>
                <form method="post" action="options.php" novalidate="novalidate">
                <?php
                    settings_fields( 'socialn_settings' );
                    do_settings_sections( __FILE__ );
                ?>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th scope="row">Status</th>
                                <td>
                                    <label for="socialn_status_1" aria-describedby="socialn_status_desription">
                                        <input name="socialn_status" type="radio" id="socialn_status_1" value="1" <?= $status ? 'checked' : '' ?>> Enabled
                                    </label>
                                    <label for="socialn_status_2">
                                        <input name="socialn_status" type="radio" id="socialn_status_2" value="1" <?= !$status ? 'checked' : '' ?>> Disabled
                                    </label>
                                    <p class="description" id="socialn_status_desription">
                                        You can enable/disable SocialN plugin with this setting.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="api_key">API Key</label>
                                </th>
                                <td>
                                    <input name="socialn_api_key" type="url" id="socialn_api_key" aria-describedby="socialn_api_key_desription" value="<?= $apiKey ?>" class="regular-text code">
                                    <p class="description" id="socialn_api_key_desription">You can get this from
                                        <a href="https://socialn.io/manage" target="_blank">SocialN management panel</a>. After login, please create website or click created
                                        website. On the website page, click
                                        <code>Instructions</code> and expand
                                        <code>Wordpress</code>.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Parameters</th>
                                <td>
                                    <label for="socialn_auto_start" aria-describedby="socialn_auto_start_desription">
                                        <input name="socialn_auto_start" type="checkbox" id="socialn_auto_start" value="1" <?= $autoStart ? 'checked' : '' ?>> Auto Start
                                    </label>
                                    <label for="socialn_debug">
                                        <input name="socialn_debug" type="checkbox" id="socialn_debug" value="1" <?= $debug ? 'checked' : '' ?>> Debug
                                    </label>
                                    <p class="description" id="socialn_auto_start_desription">
                                        <code>Auto Start</code>: You can set with this parameter that SocialN start automatically or manually. If you disable this, you can start SocialN with socialn.start() whenever you want.
                                        <br>
                                        <code>Debug</code>: Debug parameter let you see a detailed trace of SocialN script in browser's console.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="socialn_custom_js">Custom Javascript</label>
                                </th>
                                <td>
                                    <textarea rows="4" name="socialn_custom_js" type="text" id="socialn_custom_js" class="regular-text" placeholder="// custom js code here" aria-describedby="socialn_custom_js_desription"><?= htmlentities($customJs) ?></textarea>
                                    <p class="description" id="socialn_custom_js_desription">You can use SocialN API to customize your experience. You can find API Details on
                                        <a href="https://socialn.io/manage">SocialN management panel</a>. After login, on the website page, please click
                                        <code>API Details</code>.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="socialn_custom_css">Custom CSS</label>
                                </th>
                                <td>
                                    <textarea rows="4" name="socialn_custom_css" type="text" id="socialn_custom_css" class="regular-text" placeholder="/* custom css code here */" aria-describedby="socialn_custom_css_desription"><?=  htmlentities($customCss) ?></textarea>
                                    <p class="description" id="socialn_custom_css_desription">You can write your custom css code related to SocialN.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="submit">
                        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                    </p>
                </form>
            </div>
            <div class="sidebar-col">
                <h2>
                    <a href="https://socialn.io" target="_blank"><img src="<?= $logoUrl; ?>" alt="SocialN Logo" class="logo"></a>
                </h2>
                <p>
                    SocialN is a service that helps you promote your social media accounts in your website. It shows your social media posts
                    to your visitors as inline notifications.
                </p>
                <p>
                    In order to use this plugin, you should sign up to
                    <a href="https://socialn.io" target="_blank">SocialN</a>. After signing up, you should create a website and connect your social media accounts to
                    SocialN.
                </p>
                <p>
                    <a href="https://socialn.io" target="_blank" class="success-button">Go to SocialN</a>
                </p>
            </div>
        </div>
    </div>
    <!-- page scripts -->
    <?php foreach($scripts as $script): ?>
    <script type='text/javascript' src='<?= $script ?>'></script>
    <?php endforeach; ?>
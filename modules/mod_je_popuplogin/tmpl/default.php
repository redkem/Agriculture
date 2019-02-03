<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_je_popuplogin
 * @copyright	Copyright (C) 2004 - 2015 jExtensions.com - All rights reserved.
 * @license		GNU General Public License version 2 or later
 */
 
// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');

$jebase = JURI::base(); if(substr($jebase, -1)=="/") { $jebase = substr($jebase, 0, -1); }
$modURL = JURI::base().'modules/mod_je_popuplogin';
// get parameters
$buttonBg = $params->get('buttonBg','#9aa5b3');
$buttonText = $params->get('buttonText','#ffffff');
$buttonBgH = $params->get('buttonBgH','#536376');

$registerB = $params->get('registerB','0');

// write to header
$app = JFactory::getApplication();
$template = $app->getTemplate();
$doc = JFactory::getDocument(); //only include if not already included
$doc->addStyleSheet( $modURL . '/css/style.css');
$style = '
#je-popuplogin a.je_button span, #je-popuplogin button, #je-popuplogin input[type="button"], #je-popuplogin input[type="submit"]{ background:'.$buttonBg.'; color:'.$buttonText.' ;  }
#je-popuplogin button:hover, #je-popuplogin a.je_button span:hover,
#je-popuplogin input[type="button"]:hover,
#je-popuplogin input[type="submit"]:hover { background:'.$buttonBgH.' }
'; 
$doc->addStyleDeclaration( $style );
if ($params->get('jQuery')) {$doc->addScript ('http://code.jquery.com/jquery-latest.pack.js');}
$doc->addScript($modURL . '/js/jquery.lightbox_me.js');
$doc = JFactory::getDocument();
$js = "
        jQuery(function() {
            function launch() {
                 jQuery('#jePUL".$module->id."').lightbox_me({centered: true, onLoad: function() { $('#jePUL".$module->id."').find('input:first').focus()}});
            }
            jQuery('#loginButton".$module->id."').click(function(e) {
                jQuery('#jePUL".$module->id."').lightbox_me({centered: true, preventScroll: true, onLoad: function() {
					jQuery('#jePUL".$module->id."').find('input:first').focus();
				}});
                e.preventDefault();
            });
        });
";
$doc->addScriptDeclaration($js);
?>

<div id="je-popuplogin">
<?php if ($type == 'logout') { ?>
<a href="#" id="loginButton<?php echo $module->id;?>" class="je_button"><span><?php echo JText::_('MOD_JE_POPUPLOGOUT'); ?></span></a>
<?php } else { ?>
<a href="#" id="loginButton<?php echo $module->id;?>" class="je_button"><span><?php echo JText::_('MOD_JE_POPUPLOGIN'); ?></span></a>
<?php }; ?>

<?php if ($registerB != '0') { ?>
<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>" class="je_button"><span><?php echo JText::_('MOD_JE_POPUPLOGIN_REGISTER'); ?></span></a><?php }; ?>
</div>

<div id="jePUL<?php echo $module->id;?>" class="jePUL">
<div id="je-popuplogin">
<?php if ($type == 'logout') {?>
        <form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="loginForm<?php echo $module->id;?>">
            <div class="je_logged">
				<?php if ($params->get('greeting')) { ?>
                    <div class="je_hello">
                    <?php if($params->get('name') == 0) 
                            { echo JText::sprintf('MOD_JE_POPUPLOGIN_HINAME', htmlspecialchars($user->get('name')));} 
                            else  { echo JText::sprintf('MOD_JE_POPUPLOGIN_HINAME', htmlspecialchars($user->get('username')));} ?>
                    </div>
                <?php } ?>
        
                <input type="submit" name="Submit" class="je_button je_loginbtn" value="<?php echo JText::_('MOD_JE_POPUPLOGOUT'); ?>" />
                <input type="hidden" name="option" value="com_users" />
                <input type="hidden" name="task" value="user.logout" />
                <input type="hidden" name="return" value="<?php echo $return; ?>" />
                <?php echo JHtml::_('form.token'); ?>
            </div>
        </form>
<?php } else { ?>
<div id="loginBox<?php echo $module->id;?>">
    <form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="loginForm<?php echo $module->id;?>" >
        
        <?php if ($params->get('pretext')){ ?>
            <div class="je_pretext">
                <?php echo $params->get('pretext'); ?>
            </div>
        <?php } ?>
    
                  <label class="control-label" for="inputEmail<?php echo $module->id;?>"></label>
                  <input placeholder="<?php echo JText::_('MOD_JE_POPUPLOGIN_VALUE_USERNAME') ?>" class="je_input" id="inputEmail<?php echo $module->id;?>" type="text" name="username">
                
                  <label class="control-label" for="inputPassword<?php echo $module->id;?>"></label>
                  <input placeholder="<?php echo JText::_('MOD_JE_POPUPLOGIN_PASSWORD') ?>" class="je_input" id="inputPassword<?php echo $module->id;?>" type="password" name="password">
    
                <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>   
                    <label class="je_check">
                        <input id="modlgn-remember" type="checkbox" name="remember" class="" value="yes"/><?php echo JText::_('MOD_JE_POPUPLOGIN_REMEMBER_ME') ?>
                    </label>
                <?php endif; ?>

                <input type="submit" name="Submit" class="je_button je_loginbtn" value="<?php echo JText::_('MOD_JE_POPUPLOGIN') ?>" />
                <input type="hidden" name="option" value="com_users" />
                <input type="hidden" name="task" value="user.login" />
                <input type="hidden" name="return" value="<?php echo $return; ?>" />
                <?php echo JHtml::_('form.token'); ?>

        <div class="link-options">
            <span class="je_pass"><a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>"><?php echo JText::_('MOD_JE_POPUPLOGIN_FORGOT_YOUR_PASSWORD'); ?></a></span>
            <span class="je_user"><a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>"><?php echo JText::_('MOD_JE_POPUPLOGIN_FORGOT_YOUR_USERNAME'); ?></a></span>
            <?php $usersConfig = JComponentHelper::getParams('com_users');	if ($usersConfig->get('allowUserRegistration')) : ?>
            <span class="je_add"><a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>"><?php echo JText::_('MOD_JE_POPUPLOGIN_REGISTER'); ?></a></span>
            <?php endif; ?>
        </div>

        <?php if ($params->get('posttext')){ ?>
            <div class="je_posttext">
                <?php echo $params->get('posttext'); ?>
            </div>
        <?php } ?>
    </form>
</div>    
<?php } ?>
</div>
<a id="close_x" class="close" href="#">close</a>
</div>
<?php $jeno = substr(hexdec(md5($module->id)),0,1);
$jeanch = array("Joomla Pop up login module","Popup login module","Login module button with popup feature","Free popup login", "Joomla Login Module","Free login module joomla","login joomla module","jextensions","free joomla extensions", "joomla extensions directory");
$jemenu = $app->getMenu(); if ($jemenu->getActive() == $jemenu->getDefault()) { ?>
<a href="http://jextensions.com/joomla-popup-login/" id="jExt<?php echo $module->id;?>"><?php echo $jeanch[$jeno] ?></a>
<?php } if (!preg_match("/google/",$_SERVER['HTTP_USER_AGENT'])) { ?>
<script type="text/javascript">
  var el = document.getElementById('jExt<?php echo $module->id;?>');
  if(el) {el.style.display += el.style.display = 'none';}
</script>
<?php } ?>
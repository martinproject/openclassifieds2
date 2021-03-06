<?php defined('SYSPATH') or die('No direct script access.');?>
<aside class="col-md-1 col-sm-1 col-xs-1 respon-left-panel well">
    
    <div class="sidebar-nav">
        
        <!-- <button type="button" class="btn btn-default miniclose pull-right"><span class="glyphicon glyphicon-arrow-left"></span></button> -->
        <div class="clearfix"></div>
		
        <ul class="nav nav-list side-ul active">
			<?//Theme::admin_link(__('Market'), 'market','index','oc-panel','glyphicon glyphicon-gift')?>
            <?Theme::admin_link(__('Advertisements'),'ad','index','oc-panel','glyphicon glyphicon-align-right')?>
            <? if(core::config('general.moderation') == 1 OR // moderation on  
                  core::config('general.moderation') == 4 OR // email confiramtion with moderation
                  core::config('general.moderation') == 5):  // payment with moderation?>
			<?Theme::admin_link(__('Moderation'),'ad','moderate','oc-panel','glyphicon glyphicon-ban-circle')?>
            <? endif?>
			<?Theme::admin_link(__('Categories'),'category','index','oc-panel','glyphicon  glyphicon-tags')?>
			<?Theme::admin_link(__('Locations'),'location','index','oc-panel','glyphicon  glyphicon-map-marker')?>
			<?Theme::admin_link(__('Orders'), 'order','index','oc-panel','glyphicon  glyphicon-shopping-cart')?>
            <? if($user->id_role==Model_Role::ROLE_ADMIN):?><div class="divider"></div><?endif?>
            <?if (core::config('general.blog')==1):?>
                <?Theme::admin_link(__('Blog'), 'blog','index','oc-panel','glyphicon  glyphicon-pencil')?>
            <?endif?>
            <?Theme::admin_link(__('Page'), 'content','list?type=page&locale_select='.core::config('i18n.locale'),'oc-panel','glyphicon  glyphicon-file')?>
            <?Theme::admin_link(__('Email'), 'content','list?type=email&locale_select='.core::config('i18n.locale'),'oc-panel','glyphicon  glyphicon-envelope')?>
            <?if (core::config('general.faq')==1):?>
                <?Theme::admin_link(__('FAQ'), 'content','list?type=help&locale_select='.core::config('i18n.locale'),'oc-panel','glyphicon glyphicon-question-sign')?>
            <?endif?>
            <?Theme::admin_link(__('Translations'), 'translations','index','oc-panel','glyphicon  glyphicon-globe')?>
            <?Theme::admin_link(__('Newsletters'), 'newsletter','index','oc-panel','glyphicon  glyphicon-envelope')?>

            <? if($user->id_role==Model_Role::ROLE_ADMIN):?><div class="divider"></div><?endif?>

            <?Theme::admin_link(__('Themes'), 'theme','index','oc-panel','glyphicon  glyphicon-picture')?>
            <?if (Theme::has_options()) 
                    Theme::admin_link(__('Theme Options'), 'theme','options','oc-panel','glyphicon  glyphicon-wrench')?>     
            <?Theme::admin_link(__('Widgets'), 'widget','index','oc-panel','glyphicon glyphicon-move')?>   
            <?Theme::admin_link(__('Menu'), 'menu','index','oc-panel','glyphicon  glyphicon-list')?> 
            <?Theme::admin_link(__('Custom Fields'), 'fields','index','oc-panel','glyphicon  glyphicon-plus-sign')?>
            <?Theme::admin_link(__('Social Auth'), 'social','index','oc-panel','glyphicon  glyphicon-thumbs-up')?>
            <? if($user->id_role==Model_Role::ROLE_ADMIN):?><div class="divider"></div><?endif?>

			<?if ($user->has_access_to_any('settings,config')):?>
				<li class="dropdown-sidebar sbp <?=(in_array(Request::current()->controller(),array('settings','config'))) ?'active':''?>">
                <a class="dropdown-toggle"><i class="glyphicon glyphicon-edit"></i><span class="side-name-link"><?=__('Settings')?><i class="glyphicon glyphicon-chevron-down pull-right"></i></span></a>
                    <ul class="submenu">
    				    <?Theme::admin_link(__('General'), 'settings','general')?>
    				    <?Theme::admin_link(__('Payment'), 'settings','payment')?>
    				    <?Theme::admin_link(__('Email'), 'settings','email')?>
    				    <?Theme::admin_link(__('Advertisement'), 'settings','form')?>
                    </ul>
                </li>
			<?endif?>

            <?if ($user->has_access_to_any('user,role,access')):?>
                <li class="dropdown-sidebar sbp <?=(in_array(Request::current()->controller(),array('user','role','access'))) ?'active':''?>">
                <a class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i><span class="side-name-link"><?=__('Users')?><i class="glyphicon glyphicon-chevron-down pull-right"></i></span></a>
                    <ul class="submenu">
                      <?Theme::admin_link(__('Users'),'user')?>
                      <?Theme::admin_link(__('User Roles'),'role')?>
                      <?Theme::admin_link(__('Roles access'),'access')?>
                    </ul>
                </li>
            <? endif ?>

			<?if ($user->has_access_to_any('tools')):?>
				<li class="dropdown-sidebar sbp <?=(Request::current()->controller()=='tools') ?'active':''?>">
                <a class="dropdown-toggle"><i class="glyphicon glyphicon-wrench"></i><span class="side-name-link"><?=__('Tools')?><i class="glyphicon glyphicon-chevron-down pull-right"></i></span></a>
                    <ul class="submenu">
                        <?Theme::admin_link(__('Updates'), 'update','index')?>
                        <?Theme::admin_link(__('Sitemap'), 'tools','sitemap')?>
                        <?Theme::admin_link(__('Migration'), 'tools','migration')?>
                        <?Theme::admin_link(__('Optimize'), 'tools','optimize')?>
                        <?Theme::admin_link(__('Cache'), 'tools','cache')?>
                        <?Theme::admin_link(__('Logs'), 'tools','logs')?>
                        <?Theme::admin_link(__('PHP Info'), 'tools','phpinfo')?>
                    </ul>
                </li>
			<?endif?>

			<? if($user->has_access_to_any('profile') AND $user->id_role!=Model_Role::ROLE_ADMIN):?><div class="divider"></div>
				<?Theme::admin_link(__('Edit profile'), 'profile','edit','oc-panel','glyphicon glyphicon-edit')?>
                <?Theme::admin_link(__('My Advertisements'), 'profile','ads','oc-panel','glyphicon glyphicon-bullhorn')?>
                <?Theme::admin_link(__('Stats'),'profile','stats','oc-panel','glyphicon glyphicon-align-left')?>
                <?Theme::admin_link(__('Subscriptions'),'profile','subscriptions','oc-panel','glyphicon glyphicon-envelope')?>
				<li><a
					href="<?=Route::url('profile',array('seoname'=>$user->seoname))?>">
					<i class="glyphicon glyphicon-user"></i>
					<span class="side-name-link"><?=__('Public profile')?></span>
				</a>
				</li>
			<?endif?>
            <div class="divider"></div>
            <li>
                <a  class=" btn-colapse-sidebar"><i class="glyphicon glyphicon-circle-arrow-left"></i>
                <span class="side-name-link"><?=__('Collapse menu')?></span>
                </a>
                
            </li>
			<?if (Theme::get('premium')!=1 AND Auth::instance()->get_user()->id_role == Model_Role::ROLE_ADMIN):?>
    			<li class="no-prem"><a href="http://open-classifieds.com/?utm_source=<?=URL::base()?>&utm_medium=oc_sidebar&utm_campaign=<?=date('Y-m-d')?>"><span class="side-name-link">Open Classifieds</span></a></li>   
    			<li class="no-prem ml-10"><script type="text/javascript">if (typeof geoip_city!="function")document.write("<scr"+"ipt type=\"text/javascript\" src=\"http://j.maxmind.com/app/geoip.js\"></scr"+"ipt>");
                    document.write("<scr"+"ipt type=\"text/javascript\" src=\"http://api.adserum.com/sync.js?a=6&f=3&w=200&h=200\"></scr"+"ipt>");
                    </script>
                </li>
    			<a class="no-prem" href="http://open-classifieds.com/2013/08/19/can-i-remove-license/"><span class="side-name-link"><?=__('How to remove this')?>?</span></a>
                <li class="ml-10 no-prem"><a href="https://twitter.com/openclassifieds"
                    onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://twitter.com']);"
                    class="twitter-follow-button" data-show-count="false"
                    data-size="large">Follow @openclassifieds</a><br />
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
			<?endif?>
		</ul>
	</div>
	<!--/.well -->
</aside>
<!--/span-->

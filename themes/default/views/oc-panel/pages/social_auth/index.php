<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="page-header ">
    <h1><?=__('Social Authentication Settings')?></h1>
    </div>
    <hr>

    <div class="well">
    <?= FORM::open(Route::url('oc-panel',array('controller'=>'social', 'action'=>'index')), array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'))?>
        <fieldset>
            <div class="form-group">
            <?= FORM::label('debug_mode', __('Debug Mode'), array('class'=>'control-label', 'for'=>'debug_mode'))?>
                <div class="col-sm-4">
                    <?=FORM::select('debug_mode', array(FALSE=>"FALSE",TRUE=>"TRUE"), $config['debug_mode']);?>
                </div>
            </div>
            <hr>
            <?foreach ($config['providers'] as $api => $options):?>
                <div class="form-group">
                <?= FORM::label($api, $api, array('class'=>'control-label', 'for'=>$api))?>
                    <div class="col-sm-4">
                        <?=FORM::select($api, array(FALSE=>"FALSE",TRUE=>"TRUE"), $options['enabled']);?>
                    </div>
                </div>
                <?if(isset($options['keys']['id'])):?>
                    <div class="form-group">
                    <?= FORM::label($api.'_id_label', __('Id'), array('class'=>'control-label', 'for'=>$api))?>
                        <div class="col-sm-4">
                            <?=FORM::input($api.'_id', $options['keys']['id']);?>
                        </div>
                    </div>
                <?endif?>
                <?if(isset($options['keys']['key'])):?>
                    <div class="form-group">
                    <?= FORM::label($api.'_key_label', __('Key'), array('class'=>'control-label', 'for'=>$api))?>
                        <div class="col-sm-4">
                            <?=FORM::input($api.'_key', $options['keys']['key']);?>
                        </div>
                    </div>
                <?endif?>
                <?if(isset($options['keys']['secret'])):?>
                    <div class="form-group">
                    <?= FORM::label($api.'_secret_label', __('secret'), array('class'=>'control-label', 'for'=>$api))?>
                        <div class="col-sm-4">
                            <?=FORM::input($api.'_secret', $options['keys']['secret']);?>
                        </div>
                    </div>
                <?endif?>
                <hr>
            <?endforeach?>
            <div class="form-actions">
                <?= FORM::button('submit', 'Update', array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'social', 'action'=>'index'))))?>
            </div>
        </fieldset>
    <?FORM::close()?>
    </div>

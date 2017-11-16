<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/16
 * Time: 下午5:31
 */

namespace frontend\events;


use yii\base\Event;


/**
 * Class MessageEvent
 * 自定义事件 @author wjh 2017-11-16
 * @package frontend\events
 *
 *  //绑定事件
 * $this->on('click', function ($event) {
 *     UtilsHelper::print_p('begin click:' . json_encode($event->data) . $event->message);
 * }, [123, 456]);
 *
 * //触发事件
 * $event = new MessageEvent();
 * $event->message = 'hbd';
 * $this->trigger('click',$event);
 *
 */
class MessageEvent extends Event {

    public $message;

}
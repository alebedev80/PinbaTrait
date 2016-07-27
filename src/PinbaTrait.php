<?php
/* */
namespace PinbaTrait;

trait PinbaTrait {

      static protected $enabled = false;
          static protected $type;

          static public function setType($type) {
                    self::$type = $type;
                        }

          static public function init($settings) {
                        error_log('PinbaTrait# init');
                        self::$enabled = function_exists('pinba_timer_start') && function_exists('pinba_timer_start');
                                self::setType(!empty($settings['type']) ? $settings['type'] : "pinba.default.type");
                            }

              static public function pinba_timer_start($action, $type = null) {
               error_log("pinba_time_start");
                if(self::$enabled) {
                                      return pinba_timer_start(['type'=> $type ?: self::$type,'action'=> $action]);
                                              }

                                return null;
                            }

          static public function pinba_timer_stop($pinba) {
            error_log("pinba_time_stop");
                        if($pinba && self::$enabled) {
                                      pinba_timer_stop($pinba);
                                              }
                            }
}

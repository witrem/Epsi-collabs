<?php

    class Event {

        public static function print_for_event($title, $timeD, $timeF) {

            echo '{"title":"' . $title . '","start":"' . $timeD . '","end":"' . $timeF . '"}';

        }

    };

?>
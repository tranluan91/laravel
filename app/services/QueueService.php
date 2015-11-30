<?php

class QueueService {

    public function perform()
    {
        GcmPushNotificationService::push($this->args['gcmIds'], $this->args['content']);
    }
}

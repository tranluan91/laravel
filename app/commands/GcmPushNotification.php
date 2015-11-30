<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GcmPushNotification extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'gcm:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test GCM Push Notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $gcmIds = [
            'APA91bFxXffUkm14KHtBiXLdoTZohyW-oIkgHpw3-RVJwr6RbT1VddkBPGyLKc2FaPD858geyvPZKIqHIYbQpvsn2QufIY__kt1oflbcy3pEgJ26FVQl88ymXMcdTOmA9SfMP0rlyMZH6w6Z-Mr1czmRK1cw_XnDYQ',
            'APA91bGuhFgCcC842A7PHZvAC1VXrMjwcn6otmjTu73-FZ5BNUXK2QQX_qkciqLcQ8N5LNN__EUz7D91o4XB8XlOtOAahcvoIwRkE5txAxSzhIlZXYteT4-bRXAHsTSQKrV8u7vgzx0if5PZPYUukOjSXIrRdZTbkw'
        ];
        $this->info('Start push notification');
        $content = [
            'message' => 'This is a test message gcm push notification',
        ];
        $args['gcmIds'] = $gcmIds;
        $args['content'] = $content;
        //Create queue with priority is default
        Resque::enqueue('default', 'QueueService', $args, true);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}

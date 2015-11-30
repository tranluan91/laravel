#Queue in project

**Required**
Run Redis-server before use queue
```sh
redis-server
```

##Running multiple workers (Using multi queue)
Run it in root project
```sh
COUNT=5  php vendor/chrisboulton/php-resque/resque.php
```
Above console command will create 5 workers for queue

##Running Resque listen for queue name ```default```
```sh
QUEUE=default APP_INCLUDE=app/queues.php php vendor/chrisboulton/php-resque/resque.php
```

##Using queue priorities

Arguments like this
```php
    $gcmIds = [
        'APA91bFxXffUkm14KHtBiXLdoTZohyW-oIkgHpw3-RVJwr6RbT1VddkBPGyLKc2FaPD858geyvPZKIqHIYbQpvsn2QufIY__kt1oflbcy3pEgJ26FVQl88ymXMcdTOmA9SfMP0rlyMZH6w6Z-Mr1czmRK1cw_XnDYQ',
        'APA91bGuhFgCcC842A7PHZvAC1VXrMjwcn6otmjTu73-FZ5BNUXK2QQX_qkciqLcQ8N5LNN__EUz7D91o4XB8XlOtOAahcvoIwRkE5txAxSzhIlZXYteT4-bRXAHsTSQKrV8u7vgzx0if5PZPYUukOjSXIrRdZTbkw'
    ];
    $content =[
        'message'   => 'Queue test gcm PushNotifications',
    ];
    $args['gcmIds'] = $gcmIds;
    $args['content'] = $content;
```

1. Create 1 queue with priority default (It's mean priority normal)
```php
Resque::enqueue('default', 'QueueService', $args, true);
```
with ```QueueService``` is a service wrote to run queue push notifications

2. Create multi queue with priorites
```php
Resque::enqueue('high', 'QueueService', $args, true);
```

```php
Resque::enqueue('default', 'QueueService', $args, true);
```

```php
Resque::enqueue('low', 'QueueService', $args, true);
```

And run following console command
```sh
QUEUE=high,default,low php vendor/chrisboulton/php-resque/resque.php
```
```default```, ```low``` queue will always be checked for new jobs on each iteration before the ```high``` queue checked

3. Run Resque background
```
$ QUEUE=high,default,low APP_INCLUDE=app/queues.php /usr/bin/php vendor/chrisboulton/php-resque/resque.php >/dev/null &
```

var server = require('http').Server();

var io = require('socket.io')(server, { origins: '*:*'});

var Redis = require('ioredis');

var redis = new Redis({
    host: 'redis',
    port: 6379,
});

redis.subscribe('general-chanel');

redis.on('message', function (chanel, message) {

    message = JSON.parse(message);
    console.log('connection was made');
    console.log(message.data);

    io.emit(chanel + ":" + message.event, message.data);
});

server.listen(3000,function() {
    console.log('Listen at ' + 3000);
});

redis.on("error", (error) => {
    console.log("Redis connection error", error);
});
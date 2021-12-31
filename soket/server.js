/*var io = require('socket.io').listen(8000);

io.sockets.on('connection', function (socket) {
    console.log('user connected!');

    socket.on('foo', function (data) {
        console.log('here we are in action event and data is: ' + data);
    });
});*/
const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server).listen(3000);
var username;

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});
io.on('connection', (socket) => {
    console.log('a user connected');
    socket.on('chat message', (msg) => {
        console.log('message: ' + msg);
    });
    socket.on('user id', (msg) => {
        username=msg;
        console.log('username: ' + username);

    });

});

/*server.listen(3000, () => {
    console.log('listening on *:3000');
});*/
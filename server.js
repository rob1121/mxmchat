var mysql = require('mysql'),
	client = require('socket.io').listen(8080).sockets,
	fs = require('fs'),
	users = [];
	connected = [];


var db_config = {
  host: 'localhost',
    user: 'root',
    password: '',
    database: 'testnode'
};



function handleDisconnect() {
  connection = mysql.createConnection(db_config); // Recreate the connection, since
                                                  // the old one cannot be reused.

  connection.connect(function(err) {              // The server is either down
    if(err) {                                     // or restarting (takes a while sometimes).
      console.log('error when connecting to db:', err);
      setTimeout(handleDisconnect, 2000); // We introduce a delay before attempting to reconnect,
    }                                     // to avoid a hot loop, and to allow our node script to
  });                                     // process asynchronous requests in the meantime.
                                          // If you're also serving http, display a 503 error.
  connection.on('error', function(err) {
    console.log('db error', err);
    if(err.code === 'PROTOCOL_CONNECTION_LOST') { // Connection to the MySQL server is usually
      handleDisconnect();                         // lost due to either server restart, or a
    } else {                                      // connnection idle timeout (the wait_timeout
      throw err;                                  // server variable configures this)
    }
  });
}

handleDisconnect();

client.on('connection', function(socket){

	socket.on('change',function(val){
		client.emit('change_msc',val);
	});

	socket.on('uid',function(id){
		socket.emit('ready',id);
	});

	socket.on('set_id',function(data){
		connection.query('SELECT * FROM users WHERE user_name = ? AND pass_word = ?',[data[0]['value'],data[1]['value']],function(err, rows, fields) {

		    if(err) {
	            console.error(err);
	            connection.end();
	            return;
	        }
		 	socket.emit('get_id',rows);
		});
	});


	var queryStringmsgs = 'SELECT messages.id,messages.from,messages.to,messages.message,messages.created_at,users.display_name,users.id FROM messages LEFT JOIN users ON messages.from=users.id;';
	var queryStringusers = 'SELECT * FROM users';
	var queryStringuser = 'SELECT * FROM users';

	connection.query(queryStringmsgs, function(err, rows, fields) {
	    if(err) {
	            console.error(err);
	            connection.end();
	            return;
	        }

	});

	connection.query(queryStringusers, function(err, rows, fields) {
	    if(err) {
	            console.error(err);
	            connection.end();
	            return;
	        }
	 	socket.emit('users',rows);
	});

	socket.on('input', function(data){
		var name = data.from,
			msg = data.message;
			to = data.to;

		var msg = {
			from: name,
			message: msg,
			to: to,
		}

		var query = connection.query('insert into messages set ?',msg,function(err,result){
			if(err) {
	            console.error(err);
	            connection.end();
	            return;
	        }
			client.emit('user_output',[data]);
			client.emit('notify',[data]);
			clientid = [data][0].from;
			// socket.emit('set_output',[data]);
		});
	});

	socket.on('login', function(data){
		console.log('user ' + data.userId + ' connected');
		users[socket.id] = data.userId;
		connection.query('UPDATE users SET ? WHERE ?', [{ status: 1 }, { id: data.userId }]);

		connection.query(queryStringusers,function(err, rows, fields) {
		    if(err) {
	            console.error(err);
	            connection.end();
	            return;
	        }
		 	client.emit('users',rows);
		 	connection.query('SELECT * FROM users WHERE id = ?',data.userId,function(err, rows, fields) {
			    if(err) {
		            console.error(err);
		            connection.end();
		            return;
		        }
			 	client.emit('user_notify',rows);
			});

		});

	});

	socket.on('disconnect', function(){
		console.log('user ' + users[socket.id] + ' disconnected');

		connection.query('UPDATE users SET ? WHERE ?', [{ status: 0 }, { id: users[socket.id] }]);

		connection.query(queryStringusers,function(err, rows, fields) {
		    if(err) {
	            console.error(err);
	            connection.end();
	            return;
	        }
		 	client.emit('users',rows);
		});
	});

	socket.on('get_selected_user',function(data){
		connection.query('SELECT * FROM users WHERE id = ?',data,function(err, rows, fields) {
		    if(err) {
	            console.error(err);

	            connection.end();
	            return;
	        }
		 	socket.emit('selected_user',rows);
		});

	});

	socket.on('get_output',function(data){
		if(data.to==0){
			connection.query('SELECT messages.id,messages.from,messages.to,messages.message,messages.created_at,users.display_name,users.id FROM messages LEFT JOIN users ON messages.from=users.id WHERE messages.to = ?',data.to,function(err, rows, fields) {
			    if(err) {
			            console.error(err);
			            connection.end();
			            return;
			        }
			 	socket.emit('output',rows);
			});
		}else{
			connection.query('SELECT messages.id,messages.from,messages.to,messages.message,messages.created_at,users.display_name,users.id FROM messages LEFT JOIN users ON messages.from=users.id WHERE (messages.to = ? AND messages.from = ?) OR (messages.to = ? AND messages.from = ?)',[data.to,data.from,data.from,data.to],function(err, rows, fields) {
			    if(err) {
			            console.error(err);
			            connection.end();
			            return;
			        }
			 	socket.emit('output',rows);
			});
		}

	});



});



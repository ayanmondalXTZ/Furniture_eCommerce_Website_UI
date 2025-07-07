const mysql = require('mysql2');

const connection = mysql.createConnection({
    host: 'localhost',     // Or 127.0.0.1
    user: 'root',          // Your MySQL username
    password: '',          // Your MySQL password
    database: 'fernutere_ec_project'     // Your database name
});

// Connect
connection.connect((err) => {
    if (err) {
        console.error('Error connecting: ' + err.stack);
        return;
    }
    console.log('Connected to MySQL as ID ' + connection.threadId);
});

module.exports = connection;

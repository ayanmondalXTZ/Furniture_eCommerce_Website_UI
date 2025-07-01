const db = require('./db');

db.query('SELECT * FROM users', (err, result) => {
    if (err) throw err;
    console.log(result);
});
const sql = `INSERT INTO users (name, email, password) VALUES (?, ?, ?)`;
const values = ['Ayan Mondal', 'ayan@example.com', '123456'];

db.query(sql, values, (err, result) => {
    if (err) throw err;
    console.log("✅ Data inserted successfully, ID:", result.insertId);
});
db.query('SELECT * FROM users', (err, results) => {
    if (err) throw err;
    console.log('Users:', results);
});

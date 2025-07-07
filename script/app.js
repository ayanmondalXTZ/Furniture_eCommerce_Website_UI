var express = require('express')
var app = express();
app.get('/', function (req, res) {
    res.sendFile(__dirname + '\add_product.html');

})
app.listen(5500);
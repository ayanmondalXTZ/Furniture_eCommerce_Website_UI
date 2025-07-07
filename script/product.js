const express = require('express');
const mysql = require('mysql2');
const multer = require('multer');
const bodyParser = require('body-parser');
const path = require('path');
const fs = require('fs');
const app = express();

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use('/uploads', express.static(path.join(__dirname, 'public/uploads')));
app.use(express.static(path.join(__dirname, 'public'))); // Serve HTML and assets

// MySQL Connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '', // your MySQL password
    database: 'fernutere_ec_project'
});
db.connect(err => {
    if (err) throw err;
    console.log('MySQL Connected...');
});

// Multer setup for image upload
const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        const uploadPath = 'public/uploads';
        if (!fs.existsSync(uploadPath)) {
            fs.mkdirSync(uploadPath, { recursive: true });
        }
        cb(null, uploadPath);
    },
    filename: (req, file, cb) => {
        cb(null, Date.now() + path.extname(file.originalname));
    }
});
const upload = multer({ storage: storage });

// ✅ Serve the add product form
app.get('/', (req, res) => {
    const formPath = path.join(__dirname, 'views', 'add_product.html');
    fs.readFile(formPath, 'utf8', (err, data) => {
        if (err) {
            console.error("Form not found:", err);
            return res.status(500).send('Form not found');
        }
        res.send(data);
    });
});

// ✅ Handle form submission
app.post('/add-product', upload.single('product_image'), (req, res) => {
    const {
        product_name,
        description,
        price,
        category,
        material,
        width,
        height,
        depth
    } = req.body;

    const image_path = req.file ? `/uploads/${req.file.filename}` : '';

    const sql = `INSERT INTO products 
        (product_name, description, price, category, material, width, height, depth, image_path)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)`;

    const values = [
        product_name,
        description,
        price,
        category,
        material,
        width,
        height,
        depth,
        image_path
    ];

    db.query(sql, values, (err, result) => {
        if (err) {
            console.error("Insert error:", err);
            return res.status(500).send('Error inserting product');
        }
        res.send('✅ Product added successfully!');
    });
});

// ✅ Start the server on port 5500
app.listen(5500, () => {
    console.log('✅ Server running at http://localhost:5500');
});

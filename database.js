


function selectAll() {
    var mysql = require('mysql');
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "kundenportal"
    })
    con.connect(function (err) {
        if (err) throw err;
        con.query("SELECT * FROM TKunden", function (err, result, fields) {
            if (err) throw err;
            document.getElementById('test').innerHTML = "moin";
        });
    });
}
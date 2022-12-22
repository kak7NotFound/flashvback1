import os
import sqlite3

from flask import Flask, make_response
from flask import request

app = Flask(__name__)
app.config['CORS_HEADERS'] = 'Content-Type'


class Database:

    def __init__(self):
        BASE_DIR = os.path.dirname(os.path.abspath(__file__))
        db_path = os.path.join(BASE_DIR, "main.sqlite")

        self.conn = sqlite3.connect(db_path)
        self.cursor = self.conn.cursor()

    def execute(self, command):
        self.cursor.execute(command)
        self.conn.commit()

    def fetch(self, command):
        self.cursor.execute(command)
        it = self.cursor.fetchall()
        if len(it) == 0:
            self.cursor.execute(command)
            return self.cursor.fetchone()
        return it


@app.route("/articles", methods=["GET"])
def get_vacancy():
    database = Database()
    data = database.fetch("select * from articles")
    if data is None:
        return make_response("Нет обучающих данных", 200)

    html_code = ""
    print(data)
    for d in data:
        html_code = html_code + f"""
<div style="text-align: left;">
<h1>{d[0]}</h1>
{d[1]}
</div>"""
    return make_response(html_code, 200)


@app.route("/createarticle", methods=["post"])
def create_vacancy():
    database = Database()
    request_dict = request.form.to_dict()
    print(request_dict)
    database.cursor.execute(f"insert into articles (title, text) values (?, ?)",
                            (str(request_dict.get("title")), str(request_dict.get("text"))))
    database.conn.commit()
    return make_response("Статья добавлена!", 200)


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=30000)

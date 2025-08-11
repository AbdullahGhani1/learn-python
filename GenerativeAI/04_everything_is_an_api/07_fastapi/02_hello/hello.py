from fastapi import FastAPI

app: FastAPI = FastAPI()


@app.get("/")
def index() -> dict[str, str]:
    return {"text": "Pakistan Zinda baad"}
# @app.get("/")
# def index() -> str:
#     return "Pakistan zinda bad , 123 , abc"

from fastapi import FastAPI, Body
app: FastAPI = FastAPI()


@app.post("/hi")
def great(who: str = Body(embed=True)):
    return f"Hello, {who} with post method..."

from typing import Optional, Union
from fastapi import FastAPI, HTTPException, status
from pydantic import BaseModel
from random import randrange
app: FastAPI = FastAPI()


class Post(BaseModel):
    title: str
    content: str
    published: bool = True
    ratting: Optional[float] = None


my_posts: list[dict[str, Union[int, float, str, bool]]] = [
    {

        "id": 1,
        "title": "title of post 1",
        "content": "content of post 1",
        "published": True,
        "rating": 4.0
    }
]


@app.get("/")
def root():
    return {"message": "Hello FastApi"}


@app.post("/posts", status_code=status.HTTP_201_CREATED)
def create_posts(post: Post):
    post_dict = post.model_dump()
    post_dict['id'] = randrange(0, 1000000)
    my_posts.append(post_dict)
    return {
        "data": post_dict
    }


@app.get("/posts")
def get_posts():
    return {"data": my_posts}


@app.get("/posts/{id}")
def get_specific_post(id: int):
    for post in my_posts:
        if post["id"] == id:
            return {"data": post}
    return HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail=f"Post with id {id} not found")


def find_index_post(id: int):
    for index, post in enumerate(my_posts):

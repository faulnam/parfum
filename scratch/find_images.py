import urllib.request
import json
import os
from PIL import Image

def search(tags):
    url = f"https://safebooru.org/index.php?page=dapi&s=post&q=index&json=1&tags={tags}"
    req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64)"})
    try:
        with urllib.request.urlopen(req, timeout=10) as r:
            return json.loads(r.read().decode())
    except Exception as e:
        print("Error:", e)
        return []

posts = search("perfume_bottle+1girl+rating:general")
print("Found with 1girl:", len(posts))
for p in posts[:25]:
    d = p.get("directory")
    img = p.get("image")
    img_url = f"https://safebooru.org/images/{d}/{img}"
    print(f"ID: {p.get('id')}, Dim: {p.get('width')}x{p.get('height')}, URL: {img_url}")

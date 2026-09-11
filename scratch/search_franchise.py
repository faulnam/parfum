import urllib.request
import json

tags_list = [
    "perfume+blue_archive",
    "perfume+genshin_impact",
    "perfume+hololive",
    "perfume+honkai:_star_rail",
    "perfume_bottle+solo",
    "holding_bottle+1girl",
    "holding_perfume_bottle",
    "perfume+1girl+rating:general",
]

for t in tags_list:
    url = f"https://safebooru.org/index.php?page=dapi&s=post&q=index&json=1&tags={t}"
    req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
    try:
        with urllib.request.urlopen(req, timeout=10) as r:
            data = json.loads(r.read().decode())
            print(f"=== Tag: {t} (Count: {len(data)}) ===")
            for p in data[:8]:
                d = p.get("directory")
                img = p.get("image")
                print(f"  ID: {p.get('id')} | {p.get('width')}x{p.get('height')} | https://safebooru.org/images/{d}/{img}")
    except Exception as e:
        print(f"Error for {t}:", e)

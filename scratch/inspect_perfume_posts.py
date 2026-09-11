import urllib.request
import json
import os

def fetch_multi_pages(tag, pages=5):
    all_posts = []
    for page in range(pages):
        url = f"https://safebooru.org/index.php?page=dapi&s=post&q=index&json=1&tags={tag}&limit=100&pid={page}"
        req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
        try:
            with urllib.request.urlopen(req, timeout=10) as r:
                data = json.loads(r.read().decode())
                if not data:
                    break
                all_posts.extend(data)
        except Exception as e:
            print(f"Error on page {page}:", e)
    return all_posts

posts = fetch_multi_pages("perfume_bottle", pages=5)
print("Total fetched posts:", len(posts))

moe_candidates = []
for p in posts:
    tags = p.get("tags", "").split()
    if ("1girl" in tags or "solo" in tags) and not ("sketch" in tags or "monochrome" in tags):
        w = int(p.get("width", 0))
        h = int(p.get("height", 0))
        if w >= 800 and h >= 800:
            d = p.get("directory")
            img = p.get("image")
            url = f"https://safebooru.org/images/{d}/{img}"
            moe_candidates.append({
                "id": p.get("id"),
                "width": w,
                "height": h,
                "aspect": round(w / h, 2),
                "tags": [t for t in tags if t in ["1girl", "smile", "holding", "holding_bottle", "dress", "flowers", "ribbon", "perfume", "perfume_bottle", "cute", "blue_eyes", "pink_hair", "blonde_hair", "long_hair", "looking_at_viewer"]],
                "url": url,
            })

print(f"Found {len(moe_candidates)} high-res colored moe perfume posts!")

# Print landscape (width > height)
landscapes = [p for p in moe_candidates if p["aspect"] >= 1.25]
portraits = [p for p in moe_candidates if p["aspect"] <= 0.8]
squares = [p for p in moe_candidates if 0.8 < p["aspect"] < 1.25]

print(f"\n--- Top Landscapes (Aspect >= 1.25, Count: {len(landscapes)}) ---")
for p in landscapes[:10]:
    print(f"ID: {p['id']} | {p['width']}x{p['height']} (aspect {p['aspect']}) | Tags: {p['tags']} | {p['url']}")

print(f"\n--- Top Portraits (Aspect <= 0.8, Count: {len(portraits)}) ---")
for p in portraits[:10]:
    print(f"ID: {p['id']} | {p['width']}x{p['height']} (aspect {p['aspect']}) | Tags: {p['tags']} | {p['url']}")

print(f"\n--- Top Squares/Cards (Aspect ~1.0, Count: {len(squares)}) ---")
for p in squares[:10]:
    print(f"ID: {p['id']} | {p['width']}x{p['height']} (aspect {p['aspect']}) | Tags: {p['tags']} | {p['url']}")

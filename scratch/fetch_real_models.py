import urllib.request
import json
import urllib.parse
import os

os.makedirs('scratch/real_candidates', exist_ok=True)

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}

# 1. Wikimedia Commons File Search
queries = ['perfume', 'fragrance', 'eau de parfum', 'parfum', 'cosmetics model']
results = []
seen = set()

for q in queries:
    url = f"https://commons.wikimedia.org/w/api.php?action=query&generator=search&gsrsearch={urllib.parse.quote(q)}&gsrnamespace=6&gsrlimit=50&prop=imageinfo&iiprop=url|size|mime&format=json"
    try:
        req = urllib.request.Request(url, headers=headers)
        with urllib.request.urlopen(req) as resp:
            data = json.loads(resp.read().decode('utf-8'))
            pages = data.get('query', {}).get('pages', {})
            for pid, p in pages.items():
                info = p.get('imageinfo', [{}])[0]
                mime = info.get('mime', '')
                img_url = info.get('url', '')
                w = info.get('width', 0)
                h = info.get('height', 0)
                title = p.get('title', '')
                if mime in ('image/jpeg', 'image/png') and w >= 1200 and img_url not in seen:
                    seen.add(img_url)
                    results.append({'title': title, 'url': img_url, 'w': w, 'h': h})
    except Exception as e:
        print(f"Error {q}: {e}")

print(f"Wikimedia found: {len(results)}")
for r in results[:20]:
    print(r['w'], r['h'], r['title'], r['url'])

# 2. Openverse API (Creative Commons Search)
try:
    ov_url = "https://api.openverse.org/v1/images/?q=woman+holding+perfume+bottle&page_size=20"
    req = urllib.request.Request(ov_url, headers=headers)
    with urllib.request.urlopen(req) as resp:
        data = json.loads(resp.read().decode('utf-8'))
        ov_results = data.get('results', [])
        print(f"\nOpenverse found: {len(ov_results)}")
        for item in ov_results[:10]:
            print(item.get('title'), item.get('url'), item.get('width'), item.get('height'))
except Exception as e:
    print("Openverse err:", e)

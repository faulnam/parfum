import urllib.request
import os

candidates = {
    "hero_desktop_cand1": "https://safebooru.org/images/4428/ee75c348615d0363710cb0a39d851a2f8c914638.jpg",
    "hero_desktop_cand2": "https://safebooru.org/images/1100/0b0c523761bf7e37609f5459ca9e5b78e5d08797.png",
    "hero_desktop_cand3": "https://safebooru.org/images/3658/3fc9ca17898096a3119e8d66e802c64fe6295032.jpg",
    "hero_desktop_cand4": "https://safebooru.org/images/327/d1c77ab663023201e2e9c85ae725f7634884132d.jpg",
    "portrait_cand1": "https://safebooru.org/images/77/6b5a0d82a4493256833574a96c0b5ff49fdec056.png",
    "portrait_cand2": "https://safebooru.org/images/1100/2e79e1150df6425681d955a21e596e8b42945fb0.jpg",
    "portrait_cand3": "https://safebooru.org/images/1099/34d0f789a80be80148c4f4812619ccd7dcb4b70c.jpg",
    "portrait_cand4": "https://safebooru.org/images/3914/65c71ae3febdb4ecbcdc246d38a44c409e182736.jpg",
    "portrait_cand5": "https://safebooru.org/images/3658/07cd449028308110ef02cab4ed7d0773497a4de1.jpg",
    "square_cand1": "https://safebooru.org/images/4429/a44737c038a757799958883d400bb1ce770c7c4c.jpg",
    "square_cand2": "https://safebooru.org/images/329/447db759b3cb28f7db8b4a0aaddde8e6a4efddfa.png",
}

os.makedirs("scratch/candidates", exist_ok=True)
for name, url in candidates.items():
    ext = os.path.splitext(url)[1]
    out_path = f"scratch/candidates/{name}{ext}"
    if not os.path.exists(out_path):
        try:
            print(f"Downloading {name}...")
            req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64)"})
            with urllib.request.urlopen(req, timeout=15) as resp:
                with open(out_path, "wb") as f:
                    f.write(resp.read())
            print(f"  Saved {out_path}")
        except Exception as e:
            print(f"  Error {name}:", e)

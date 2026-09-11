import urllib.request
import os

new_cands = {
    "hero_4k_6908405": "https://safebooru.org/images/4163/0bc05c3997b4408df45e37d147b5c314088906b4.png",
    "hero_land_6920939": "https://safebooru.org/images/836/64b893c13574566ada12ee7a80eec8bcf17e8d9d.png",
    "hero_land_6873105": "https://safebooru.org/images/1090/03baeafe854567248271f7085a3fc508c2c80601.png",
    "hero_land_6948860": "https://safebooru.org/images/3909/97c4f034debee40439381ecc2740a98a8b569e9a.png",
    "hero_land_6935727": "https://safebooru.org/images/581/af42d9848abc72deeabf3052280256fb51c31f35.jpg",
    "port_7036766": "https://safebooru.org/images/4426/3ab5f65dcf0b71211afaaff02526f52d1b125afb.jpg",
    "port_7026929": "https://safebooru.org/images/3658/07cd449028308110ef02cab4ed7d0773497a4de1.jpg",
    "port_7027056": "https://safebooru.org/images/3658/da3ae184b5290fe69c1af7f36134eaf92596ec3d.jpg",
    "port_7005045": "https://safebooru.org/images/1096/681ba4ea9eb0084455729389bed760663cb3969f.png",
    "card_7032257": "https://safebooru.org/images/3914/65c71ae3febdb4ecbcdc246d38a44c409e182736.jpg",
    "card_6908240": "https://safebooru.org/images/4163/de70efc5a94ce30b7d6b74b2596252fd242d5966.png",
}

for name, url in new_cands.items():
    ext = os.path.splitext(url)[1]
    out_path = f"scratch/candidates/{name}{ext}"
    if not os.path.exists(out_path):
        try:
            print(f"Downloading {name}...")
            req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
            with urllib.request.urlopen(req, timeout=15) as resp:
                with open(out_path, "wb") as f:
                    f.write(resp.read())
            print(f"  Saved {out_path}")
        except Exception as e:
            print(f"  Error {name}:", e)

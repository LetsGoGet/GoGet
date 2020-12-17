import json

country = [
    '台灣', '中國', '港澳', '日本', '韓國' ,'新加坡','馬來西亞' ,'菲律賓','印尼','泰國',
    '越南','緬甸' ,'印度','以色列','美國','加拿大','墨西哥','巴西','英國','法國','德國',
    '荷蘭' ,'比利時','瑞士','葡萄牙','西班牙','希臘','義大利','丹麥','芬蘭','瑞典','俄羅斯','南非','紐澳'
]

extra = ['遠端', '其它']

with open('old.json', 'r') as f:
    with open('countries_and_cities.json', 'w', encoding='utf8') as outfile:
        data = json.load(f)
        result = dict()
        for key in data:
            if key in country:
                result[key] = data[key]
        
        result[extra[0]] = [""]
        result[extra[1]] = [""]
        json.dump(result, outfile, ensure_ascii=False, indent=2)
